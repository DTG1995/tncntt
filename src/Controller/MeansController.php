<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Means Controller
 *
 * @property \App\Model\Table\MeansTable $Means
 */
class MeansController extends AppController
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
        $means = $this->paginate($this->Means);

        $this->set(compact('means'));
        $this->set('_serialize', ['means']);
    }

    /**
     * View method
     *
     * @param string|null $id Mean id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mean = $this->Means->get($id, [
            'contain' => ['Words', 'Users', 'Categorys', 'Commentmeans', 'Likemeans']
        ]);

        $this->set('mean', $mean);
        $this->set('_serialize', ['mean']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mean = $this->Means->newEntity();
        if ($this->request->is('post')) {
            $mean = $this->Means->patchEntity($mean, $this->request->data);
            if ($this->Means->save($mean)) {
                $this->Flash->success(__('The mean has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mean could not be saved. Please, try again.'));
        }
        $words = $this->Means->Words->find('list', ['limit' => 200]);
        $users = $this->Means->Users->find('list', ['limit' => 200]);
        $categorys = $this->Means->Categorys->find('list', ['limit' => 200]);
        $this->set(compact('mean', 'words', 'users', 'categorys'));
        $this->set('_serialize', ['mean']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mean id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mean = $this->Means->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mean = $this->Means->patchEntity($mean, $this->request->data);
            if ($this->Means->save($mean)) {
                $this->Flash->success(__('The mean has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mean could not be saved. Please, try again.'));
        }
        $words = $this->Means->Words->find('list', ['limit' => 200]);
        $users = $this->Means->Users->find('list', ['limit' => 200]);
        $categorys = $this->Means->Categorys->find('list', ['limit' => 200]);
        $this->set(compact('mean', 'words', 'users', 'categorys'));
        $this->set('_serialize', ['mean']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mean id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mean = $this->Means->get($id);
        if ($this->Means->delete($mean)) {
            $this->Flash->success(__('The mean has been deleted.'));
        } else {
            $this->Flash->error(__('The mean could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function contribute($idword=null, $word=null){
        $categorys = $this->Means->Categorys->find('list', ['limit' => 200]);
        if ($this->request->is('post')) {
            $data =$this->request->getData();
            $ip = $this->get_client_ip();
            $length = count($data)/2;
            $ok = false;
            for($i=0;$i<$length;$i++){
                if($data['mean'.$i]!="")
                    {
                        $mean = $this->Means->newEntity();
                        $mean->word_id = $idword;
                        $mean->mean = $data['mean'.$i];
                        $mean->category_id = $data['cate'.$i];
                        $mean->user_id = $this->Auth->user('id');
                        $mean->author = $ip;
                        $mean->contribute = 1;
                        $mean->active = false;
                        if($this->Means->save($mean))
                            $ok = true;
                        else $ok = false;
                        pr($mean);
                    }
            }
            if($ok)
                $this->redirect(['action' => 'index']);
        }
        $this->set('categorys',$categorys);
        $this->set('word',$word);
    }
    public $paginate=[
        'limit'=>10,
        'order'=>[
                'Means.mean'=>'asc'
            ]
    ];
}
