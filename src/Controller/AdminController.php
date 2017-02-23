<?php
namespace App\Controller;

use App\Controller\AppController;

class AdminController extends AppController{


    public function index($id=0)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        

    }
}
