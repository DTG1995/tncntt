<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Commentdefinitions Controller
 *
 * @property \App\Model\Table\CommentdefinitionsTable $Commentdefinitions
 */
class CommentdefinitionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Definitions', 'Users']
        ];
        $commentdefinitions = $this->paginate($this->Commentdefinitions);

        $this->set(compact('commentdefinitions'));
        $this->set('_serialize', ['commentdefinitions']);
    }

    /**
     * View method
     *
     * @param string|null $id Commentdefinition id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $commentdefinition = $this->Commentdefinitions->get($id, [
            'contain' => ['Definitions', 'Users', 'Commentdefinitions']
        ]);

        $this->set('commentdefinition', $commentdefinition);
        $this->set('_serialize', ['commentdefinition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $commentdefinition = $this->Commentdefinitions->newEntity();
        if ($this->request->is('post')) {
            $commentdefinition = $this->Commentdefinitions->patchEntity($commentdefinition, $this->request->getData());
            if ($this->Commentdefinitions->save($commentdefinition)) {
                $this->Flash->success(__('The commentdefinition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commentdefinition could not be saved. Please, try again.'));
        }
        $definitions = $this->Commentdefinitions->Definitions->find('list', ['limit' => 200]);
        $users = $this->Commentdefinitions->Users->find('list', ['limit' => 200]);
        $this->set(compact('commentdefinition', 'definitions', 'users'));
        $this->set('_serialize', ['commentdefinition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Commentdefinition id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $commentdefinition = $this->Commentdefinitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $commentdefinition = $this->Commentdefinitions->patchEntity($commentdefinition, $this->request->getData());
            if ($this->Commentdefinitions->save($commentdefinition)) {
                $this->Flash->success(__('The commentdefinition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The commentdefinition could not be saved. Please, try again.'));
        }
        $definitions = $this->Commentdefinitions->Definitions->find('list', ['limit' => 200]);
        $users = $this->Commentdefinitions->Users->find('list', ['limit' => 200]);
        $this->set(compact('commentdefinition', 'definitions', 'users'));
        $this->set('_serialize', ['commentdefinition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Commentdefinition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $commentdefinition = $this->Commentdefinitions->get($id);
        if ($this->Commentdefinitions->delete($commentdefinition)) {
            $this->Flash->success(__('The commentdefinition has been deleted.'));
        } else {
            $this->Flash->error(__('The commentdefinition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function comment($define_id=0,$content=null,$parent=0){
		if($this->Auth->user()!=null){
			$comment = $this->Commentdefinitions->newEntity();
			$comment->content = $content;
			$comment->user_id=$this->Auth->user('id');
			if($parent!=0)
			    $comment->commentdefinition_id=$parent;
			$comment->created = Time::now();
			$comment->definition_id = $define_id;
			if ($this->Commentdefinitions->save($comment)) {
				if($parent!=0)
                    $query = $this->Commentdefinitions->find('all',[
                        'fields'=>['id','content','created','user_name'=>'users.namedisplay','user_id'=>'users.id',
                        ],
                        'conditions'=>['commentdefinitions.definition_id'=>$define_id,'commentdefinitions.commentdefinition_id'=>$parent],
                        'contain'=>[
                            'Childrendefinecomment'=>[
                            'fields'=>['commentdefinition_id','count'=>'count(Childrendefinecomment.id)'
                            ],
                            'Users'
                        ],'Users'],
                        'order'=>['commentdefinitions.created'=>'DESC'],
                        'limit'=>3
                    ]);
				else 
                    $query = $this->Commentdefinitions->find('all',[
                        'fields'=>['id','content','created','user_name'=>'users.namedisplay','user_id'=>'users.id',
                        ],
                        'conditions'=>['commentdefinitions.definition_id'=>$define_id,'commentdefinitions.commentdefinition_id IS'=> NULL],
                        'contain'=>[
                            'Childrendefinecomment'=>[
                            'fields'=>['commentdefinition_id','count'=>'count(Childrendefinecomment.id)'
                            ],
                            'Users'
                        ],'Users'],
                        'order'=>['commentdefinitions.created'=>'DESC'],
                        'limit'=>3
                    ]);
			}
			$this->set('count',$query->count());
            $this->set('comments',$query->all()->toArray());
			$this->set('definition',$define_id);
			$this->set('parent',$parent);
			// 			$this->set('_serialize', ['likemean']);
		}else return null;
	}
}
