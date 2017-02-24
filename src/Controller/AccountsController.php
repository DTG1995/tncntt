<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accounts Controller
 *
 * @property \App\Model\Table\AccountsTable $Accounts
 */
class AccountsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $accounts = $this->paginate($this->Accounts);

        $this->set(compact('accounts'));
        $this->set('_serialize', ['accounts']);
    }

    /**
     * View method
     *
     * @param string|null $id Account id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $account = $this->Accounts->get($id, [
            'contain' => []
        ]);

        $this->set('account', $account);
        $this->set('_serialize', ['account']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $account = $this->Accounts->newEntity();
        if ($this->request->is('post')) {
            $account = $this->Accounts->patchEntity($account, $this->request->data);
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $this->set(compact('account'));
        $this->set('_serialize', ['account']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Account id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $account = $this->Accounts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $account = $this->Accounts->patchEntity($account, $this->request->data);
            if ($this->Accounts->save($account)) {
                $this->Flash->success(__('The account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The account could not be saved. Please, try again.'));
        }
        $this->set(compact('account'));
        $this->set('_serialize', ['account']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Account id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $this->request->allowMethod(['post', 'delete']);
        $account = $this->Accounts->get($id);
        if ($this->Accounts->delete($account)) {
            $this->Flash->success(__('The account has been deleted.'));
        } else {
            $this->Flash->error(__('The account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    function check_account_data($data){
        $return = false;
       
     
        $user = $this->Accounts->get($data['email'], [
            'contain' => []
        ]);
		// not found
		if(!empty($user)) {
			// check password
			if($user->PASSWORD ==$data['password']) {
				$return = $user;
			}
            
            
		}

	return $return;
    }
    function login() {
		//$salt = Configure::read('Security.salt');
		//echo md5('password'.$salt);

		// redirect user if already logged in
        $session = $this->request->session();
        $account = $this->Accounts->newEntity();
		if( $session->check('Account') ) {
			$this->redirect(array('controller'=>'admin','action'=>'index','admin'=>true));
		}
		if(!empty($this->request->data)) {

			// set the form data to enable validation
            // $data = $this->Accounts->patchEntity($account,$this->request->data);
			// $this->Account->set( $this->request->data );
			// see if the data validates
				// check user is valid
           
            $result = $this->check_account_data($this->request->data);
        
            if( $result ) {
                // update login time
                $result->LAST_LOGIN = date("Y-m-d H:i:sa");
                if($this->Accounts->save($result))
                {
                // save to session
                    $session->write('Account',$result);
                //$session->setFlash('You have successfully logged in','flash_good');
                $this->redirect(array('controller'=>'admin','action'=>'index','admin'=>true));
                }
            } else {
                //$session->setFlash('Either your Username of Password is incorrect','flash_bad');
            }
		}
	}


        /**
        * Logs out a User
        */
        function logout() {
            $session = $this->request->session();
            if($session->check('Account')) {
                $session->delete('Account');
                $session->destroy();
                // $session->setFlash('You have successfully logged out','flash_good');
            }

            $this->redirect(array('action'=>'login'));
        }

}
