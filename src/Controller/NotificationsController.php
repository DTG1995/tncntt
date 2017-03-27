<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 */
class NotificationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($type)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $this->paginate = [
            'contain' => []
        ];
        $notifications = $this->paginate($this->Notifications->find()
            ->where(['type'=>$type]));

        $this->set(compact('notifications'));
        $this->set('_serialize', ['notifications']);
    }

    /**
     * View method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $WORDS = TableRegistry::get('Words');
        $MEANS = TableRegistry::get('Means');
        $DEFINES = TableRegistry::get('Definitions');
        $notification = $this->Notifications->get($id, [
            'contain' => []
        ]);
        $notification->seen = 1;
        $this->Notifications->save($notification);
        if($notification){
            if($notification->type =="add"){
                switch($notification->cate){
                    case 'word':
                        $word = $WORDS->find()
                            ->where(['id'=>$notification->idtopic])
                            ->contain(['Means'=>function($q){
                                    return $q->order(['means.active','means.id'=>'DESC'])
                                        ->contain(['Categorys']);
                                },'Definitions'=>function($q){
                                    return $q->order(['definitions.active','definitions.id'=>'DESC'])
                                        ->contain(['Categorys']);
                                }])
                            ->first();
                    break;
                    case 'mean':
                        $mean= $MEANS->find()
                            ->where(['id'=>$notification->idtopic])
                            ->first();
                        $word= $WORDS->find()
                            ->where(['id'=>$mean->word_id])
                            ->contain(['Means'=>function($q){
                                return $q
                                    ->order(['means.active','means.id'=>'DESC'])
                                    ->contain(['Categorys']);
                            }])
                            ->first();
                    break;
                    case 'define':
                        $define = $DEFINES->find()
                            ->where(['id'=>$notification->idtopic])
                            ->first();
                        $word= $WORDS->find()
                            ->where(['id'=>$define->word_id])
                            ->contain(['Definitions'=>function($q){
                                return $q
                                    ->order(['definitions.active','definitions.id'=>'DESC'])
                                    ->contain(['Categorys']);
                            }])
                            ->first();
                    break;
                }
                $this->set('cate',$notification->cate);
                $this->set('word',$word);
            }
            else{
                switch($notification->cate){
                    case 'mean':
                        $mean= $MEANS->find()
                            ->where(['id'=>$notification->idtopic])
                            ->first();
                        $word= $WORDS->find()
                            ->where(['id'=>$mean->word_id])
                            ->contain(['Means'=>function($q){
                                return $q
                                    ->order(['means.active','means.id'=>'DESC'])
                                    ->contain(['Categorys']);
                            }])
                            ->first();
                    break;
                    case 'define':
                        $define = $DEFINES->find()
                            ->where(['id'=>$notification->idtopic])
                            ->first();
                        $word= $WORDS->find()
                            ->where(['id'=>$define->word_id])
                            ->contain(['Definitions'=>function($q){
                                return $q
                                    ->order(['definitions.active','definitions.id'=>'DESC'])
                                    ->contain(['Categorys']);
                            }])
                            ->first();
                    break;
                }
            }
            $this->set('notifi',$notification);
            $this->set('word',$word);
        }     
            
       

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notification = $this->Notifications->newEntity();
        if ($this->request->is('post')) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->data);
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users'));
        $this->set('_serialize', ['notification']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notification = $this->Notifications->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notification = $this->Notifications->patchEntity($notification, $this->request->data);
            if ($this->Notifications->save($notification)) {
                $this->Flash->success(__('The notification has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notification could not be saved. Please, try again.'));
        }
        $users = $this->Notifications->Users->find('list', ['limit' => 200]);
        $this->set(compact('notification', 'users'));
        $this->set('_serialize', ['notification']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Notification id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notification = $this->Notifications->get($id);
        if ($this->Notifications->delete($notification)) {
            $this->Flash->success(__('The notification has been deleted.'));
        } else {
            $this->Flash->error(__('The notification could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function getall(){
        
        $count_contributes = $this->Notifications->find('all')
            ->where(['type'=>'add','seen'=>0])
            ->all()->count();
        $this->set('count_contributes', $count_contributes);
        $count_warnings = $this->Notifications->find('all')
            ->where(['type'=>'warning','seen'=>0])
            ->all()->count();
        $this->set('count_warnings', $count_warnings?$count_warnings:0);
    }
    public function getalltype($type){
        $this->set('type',$type);
        if($type=="contribute")
        {
            $contributes = $this->Notifications->find()
            ->where(['type'=>'add'])
            ->order(['created'=>'DESC'])
            ->limit(5)
            ->all();
            $this->set('contributes', $contributes);
        }
        else{
            $warnings = $this->Notifications->find()
            ->where(['type'=>'warning'])
            ->order(['created'=>'DESC'])
            ->limit(5)
            ->all();
            $this->set('warnings',$warnings?$warnings:[]);
        }
    }
    
}
