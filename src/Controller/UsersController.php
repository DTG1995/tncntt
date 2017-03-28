<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $user = $this->Users->get($id, [
            'contain' => ['Commentdefinitions'=>['Users','Definitions'], 'Commentmeans'=>['Users','Means'], 'Definitions'=>['Users','Categorys','Words'], 'Likedefinitions'=>['Users','Definitions'], 'Likemeans'=>['Users','Means'], 'Means'=>['Words','Users','Categorys']]]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login()
    {
        // if($this->Auth->user('id') == null)
        // {
            if($this->request->is('post'))
            {
                $user=$this->Auth->identify();
                if($user)
                { 
                    $this->Auth->setUser($user);
                    if($this->Auth->user('isadmin'))
                    {
                        return $this->redirect(['controller'=>'admin','action'=>'index']);
                    }
                    else
                    {
                    return $this->redirect(['controller'=>'pages','action'=>'display']);

                    }
                
                }
                return $this->redirect(['Controller'=>'users','action'=>'login']);
            }
        // }
        // else{
        //     if($this->Auth->user('isadmin'))
        //         {
        //             return $this->redirect(['controller'=>'admin','action'=>'index']);
        //         }
        //         else
        //         {
        //         return $this->redirect(['controller'=>'pages','action'=>'display']);

        //         }
        // }
    }

    public function logout()
        {
           $this->Auth->logout();
           return $this->redirect(['controller'=>'pages','action'=>'display']);
        }

    public function adduser()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            pr($user);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller'=>'pages','action' => 'display']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    public $paginate=[
        'limit'=>10,
        'order'=>[
                'Users.username'=>'asc'
            ]
    ];
}
