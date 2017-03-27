<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
class AdminController extends AppController{


    public function index($id=0)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        
    }
}
