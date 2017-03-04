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
				                    'conditions'=>['WORDS.WORD LIKE'=>'%'.$str.'%']
				                    ]);
				$words = $query->all();
			}
			else $words = [];
			$this->set('words',$words);
	}
	function getresult($str=null){
		$WORDS = TableRegistry::get('Words');
		$Means = TableRegistry::get('Means');
		$Definitions = TableRegistry::get('Definitions');
		$query = $WORDS->find('all',[
					'fields'=>['id','word'],
		            'conditions'=>['Words.word'=>$str],
					'contain'=>[
						'Means'=>[
							'fields'=>['id','mean','word_id','contribute','user_id'=>'users.id',
							'user_display'=>'users.namedisplay','cate_id'=>'categorys.id', 'cate_name'=>'categorys.name'
							],
							'sort'=>['means.contribute'=>'DESC'],
							'Likemeans'=>[
								'fields'=>['like'=>'sum(islike=1)','dislike'=>'sum(islike=-1)','mean_id']
							],
							'Commentmeans'=>[
								'conditions'=>['commentmeans.commentmean_id IS NULL'],
								'sort'=>['commentmeans.created'=>'DESC'],
								'Children',
								'Users',
								],'Users',
							'Categorys'
						],
						'Definitions'=>[
							'fields'=>['id','define','word_id','contribute','user_id'=>'users.id',
							'user_display'=>'users.namedisplay','cate_id'=>'categorys.id', 'cate_name'=>'categorys.name'
							],
							'sort'=>['definitions.contribute'=>'DESC'],
							'Likedefinitions'=>[
								'fields'=>['like'=>'sum(islike=1)','dislike'=>'sum(islike=-1)','definition_id']
							],
							'Commentdefinitions'=>[
								'conditions'=>['commentdefinitions.commentdefinition_id IS NULL'],
								'sort'=>['commentdefinitions.created'=>'DESC'],
								'Childrendefinecomment',
								'Users',
								],'Users',
							'Categorys'
						]
					]
		        ]);
		$word = $query->all()->first();
		// $query->all()['means']->contain(['likemeans','commentmeans']);
		
		// if($str!=null){
		// 	$query = $Means->find('all',[
		// 					'fields'=>['ID','MEAN','CREATED'],
		// 	                'conditions'=>['MEANS.WORD_ID'=>$word->ID],
		// 	                'order'=>['MEANS.CONTRIBUTE'=>'ASC'],
		// 					'contain'=>['Likemeans','Commentmeans','Users']
		// 	            ]);
		// 	$means = $query->all();
		// 	$query = $Definitions->find('all',[
		// 					'fields'=>['ID','DEFINITION','CREATED'],
		// 	                'conditions'=>['DEFINITIONS.WORD_ID'=>$word->ID],
		// 	                'order'=>['DEFINITIONS.CONTRIBUTE'=>'ASC'],
		// 					'contain'=>['Likedefinitions','Commentdefinitions','Users']
		// 	            ]);
		// 	$definitions = $query->all();
		// }
		// else {
		// 	$definitions =[];
		// 	$means=[];
		// }
		// $this->set('means',$means);
		// $this->set('definition',$definitions);
		$this->set('word',$word);
	}
}

