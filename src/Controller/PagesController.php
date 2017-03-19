<?php

/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
* Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
		
	/**
	* Displays a view
	     *
	     * @param string ...$path Path segments.
	     * @return void|\Cake\Network\Response
	     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
	     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
	     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
	     */
	public function display(...$path){
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		if (in_array('..', $path, true) || in_array('.', $path, true)) {
			throw new ForbiddenException();
		}
		$page = $subpage = null;
		
		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		$categorys = $this->paginate('Categorys');
		$this->set('categorys',$categorys);
		
		$this->set(compact('page', 'subpage'));
		
		try {
			$this->render(implode('/', $path));
		}
		catch (MissingTemplateException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
		
	}
	function gethint($str=null){
		$WORDS = TableRegistry::get('Words');
		// 		if ($this->request->is('post')){
			if($str!=null){
				$query = $WORDS->find('all'
				                ,[
				                    'conditions'=>['words.word LIKE'=>'%'.$str.'%']
				                    ]);
				$words = $query->all();
			}
			else $words = [];
			$this->set('words',$words);
	}
	function getresult($str=null){
		$WORDS = TableRegistry::get('Words');
		$query = $WORDS->find()
			->select(['id','word'])
			->where(['words.word'=>$str])
			->contain([
				'Means'=>function($q){
					return $q
						->select(['id','mean','word_id','contribute','user_id'=>'users.id',
							'user_display'=>'users.namedisplay','cate_id'=>'categorys.id', 'cate_name'=>'categorys.name'
							])
						->order(['means.contribute'=>'DESC'])
						->contain([
								'Commentmeans'=>function($q){
									return $q
										->select(['mean_id','count'=>"count('mean_id')"])
										->where(["commentmean_id IS"=>NULL])
										->group(['mean_id']);
								},
								'Likemeans'=>function($q){
									return $q
										->select(['like'=>'sum(islike=1)','dislike'=>'sum(islike=-1)','mean_id','mylike'=>"MAX(IF(user_id=".($this->Auth->user()!=null?$this->Auth->user('id'):'NULL').",islike,0))"])
										->group(['mean_id']);
								}
								,
								'Users','Categorys'
							]
						)
						->where(['means.active'=>1]);
				},
				'Definitions'=>function($q){
					return $q
						->select(['id','define','word_id','contribute','user_id'=>'users.id',
							'user_display'=>'users.namedisplay','cate_id'=>'categorys.id', 'cate_name'=>'categorys.name'])
						->order(['definitions.contribute'=>'DESC'])
						->contain([
								'Commentdefinitions'=>function($q){
									return $q
										->select(['definition_id','count'=>"count('definition_id')"])
										->where(["commentdefinition_id IS"=>NULL])
										->group(['definition_id']);
								},
								'Likedefinitions'=>function($q){
									return $q
										->select(['like'=>'sum(islike=1)','dislike'=>'sum(islike=-1)','definition_id','mylike'=>"MAX(IF(user_id=".($this->Auth->user()!=null?$this->Auth->user('id'):'NULL').",islike,0))"])
										->group(['definition_id']);
								}
								,'Users','Categorys'
							]
						)
						->where(['means.active'=>1]);
				}

			])
			->first();
		$word = $query;
		$this->set('means',[]);
		$this->set('defines',[]);	
		if($word!=null)
		{

			$wmeans = $word->means;
			$wdefines = $word->definitions;
			$MEANS = TableRegistry::get('Means');
			$means = [];
			for($i=1;$i<count($wmeans);$i++){
			
				$j =$this->checkcate($wmeans[$i]->cate_id,$means);
				if($j>=0)
				{
					array_push($means[$j][2],$wmeans[$i]);
				}
				else
					array_push($means,[$wmeans[$i]->cate_id,$wmeans[$i]->cate_name,[$wmeans[$i]]]);
			}
			$DEFINES = TableRegistry::get('Definition');
			$defines = [];
			foreach($wdefines as $define){
				$i =$this->checkcate($define->cate_id,$defines);
				if($i>=0)
				{
					array_push($defines[$i][2],$define);
				}
				else
					array_push($defines,[$define->cate_id,$define->cate_name,[$define]]);
			}
			$this->set('means',$means);
			$this->set('defines',$defines);
		}
		$this->set('word',$word);
	}
	function checkcate($cate_id,$cates){
		for($i=0;$i<count($cates);$i++){
			if($cate_id == $cates[$i][0])
				return $i;
		}
		return -1;
	}
	function getcommentmean($mean_id=0,$parent_id=0,$page=0){
		$CommentMeans = TableRegistry::get('Commentmeans');
		$commentmeans = [];
		$query;
		if($mean_id!=0){
			if($parent_id==0)
				$query = $CommentMeans->find('all',[
					'fields'=>['id','content','created','user_name'=>'users.namedisplay','user_id'=>'users.id',
					],
					'conditions'=>['commentmeans.mean_id'=>$mean_id,'commentmeans.commentmean_id IS'=>NULL],
					'contain'=>[
						'Children'=>[
						'fields'=>['commentmean_id','count'=>'count(Children.id)'
						],
						'Users'
					],'Users'],
					'order'=>['commentmeans.created'=>'DESC'],
					'limit'=>3
				]);
			else
				$query = $CommentMeans->find('all',[
					'fields'=>['id','content','created','user_name'=>'users.namedisplay','user_id'=>'users.id',
					],
					'conditions'=>['commentmeans.mean_id'=>$mean_id,'commentmeans.commentmean_id'=>$parent_id],
					'contain'=>[
						'Children'=>[
						'fields'=>['commentmean_id','count'=>'count(Children.id)'
						],
						'Users'
					],'Users'],
					'order'=>['commentmeans.created'=>'DESC'],
					'limit'=>3
				]);
			$commentmeans = $query->all()->toArray();
		}
		$this->set('mean',$mean_id);
		$this->set('parent',$parent_id);
		$this->set('comments',$commentmeans);
	}
	function getcommentdefine($define_id=0,$parent_id=0){
		$CommentDefinitons = TableRegistry::get('Commentdefinitions');
		$commentdefinitions = [];
		if($define_id!=null){
			if($parent_id==0)
			$query= $CommentDefinitons->find()
				->select(['id','content','created','user_name'=>'users.namedisplay','user_id'=>'users.id',
				])
				->where(['commentdefinitions.definition_id'=>$define_id,'commentdefinitions.commentdefinition_id IS'=>NULL])
				->contain([
					'Childrendefinecomment'=>function($q){
						return $q
							->select(['commentdefinition_id','count'=>'count(Childrendefinecomment.id)'])
							->group('commentdefinition_id');
					},'Users'])
				->order(['commentdefinitions.created'=>'DESC'])
				->limit(3)
				->all();
			else 
				$query= $CommentDefinitons->find()
					->select(['id','content','created','user_name'=>'users.namedisplay','user_id'=>'users.id',
					])
					->where(['commentdefinitions.definition_id'=>$define_id,'commentdefinitions.commentdefinition_id '=>$parent_id])
					->contain([
						'Childrendefinecomment'=>function($q){
							return $q
								->select(['commentdefinition_id','count'=>'count(Childrendefinecomment.id)'])
								->group('commentdefinition_id');
						},'Users'])
					->order(['commentdefinitions.created'=>'DESC'])
					->limit(3)
					->all();
			$commentdefinitions = $query;
		}
		$this->set('definition',$define_id);
		$this->set('parent',$parent_id);
		$this->set('comments',$commentdefinitions);
	}
	function contribute()
	{
		$MEANS = TableRegistry::get('Means');
		$DEFINES = TableRegistry::get('Definitions');
		$means = $MEANS->find('all')
			->select(['id'=>'means.id','mean'=>'means.mean','contribute'=>'means.contribute','cate_name'=>'categorys.name','username'=>'users.namedisplay'])
			->where(['means.active'=>1,'means.contribute <'=>10])
			->contain(['Categorys','Words','Users'])
			->order(['means.contribute'=>'DESC'])
			->limit(10)
			->all();
		$defines = $DEFINES->find('all')
			->select(['id'=>'definitions.id','define'=>'definitions.define','contribute'=>'definitions.contribute',
						'cate_name'=>'categorys.name','username'=>'users.namedisplay','word'=>'words.word'])
			->where(['definitions.active'=>1,'definitions.contribute <'=>10])
			->contain(['Categorys','Words','Users'])
			->order(['definitions.contribute'=>'DESC'])
			->limit(10)
			->all();
		$count_define = $DEFINES->find('all')
				->where(['active'=>1,'contribute <'=>10])
				->count();
		$count_mean = $MEANS->find('all')
				->where(['active'=>1,'contribute <'=>10])
				->count();
		$this->set(['means'=>$means,'defines'=>$defines,'count_mean'=>$count_mean,'count_define'=>$count_define]);
	}
	public $paginate=[
        'limit'=>5,
        'order'=>[
            ]
    ];
}