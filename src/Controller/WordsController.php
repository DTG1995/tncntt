<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Words Controller
 *
 * @property \App\Model\Table\WordsTable $Words
 */
class WordsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
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
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('Admin\default');
        $word = $this->Words->get($id, [
            'contain' => ['Definitions'=>['Users','Categorys'], 'Means'=>['Users','Categorys']]
        ]);

        $this->set('word', $word);
        $this->set('_serialize', ['word']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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
    public function edit($id = null)
    {
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $word = $this->Words->get($id);
        if ($this->Words->delete($word)) {
            $this->Flash->success(__('The word has been deleted.'));
        } else {
            $this->Flash->error(__('The word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addwordmean()
    {
        if($this->Auth->user('isadmin'))
            $this->viewBuilder()->setLayout('Admin\default');
        $word = $this->Words->newEntity();
        $Categorys = TableRegistry::get('Categorys');
        $catelist= $Categorys->find('list');
        $data = $this->request->getData();
        if($this->request->is('post'))
        {
            $word = $this->Words->newEntity();
            $word->word = $data['word'];
            if($this->Words->save($word)){
                $MEANS = TableRegistry::get('Means');
                $meanobj = $MEANS->newEntity();
                $meanobj->mean = $data['mean'];
                $meanobj->category_id = $data['cate_mean'];
                $meanobj->word_id = $word->id;
                $meanobj->user_id = $this->Auth->user('id');
                $MEANS->save($meanobj);

                $DEFINITIONS=TableRegistry::get('Definitions');
                $definitionobj=$DEFINITIONS->newEntity();
                $definitionobj->define=$data['definition'];
                $definitionobj->category_id=$data['cate_mean'];
                $definitionobj->word_id=$word->id;
                $definitionobj->user_id=$this->Auth->user('id');
                $DEFINITIONS->save($definitionobj);

                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set("catelist",$catelist);   
        $this->set("word",$word);     
    }
    public $paginate=[
        'limit'=>10,
        'order'=>[
                'Words.word'=>'asc'
            ]
    ];
}
