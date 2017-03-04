<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Definitions Controller
 *
 * @property \App\Model\Table\DefinitionsTable $Definitions
 */
class DefinitionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Words', 'Users', 'Categorys']
        ];
        $definitions = $this->paginate($this->Definitions);

        $this->set(compact('definitions'));
        $this->set('_serialize', ['definitions']);
    }

    /**
     * View method
     *
     * @param string|null $id Definition id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $definition = $this->Definitions->get($id, [
            'contain' => ['Words', 'Users', 'Categorys', 'Commentdefinitions', 'Likedefinitions']
        ]);

        $this->set('definition', $definition);
        $this->set('_serialize', ['definition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $definition = $this->Definitions->newEntity();
        if ($this->request->is('post')) {
            $definition = $this->Definitions->patchEntity($definition, $this->request->getData());
            if ($this->Definitions->save($definition)) {
                $this->Flash->success(__('The definition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The definition could not be saved. Please, try again.'));
        }
        $words = $this->Definitions->Words->find('list', ['limit' => 200]);
        $users = $this->Definitions->Users->find('list', ['limit' => 200]);
        $categorys = $this->Definitions->Categorys->find('list', ['limit' => 200]);
        $this->set(compact('definition', 'words', 'users', 'categorys'));
        $this->set('_serialize', ['definition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Definition id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $definition = $this->Definitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $definition = $this->Definitions->patchEntity($definition, $this->request->getData());
            if ($this->Definitions->save($definition)) {
                $this->Flash->success(__('The definition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The definition could not be saved. Please, try again.'));
        }
        $words = $this->Definitions->Words->find('list', ['limit' => 200]);
        $users = $this->Definitions->Users->find('list', ['limit' => 200]);
        $categorys = $this->Definitions->Categorys->find('list', ['limit' => 200]);
        $this->set(compact('definition', 'words', 'users', 'categorys'));
        $this->set('_serialize', ['definition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Definition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $definition = $this->Definitions->get($id);
        if ($this->Definitions->delete($definition)) {
            $this->Flash->success(__('The definition has been deleted.'));
        } else {
            $this->Flash->error(__('The definition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
