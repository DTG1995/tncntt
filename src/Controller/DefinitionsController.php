<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Definitions Controller
 *
 * @property \App\Model\Table\DefinitionsTable $Definitions
 */
class DefinitionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('Admin/default');
        $this->paginate = [
            'contain' => ['Words', 'Users', 'Categorys']
        ];
        $definitions = $this->paginate($this->Definitions);

        $this->set(compact('definitions'));
        $this->set('_serialize', ['definitions']);
    }

    /**
     * View method
     *
     * @param string|null $id Definition id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('Admin/default');
        $definition = $this->Definitions->get($id, [
            'contain' => ['Words', 'Users', 'Categorys', 'Commentdefinitions'=>'Users', 'Likedefinitions'=>['Users','Definitions'
        ]]]);

        $this->set('definition', $definition);
        $this->set('_serialize', ['definition']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('Admin/default');
        $definition = $this->Definitions->newEntity();
        if ($this->request->is('post')) {
            $definition = $this->Definitions->patchEntity($definition, $this->request->data);
            if ($this->Definitions->save($definition)) {
                $this->Flash->success(__('The definition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The definition could not be saved. Please, try again.'));
        }
        $words = $this->Definitions->Words->find('list', ['limit' => 200]);
        $users = $this->Definitions->Users->find('list', ['limit' => 200]);
        $categorys = $this->Definitions->Categorys->find('list', ['limit' => 200]);
        $this->set(compact('definition', 'words', 'users', 'categorys'));
        $this->set('_serialize', ['definition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Definition id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('Admin/default');
        $definition = $this->Definitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $definition = $this->Definitions->patchEntity($definition, $this->request->data);
            if ($this->Definitions->save($definition)) {
                $this->Flash->success(__('The definition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The definition could not be saved. Please, try again.'));
        }
        $words = $this->Definitions->Words->find('list', ['limit' => 200]);
        $users = $this->Definitions->Users->find('list', ['limit' => 200]);
        $categorys = $this->Definitions->Categorys->find('list', ['limit' => 200]);
        $this->set(compact('definition', 'words', 'users', 'categorys'));
        $this->set('_serialize', ['definition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Definition id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->viewBuilder()->setLayout('Admin/default');
        $this->request->allowMethod(['post', 'delete']);
        $definition = $this->Definitions->get($id);
        if ($this->Definitions->delete($definition)) {
            $this->Flash->success(__('The definition has been deleted.'));
        } else {
            $this->Flash->error(__('The definition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function contribute($idword=null, $word=null){
        $categorys = $this->Definitions->Categorys->find('list', ['limit' => 200]);
        if ($this->request->is('post')) {
            $data =$this->request->getData();
            $ip = $this->get_client_ip();
            $length = count($data)/2;
            $ok = false;
            for($i=0;$i<$length;$i++){
                if($data['define'.$i]!="")
                    {
                        $define = $this->Definitions->newEntity();
                        $define->word_id = $idword;
                        $define->define = $data['define'.$i];
                        $define->category_id = $data['cate'.$i];
                        $define->user_id = $this->Auth->user('id');
                        $define->author = $ip;
                        $define->contribute = 1;
                        $define->active = false;
                        if($this->Definitions->save($define))
                        {
                            $ok = true;
                            if(!$this->Auth->user('isadmin')){
                                $user_id = ($this->Auth->user()?$this->Auth->user('id'):$this->get_client_ip());
                                $this->addNotification('add','define',$define->id,'Đóng góp nghĩa '.$define->define.' của từ '.$word,$user_id);     
                            } 
                        }
                        else $ok = false;
                        pr($define);
                    }
            }
            if($ok)
                $this->redirect(['controller'=>'pages', 'action' => 'contribute']);
        }
        $this->set('categorys',$categorys);
        $this->set('word',$word);
    }
    public function changecontribute($id=null,$value=0){
            $definition = $this->Definitions->get($id);
            $contributed = false;
            $iduser = $this->Auth->user('id');
            if($this->Auth->user()){
                $LikeDefinitions = TableRegistry::get('Likedefinitions');
                $like = $LikeDefinitions->find('all')
                    ->where(['user_id'=>$iduser,'definition_id'=>$id])
                    ->first();
                if(!$like)
                {
                    $like = $LikeDefinitions->newEntity();
                    $definition->contribute +=$value;    
                    $like->user_id = $this->Auth->user('id');
                    $like->definition_id = $id;
                    $like->islike = $value;
                }
                else{
                    if($like->islike != $value)
                    {
                        $definition->contribute +=$value;
                        $like->islike = $value;
                    }
                    else{
                        $contributed=true;                        
                    }
                }
                $LikeDefinitions->save($like);
            }
            $this->Definitions->save($definition);
            $this->set('contribute',$definition->contribute);
            $this->set('contributed',$contributed);
    }
    function active($id){
        if($this->Auth->user('isadmin')){
            $definition = $this->Definitions->get($id, [
            'contain' => []
        ]);
            $definition->active = !$definition->active;
            $this->Definitions->save($definition);
        }
    }
    public function setcontribute($id=null,$value=null){
        if($id || $value){
            if($this->Auth->user('isadmin')){
            $definition = $this->Definitions->get($id, [
            'contain' => []
        ]);
            $definition->contribute =$value;
            $this->Definitions->save($definition);
        }
        }
    }
    public $paginate=[
        'limit'=>10,
        'order'=>[
                'Definitions.define'=>'asc'
            ]
    ];
}
