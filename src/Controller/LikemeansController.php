<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Likemeans Controller
 *
 * @property \App\Model\Table\LikemeansTable $Likemeans
 */
class LikemeansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MEANS', 'Users']
        ];
        $likemeans = $this->paginate($this->Likemeans);

        $this->set(compact('likemeans'));
        $this->set('_serialize', ['likemeans']);
    }

    /**
     * View method
     *
     * @param string|null $id Likemean id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $likemean = $this->Likemeans->get($id, [
            'contain' => ['MEANS', 'Users']
        ]);

        $this->set('likemean', $likemean);
        $this->set('_serialize', ['likemean']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $likemean = $this->Likemeans->newEntity();
        if ($this->request->is('post')) {
            $likemean = $this->Likemeans->patchEntity($likemean, $this->request->data);
            if ($this->Likemeans->save($likemean)) {
                $this->Flash->success(__('The likemean has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likemean could not be saved. Please, try again.'));
        }
        $mEANS = $this->Likemeans->MEANS->find('list', ['limit' => 200]);
        $users = $this->Likemeans->Users->find('list', ['limit' => 200]);
        $this->set(compact('likemean', 'mEANS', 'users'));
        $this->set('_serialize', ['likemean']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Likemean id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $likemean = $this->Likemeans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $likemean = $this->Likemeans->patchEntity($likemean, $this->request->data);
            if ($this->Likemeans->save($likemean)) {
                $this->Flash->success(__('The likemean has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likemean could not be saved. Please, try again.'));
        }
        $mEANS = $this->Likemeans->MEANS->find('list', ['limit' => 200]);
        $users = $this->Likemeans->Users->find('list', ['limit' => 200]);
        $this->set(compact('likemean', 'mEANS', 'users'));
        $this->set('_serialize', ['likemean']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Likemean id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $likemean = $this->Likemeans->get($id);
        if ($this->Likemeans->delete($likemean)) {
            $this->Flash->success(__('The likemean has been deleted.'));
        } else {
            $this->Flash->error(__('The likemean could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
