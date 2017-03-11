<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;


/**
* Commentmeans Controller
 *
 * @property \App\Model\Table\CommentmeansTable $Commentmeans
 */
class CommentmeansController extends AppController
{
	
	
	/**
	* Index method
	     *
	     * @return \Cake\Network\Response|null
	     */
	    public function index()
	    {
		$this->paginate = [
		            'contain' => ['Means', 'Users']
		        ];
		$commentmeans = $this->paginate($this->Commentmeans);
		
		$this->set(compact('commentmeans'));
		$this->set('_serialize', ['commentmeans']);
	}
	
	
	/**
	* View method
	     *
	     * @param string|null $id Commentmean id.
	     * @return \Cake\Network\Response|null
	     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	     */
	    public function view($id = null)
	    {
		$commentmean = $this->Commentmeans->get($id, [
		            'contain' => ['Means', 'Users', 'Commentmeans']
		        ]);
		
		$this->set('commentmean', $commentmean);
		$this->set('_serialize', ['commentmean']);
	}
	
	
	/**
	* Add method
	     *
	     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
	     */
	    public function add()
	    {
		$commentmean = $this->Commentmeans->newEntity();
		if ($this->request->is('post')) {
			$commentmean = $this->Commentmeans->patchEntity($commentmean, $this->request->data);
			if ($this->Commentmeans->save($commentmean)) {
				$this->Flash->success(__('The commentmean has been saved.'));
				
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The commentmean could not be saved. Please, try again.'));
		}
		$means = $this->Commentmeans->Means->find('list', ['limit' => 200]);
		$users = $this->Commentmeans->Users->find('list', ['limit' => 200]);
		$this->set(compact('commentmean', 'means', 'users'));
		$this->set('_serialize', ['commentmean']);
	}
	
	
	/**
	* Edit method
	     *
	     * @param string|null $id Commentmean id.
	     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
	     * @throws \Cake\Network\Exception\NotFoundException When record not found.
	     */
	    public function edit($id = null)
	    {
		$commentmean = $this->Commentmeans->get($id, [
		            'contain' => []
		        ]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$commentmean = $this->Commentmeans->patchEntity($commentmean, $this->request->data);
			if ($this->Commentmeans->save($commentmean)) {
				$this->Flash->success(__('The commentmean has been saved.'));
				
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The commentmean could not be saved. Please, try again.'));
		}
		$means = $this->Commentmeans->Means->find('list', ['limit' => 200]);
		$users = $this->Commentmeans->Users->find('list', ['limit' => 200]);
		$this->set(compact('commentmean', 'means', 'users'));
		$this->set('_serialize', ['commentmean']);
	}
	
	
	/**
	* Delete method
	     *
	     * @param string|null $id Commentmean id.
	     * @return \Cake\Network\Response|null Redirects to index.
	     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	     */
	    public function delete($id = null)
	    {
		$this->request->allowMethod(['post', 'delete']);
		$commentmean = $this->Commentmeans->get($id);
		if ($this->Commentmeans->delete($commentmean)) {
			$this->Flash->success(__('The commentmean has been deleted.'));
		}
		else {
			$this->Flash->error(__('The commentmean could not be deleted. Please, try again.'));
		}
		
		return $this->redirect(['action' => 'index']);
	}
	public function comment($mean_id=0,$content=null,$parent=0){
		if($this->Auth->user()!=null){
			
			$comment = $this->Commentmeans->newEntity();
			$comment->content = $content;
			$comment->user_id=$this->Auth->user('id');
			if($parent!=null)
			    $comment->commentmean_id=$parent;
			$comment->created = Time::now();
			$comment->mean_id = $mean_id;
			if ($this->Commentmeans->save($comment)) {
				if($parent!=0)
                    $query = $this->Commentmeans->find('all',[
                        'fields'=>['id','content','created','user_name'=>'users.namedisplay','user_id'=>'users.id',
                        ],
                        'conditions'=>['commentmeans.mean_id'=>$mean_id,'commentmeans.commentmean_id'=>$parent],
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
                    $query = $this->Commentmeans->find('all',[
                        'fields'=>['id','content','created','user_name'=>'users.namedisplay','user_id'=>'users.id',
                        ],
                        'conditions'=>['commentmeans.mean_id'=>$mean_id,'commentmeans.commentmean_id IS'=> NULL],
                        'contain'=>[
                            'Children'=>[
                            'fields'=>['commentmean_id','count'=>'count(Children.id)'
                            ],
                            'Users'
                        ],'Users'],
                        'order'=>['commentmeans.created'=>'DESC'],
                        'limit'=>3
                    ]);
			}
			$this->set('comments',$query->all()->toArray());
		}
		$this->set('count',$query->count());
		$this->set('mean',$mean_id);
		$this->set('parent',$parent);
	}
}
