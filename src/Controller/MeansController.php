<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Means Controller
 *
 * @property \App\Model\Table\MeansTable $Means
 */
class MeansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $means = $this->paginate($this->Means);

        $this->set(compact('means'));
        $this->set('_serialize', ['means']);
    }

    /**
     * View method
     *
     * @param string|null $id Mean id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mean = $this->Means->get($id, [
            'contain' => []
        ]);

        $this->set('mean', $mean);
        $this->set('_serialize', ['mean']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mean = $this->Means->newEntity();
        if ($this->request->is('post')) {
            $mean = $this->Means->patchEntity($mean, $this->request->data);
            if ($this->Means->save($mean)) {
                $this->Flash->success(__('The mean has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mean could not be saved. Please, try again.'));
        }
        $this->set(compact('mean'));
        $this->set('_serialize', ['mean']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mean id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mean = $this->Means->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mean = $this->Means->patchEntity($mean, $this->request->data);
            if ($this->Means->save($mean)) {
                $this->Flash->success(__('The mean has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mean could not be saved. Please, try again.'));
        }
        $this->set(compact('mean'));
        $this->set('_serialize', ['mean']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mean id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mean = $this->Means->get($id);
        if ($this->Means->delete($mean)) {
            $this->Flash->success(__('The mean has been deleted.'));
        } else {
            $this->Flash->error(__('The mean could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
