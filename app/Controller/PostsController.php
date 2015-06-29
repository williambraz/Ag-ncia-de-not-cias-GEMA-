<?php
class PostsController extends AppController {
    public $helpers = array('Html','Form','Session');
    public $components = array('RequestHandler');
    public $name = 'Posts';

    function index() {
        $this->set('posts', $this->Post->find('all'));
    }

    function home() {
        $this->set('posts', $this->Post->find('all'));
    }

    function view($id){
        if ($this->request->is('post')){
           $this->loadModel('Comment');
           if ($this->Comment->save($this->request->data)){
                $this->Session->setFlash('O seu comentário foi criado');
                unset($this->request->data);
                $this->redirect(array('action' => 'view', $id));
           }
        }
        //$this->Post->id = $id;
        //$this->set('post', $this->Post->read());
        
        $this->set('post', $this->Post->find( 'first', array (
            'conditions' => array(
                'Post.id' => $id
            ),
            'contain' => array(
                'Comment' => array('User' => array('fields' => array('username')))
            )
        )));
    }

    public function comment(){
        $this->autoRender = false; 
        $this->layout = "ajax";

        if($this->request->is('ajax')) {
            echo $this->request->data['age'];
        }
    }

    function edit($id = null) {
        $this->Post->id = $id;

        if ($this->request->is('get')) {
            $this->request->data = $this->Post->read();
        } else {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('A sua matéria foi atualizada.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function add(){
    	if ($this->request->is('post')){
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            $this->request->data['Post']['state'] = "proposta";
    		if ($this->Post->save($this->request->data)){
    			$this->Session->setFlash("A sua matéria foi salva");
                $this->redirect(array('action'=>'index'));
    		}
    	}
    }

    function delete($id = null){
        if (!$this->request->is("post")){
            throw new MethodNotAllowedException();
        }
        
        if($this->Post->delete($id)){
            $this->Session->setFlash("A sua matéria foi deletada");
            $this->redirect(array("action"=>"index"));
        }
    }

    function select_publisher(){

        if (!$this->request->is("get")){
            throw new MethodNotAllowedException();
        }

        $id = $this->request->query['id'];
        $publisher_id = $this->request->query['publisher_id'];

        $this->Post->id = $id;
        $this->Post->saveField('publisher_id',$publisher_id);
        $this->Session->setFlash('Você agora é responsável pela publicação da matéria com id = '.$id);
        $this->redirect(array("action"=>"index"));
    }

    function select_reviser(){

        if (!$this->request->is("get")){
            throw new MethodNotAllowedException();
        }

        $id = $this->request->query['id'];
        $reviser_id = $this->request->query['reviser_id'];

        $this->Post->id = $id;
        $this->Post->saveField('reviser_id',$reviser_id);
        $this->Session->setFlash('Você agora é responsável pela revisão da matéria com id = '.$id);
        $this->redirect(array("action"=>"index"));
    }

    //Nós estamos sobreescrevendo a chamada do isAuthorized() do AppController e 
    //internamente verificando na classe pai se o usuário está autorizado.
    public function isAuthorized($user) {

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true; // Admin pode acessar todas actions
        }
        else if ($this->request->action === 'index') {
            return true;
        }
        else if ($this->request->action === 'view') {
            return true;
        }
        else if ($this->request->action === 'comment') {
            return true;
        }
        else if (isset($user['role']) && $user['role'] === 'jornalista') {
            
            //todos podem adicionar artigos
            if ($this->request->action === 'add') {
                return true;
            }

            if (in_array($this->request->action, ['edit', 'delete'])) {
                $postId = (int)$this->request->params['pass'][0];
                if ($this->Post->isAuthor($postId, $user['id'])) {
                    return true;
                }
                else{
                    $this->Session->setFlash('Apenas o criador do artigo pode alterá-lo.');
                    return false;
                }
            }
        }
        else if (isset($user['role']) && $user['role'] === 'revisor') {
            
            //todos podem adicionar artigos
            if ($this->request->action === 'add') {
                return false;
            }

            if ($this->request->action == "select_reviser"){
                return true;
            }

            if (in_array($this->request->action, ['edit', 'delete'])) {
                $postId = (int)$this->request->params['pass'][0];
                if ($this->Post->isReviser($postId, $user['id'])) {
                    return true;
                }
                else{
                    $this->Session->setFlash('Apenas o revisor do artigo pode alterá-lo.');
                    return false;
                }
            }
        }
        else if (isset($user['role']) && $user['role'] === 'publicador') {
            
            //todos podem adicionar artigos
            if ($this->request->action === 'add') {
                return false;
            }

            if ($this->request->action === 'select_publisher') {
                return true;
            }

            if (in_array($this->request->action, ['edit', 'delete'])) {
                $postId = (int)$this->request->params['pass'][0];
                if ($this->Post->isPublisher($postId, $user['id'])) {
                    return true;
                }
                else{
                    $this->Session->setFlash('Apenas o publicador do artigo pode alterá-lo.');
                    return false;
                }
            }
        }
        //gerente
        else
        {
            if ($this->request->action === 'index') {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }
}