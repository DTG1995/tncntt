<?php
namespace App\Controller;

use App\Controller\AppController;

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
            'contain' => []
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
        $this->set(compact('commentmean'));
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
        $this->set(compact('commentmean'));
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
        } else {
            $this->Flash->error(__('The commentmean could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
