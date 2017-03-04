<?php
namespace App\Controller;

use App\Controller\AppController;

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
            $commentdefinition = $this->Commentdefinitions->patchEntity($commentdefinition, $this->request->data);
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
            $commentdefinition = $this->Commentdefinitions->patchEntity($commentdefinition, $this->request->data);
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
}
