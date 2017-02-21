<?php
namespace App\Controller;

use App\Controller\AppController;

class AdminController extends AppController{


    public function index($id=0)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        if($id==0)
        {
            $this->loadModel('Words');
            $words = $this->paginate('Words');
            $this->set('words', $words);
            $this->render('\words\index');
        }
        else if($id ==1)
        {
           $this->re('/word/add');
        }

    }
}
