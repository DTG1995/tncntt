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
        $this->viewBuilder()->setLayout('Admin\default');
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
        $this->viewBuilder()->setLayout('Admin\default');
        $likedefinition = $this->Likedefinitions->get($id, [
            'contain' => []
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
        $this->viewBuilder()->setLayout('Admin\default');
        $likedefinition = $this->Likedefinitions->newEntity();
        if ($this->request->is('post')) {
            $likedefinition = $this->Likedefinitions->patchEntity($likedefinition, $this->request->data);
            if ($this->Likedefinitions->save($likedefinition)) {
                $this->Flash->success(__('The likedefinition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likedefinition could not be saved. Please, try again.'));
        }
        $this->set(compact('likedefinition'));
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
        $this->viewBuilder()->setLayout('Admin\default');
        $likedefinition = $this->Likedefinitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $likedefinition = $this->Likedefinitions->patchEntity($likedefinition, $this->request->data);
            if ($this->Likedefinitions->save($likedefinition)) {
                $this->Flash->success(__('The likedefinition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likedefinition could not be saved. Please, try again.'));
        }
        $this->set(compact('likedefinition'));
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
        $this->viewBuilder()->setLayout('Admin\default');
        $this->request->allowMethod(['post', 'delete']);
        $likedefinition = $this->Likedefinitions->get($id);
        if ($this->Likedefinitions->delete($likedefinition)) {
            $this->Flash->success(__('The likedefinition has been deleted.'));
        } else {
            $this->Flash->error(__('The likedefinition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
