<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Likedefinitions Controller
 *
 * @property \App\Model\Table\LikedefinitionsTable $Likedefinitions
 */
class LikedefinitionsController extends AppController
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
        $likedefinitions = $this->paginate($this->Likedefinitions);

        $this->set(compact('likedefinitions'));
        $this->set('_serialize', ['likedefinitions']);
    }

    /**
     * View method
     *
     * @param string|null $id Likedefinition id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $likedefinition = $this->Likedefinitions->get($id, [
            'contain' => ['Definitions', 'Users']
        ]);

        $this->set('likedefinition', $likedefinition);
        $this->set('_serialize', ['likedefinition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $likedefinition = $this->Likedefinitions->newEntity();
        if ($this->request->is('post')) {
            $likedefinition = $this->Likedefinitions->patchEntity($likedefinition, $this->request->getData());
            if ($this->Likedefinitions->save($likedefinition)) {
                $this->Flash->success(__('The likedefinition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likedefinition could not be saved. Please, try again.'));
        }
        $definitions = $this->Likedefinitions->Definitions->find('list', ['limit' => 200]);
        $users = $this->Likedefinitions->Users->find('list', ['limit' => 200]);
        $this->set(compact('likedefinition', 'definitions', 'users'));
        $this->set('_serialize', ['likedefinition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Likedefinition id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $likedefinition = $this->Likedefinitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $likedefinition = $this->Likedefinitions->patchEntity($likedefinition, $this->request->getData());
            if ($this->Likedefinitions->save($likedefinition)) {
                $this->Flash->success(__('The likedefinition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likedefinition could not be saved. Please, try again.'));
        }
        $definitions = $this->Likedefinitions->Definitions->find('list', ['limit' => 200]);
        $users = $this->Likedefinitions->Users->find('list', ['limit' => 200]);
        $this->set(compact('likedefinition', 'definitions', 'users'));
        $this->set('_serialize', ['likedefinition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Likedefinition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $likedefinition = $this->Likedefinitions->get($id);
        if ($this->Likedefinitions->delete($likedefinition)) {
            $this->Flash->success(__('The likedefinition has been deleted.'));
        } else {
            $this->Flash->error(__('The likedefinition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    function like($definition_id=null,$islike=0){
        if($this->Auth->user()!=null){
            $query = $this->Likedefinitions->find('all', [
                'conditions'=>['definition_id'=>$definition_id,'user_id'=>$this->Auth->user('id')]
            ]);
            $likedefinition = $query->all()->first();
            
            if($likedefinition==null)
            {
                $likedefinition = $this->Likedefinitions->newEntity();
                $likedefinition->definition_id = $definition_id;
                $likedefinition->user_id =$this->Auth->user('id');
                $likedefinition->islike = $islike;
            }
            else{
                if($likedefinition->islike == $islike)
                    $likedefinition->islike =0;
                else $likedefinition->islike = $islike;
            }
            if ($this->Likedefinitions->save($likedefinition)) {
                $query = $this->Likedefinitions->find()
                    ->select(['like'=>'SUM(islike=1)','dislike'=>'SUM(islike=-1)','mylike'=>'MAX(IF(user_id='.$this->Auth->user('id').',islike,0))','definition_id'])
                    ->where(['definition_id'=>$definition_id])
                    ->group(['definition_id'])
                    ->first();
                $this->set('likedefinition',$query);
            }
            
        }
    }
}
