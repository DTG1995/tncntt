<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Definitons Controller
 *
 * @property \App\Model\Table\DefinitonsTable $Definitons
 */
class DefinitonsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $definitons = $this->paginate($this->Definitons);

        $this->set(compact('definitons'));
        $this->set('_serialize', ['definitons']);
    }

    /**
     * View method
     *
     * @param string|null $id Definiton id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $definiton = $this->Definitons->get($id, [
            'contain' => []
        ]);

        $this->set('definiton', $definiton);
        $this->set('_serialize', ['definiton']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $definiton = $this->Definitons->newEntity();
        if ($this->request->is('post')) {
            $definiton = $this->Definitons->patchEntity($definiton, $this->request->data);
            if ($this->Definitons->save($definiton)) {
                $this->Flash->success(__('The definiton has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The definiton could not be saved. Please, try again.'));
        }
        $this->set(compact('definiton'));
        $this->set('_serialize', ['definiton']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Definiton id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $definiton = $this->Definitons->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $definiton = $this->Definitons->patchEntity($definiton, $this->request->data);
            if ($this->Definitons->save($definiton)) {
                $this->Flash->success(__('The definiton has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The definiton could not be saved. Please, try again.'));
        }
        $this->set(compact('definiton'));
        $this->set('_serialize', ['definiton']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Definiton id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $definiton = $this->Definitons->get($id);
        if ($this->Definitons->delete($definiton)) {
            $this->Flash->success(__('The definiton has been deleted.'));
        } else {
            $this->Flash->error(__('The definiton could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
