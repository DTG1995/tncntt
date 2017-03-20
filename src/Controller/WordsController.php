<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Words Controller
 *
 * @property \App\Model\Table\WordsTable $Words
 */
class WordsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->viewBuilder()->setLayout('Admin\default');
        $words = $this->paginate($this->Words);
        $this->set(compact('words'));
        $this->set('_serialize', ['words']);
    }

    /**
     * View method
     *
     * @param string|null $id Word id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $this->viewBuilder()->setLayout('Admin\default');
        $word = $this->Words->get($id, [
            'contain' => ['Definitions' => ['Users', 'Categorys'], 'Means' => ['Users', 'Categorys']]
        ]);

        $this->set('word', $word);
        $this->set('_serialize', ['word']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->viewBuilder()->setLayout('Admin\default');
        $word = $this->Words->newEntity();
        if ($this->request->is('post')) {
            $word = $this->Words->patchEntity($word, $this->request->getData());
            if ($this->Words->save($word)) {
                $this->Flash->success(__('The word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The word could not be saved. Please, try again.'));
        }
        $this->set(compact('word'));
        $this->set('_serialize', ['word']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Word id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $this->viewBuilder()->setLayout('Admin\default');
        $word = $this->Words->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $word = $this->Words->patchEntity($word, $this->request->getData());
            if ($this->Words->save($word)) {
                $this->Flash->success(__('The word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The word could not be saved. Please, try again.'));
        }
        $this->set(compact('word'));
        $this->set('_serialize', ['word']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Word id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $word = $this->Words->get($id);
        if ($this->Words->delete($word)) {
            $this->Flash->success(__('The word has been deleted.'));
        } else {
            $this->Flash->error(__('The word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addwordmean() {
        $active = 0;
        $contribute=0;
        if($this->Auth->user()) {
             if($this->Auth->user('isadmin')==0)
            {
                $active = 1;
                $contribute=1;
            }else if($this->Auth->user('isadmin')==1)
            {
                $this->viewBuilder()->setLayout('Admin\default');
                $active=1;
                $contribute=10;
            }
        }
        $word = $this->Words->newEntity();
        $Categorys = TableRegistry::get('Categorys');
        $catelist = $Categorys->find('list');
        $data = $this->request->getData();
        if ($this->request->is('post')) {
            $means =[];
            $defines=[];
            // $num = (count($data)-1)/2;
            // for($i=0;$i<$num;$i++){
            //     echo array_keys($data,$data[$i*2+1]);
            // }
            foreach ($data as $key => $value) {
                $type = substr($key, 0, 4);
                $index = substr($key, strlen($key)-1);
                if($type=="mean"){
                    if(!array_key_exists($index,$means)){
                        if(strlen($key)<7)
                            $means=array_merge($means,[$index=>['mean'=>$value,'cate'=>'']]);
                        else
                            $means=array_merge($means,[$index=>['mean'=>'','cate'=>$value]]);
                    }
                    else{
                        if(strlen($key)<7)
                            $means[$index]['mean']=$value;
                        else 
                            $means[$index]['cate']=$value;
                    }
                }
                else if($type=="defi"){
                    if(!array_key_exists($index,$defines)){
                        if(strlen($key)<7)
                            $defines=array_merge($defines,[$index=>['define'=>$value,'cate'=>'']]);
                        else
                            $defines=array_merge($defines,[$index=>['define'=>'','cate'=>$value]]);
                    }
                    else{
                        if(strlen($key)<7)
                            $defines[$index]['define']=$value;
                        else 
                            $defines[$index]['cate']=$value;
                    }
                }
            }
            //array_merge($means,['index'=>['mean'=>'','cate'=>'value']]);
            $word = $this->Words->newEntity();
            $word->word = $data['word'];
            if ($this->Words->save($word)) {
            //save mean
                foreach ($means as $mean) {
                    if($mean['mean'])
                    {
                        $MEANS = TableRegistry::get('Means');
                        $meanobj = $MEANS->newEntity();
                        $meanobj->mean = $mean['mean'];
                        $meanobj->category_id = $mean['cate'];
                        $meanobj->word_id = $word->id;
                        $meanobj->user_id = $this->Auth->user('id');
                        $meanobj->active = $active;
                        $meanobj->contribute=$contribute;
                        $MEANS->save($meanobj);
                    }
                }

                foreach ($defines as $define) {
                    if($define['define'] != "")
                    {
                        $DEFINITIONS = TableRegistry::get('Definitions');
                        $definitionobj = $DEFINITIONS->newEntity();
                        $definitionobj->define = $define['define'];
                        $definitionobj->category_id = $define['cate'];
                        $definitionobj->word_id = $word->id;
                        $definitionobj->user_id = $this->Auth->user('id');
                        $definitionobj->active = $active;
                        $definitionobj->contribute=$contribute;
                        $DEFINITIONS->save($definitionobj);
                    }
                }
                if(!$this->Auth->user('isadmin')){
                    $user_id = ($this->Auth->user()?$this->Auth->user('id'):$this->get_client_ip());
                    $this->addNotification('add','word',$word->id,'Đóng góp từ '.$word->word,$user_id);     
                }
                if ($active == 1) {
                    return $this->redirect(['action' => 'index']);
                } else {
                    return $this->redirect(['controller' => 'pages', 'action' => 'display']);
                }
            }
        }
        $this->set("catelist", $catelist);
        $this->set("word", $word);
    }

    public $paginate = [
        'limit' => 10,
        'order' => [
            'Words.word' => 'asc'
        ]
    ];

}
