<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
class AdminController extends AppController{


    public function index($id=0)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $Notifications = TableRegistry::get('Notifications');
        $session = $this->request->session();
        $contributes = $Notifications->find()
            ->where(['type'=>'add'])
            ->order(['created'=>'DESC'])
            ->limit(10)
            ->all();
        $count_contributes = $Notifications->find('all')
            ->where(['type'=>'add','seen'=>0])
            ->order(['created'=>'DESC'])
            ->all()->count();
        $session->write('contributes', $contributes);
        $session->write('count_contributes', $count_contributes);
    }
}
