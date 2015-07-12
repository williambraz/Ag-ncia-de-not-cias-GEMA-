<?php
class PostsController extends AppController {
    public $helpers = array('Html','Form','Session');
    public $components = array('RequestHandler');
    public $name = 'Posts';
    public $uses = array('Post', 'Event');

    function index() {
        if ($this->Session->read('Auth.User.role') == 'gerente'){
            $this->set('posts', $this->Post->find('all', array(
                'conditions' => array('Post.section' => $this->Session->read('Auth.User.section'))
            )));
        }
        else
            $this->set('posts', $this->Post->find('all'));
    }

    function home() {
        
        if ($this->request->is('post')){

            $search = $this->request->data['Search']['content'];

            $options = array(
                'order' => array('Post.created' => 'desc'),
                'conditions' => array(
                    //'Post.state' => 'publicada',
                    'OR' => array(
                        "Post.title LIKE" => "%".$search."%",
                        "Post.content LIKE" => "%".$search."%"
                    )
                ),
                'limit' => 5,
            );

            $this->paginate = $options;
            $this->set('posts', $this->paginate('Post'));

        }else{

            //seta conteúdo padrão
            $options = array(
                'order' => array('Post.created' => 'desc'),
                //'conditions' => array('Post.state' => 'publicada'),
                'limit' => 5,
            );

            $this->paginate = $options;
            $this->set('posts', $this->paginate('Post'));

        }

        //seta bloco
        $optionsBlock = array(
            'order' => array('Post.created' => 'desc'),
            //'conditions' => array('Post.state' => 'publicada'),
            'limit' => 5,
        );
        
        $this->set('postsBlock', $this->Post->find('all',$optionsBlock));
    }

    function section($section = null) {
        
        if ($this->request->is('post')){

            $search = $this->request->data['Search']['content'];

            $options = array(
                'order' => array('Post.created' => 'desc'),
                'conditions' => array(
                    'Post.state' => 'publicada',
                    'Post.section' => $section,
                    'OR' => array(
                        "Post.title LIKE" => "%".$search."%",
                        "Post.content LIKE" => "%".$search."%"
                    )
                ),
                'limit' => 5,
            );

            $this->paginate = $options;
            $this->set('posts', $this->paginate('Post'));

        }else{

            //seta conteúdo padrão
            $options = array(
                'order' => array('Post.created' => 'desc'),
                'conditions' => array(
                    'Post.state' => 'publicada',
                    'Post.section' => $section
                ),
                'limit' => 5,
            );

            $this->paginate = $options;
            $this->set('posts', $this->paginate('Post'));

        }

        //seta bloco
        $optionsBlock = array(
            'order' => array('Post.created' => 'desc'),
            'conditions' => array(
                'Post.state' => 'publicada',
                'Post.section' => $section
            ),
            'limit' => 5,
        );
        
        $this->set('postsBlock', $this->Post->find('all',$optionsBlock));
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
        
        $this->set('post', $this->Post->find( 'first', array (
            'conditions' => array(
                'Post.id' => $id
            ),
            'contain' => array(
                'Comment' => array('User' => array('fields' => array('username')))
            )
        )));
    }

    function comment(){
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
            $this->set('post', $this->Post->find( 'first', array (
            'conditions' => array(
                'Post.id' => $id
            ),
            'contain' => array(
                'Comment' => array('User' => array('fields' => array('username')))
            )
        )));
        } else {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('A sua matéria foi atualizada.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function add(){
        $state = "proposta";
    	if ($this->request->is('post')){
            $this->request->data['Post']['journalist_id'] = $this->Auth->user('id');
            $this->request->data['Post']['state'] = $state;
    		if ($this->Post->save($this->request->data)){
    
                $this->saveEvent($this->Post->getLastInsertID(), $this->Auth->user('id'), $state);
                $this->Session->setFlash("A sua matéria foi salva");
                $this->redirect(array('action'=>'index'));
    		}
    	}
    }

    function search($content = null) {
        

        //if ($this->request->is('post')){
           // var_dump($this->request->data);
            echo $content;
            /*$this->request->data['Post']['journalist_id'] = $this->Auth->user('id');
            $this->request->data['Post']['state'] = $state;
            if ($this->Post->save($this->request->data)){
    
                $this->saveEvent($this->Post->getLastInsertID(), $this->Auth->user('id'), $state);
                $this->Session->setFlash("A sua matéria foi salva");
                $this->redirect(array('action'=>'index'));
            }*/
    }

    public function saveEvent($post_id, $user_id, $state){
        $this->Event->create();
        $event = array('Event' => array(
          'post_id' => $post_id, 
          'user_id' => $user_id,
          'state' => $state
        )); 
        $this->Event->save($event);
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

    function approve(){
        $state = 'aprovada';

        if (!$this->request->is("get")){
            throw new MethodNotAllowedException();
        }

        $id = $this->request->query['id'];

        $this->Post->id = $id;
        $this->Post->saveField('state',$state);
        $this->Session->setFlash('A matéria foi aprovada');

        $this->saveEvent($id, $this->Auth->user('id'), $state);

        $this->redirect(array("action"=>"index"));
    }

    function archive(){
        $state = 'arquivada';
        if (!$this->request->is("get")){
            throw new MethodNotAllowedException();
        }

        $id = $this->request->query['id'];

        $this->Post->id = $id;
        $this->Post->saveField('state',$state);
        $this->Session->setFlash('A matéria foi arquivada');

        $this->saveEvent($id, $this->Auth->user('id'), $state);

        $this->redirect(array("action"=>"index"));
    }

    function publish(){
        $state = 'publicada';

        if (!$this->request->is("get")){
            throw new MethodNotAllowedException();
        }

        $id = $this->request->query['id'];

        $this->Post->id = $id;
        $this->Post->saveField('state',$state);
        $this->Session->setFlash('A matéria foi publicada');

        $this->saveEvent($id, $this->Auth->user('id'), $state);

        $this->redirect(array("action"=>"index"));
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
    function isAuthorized($user) {

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true; // Admin pode acessar todas actions
        }
        else if ($this->request->action === 'index') {
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

            if (in_array($this->request->action, ['edit', 'view', 'delete'])) {
                $postId = (int)$this->request->params['pass'][0];
                if ($this->Post->isAuthor($postId, $user['id'])) {
                    return true;
                }
                else{
                    $this->Session->setFlash('Apenas o jornalista do artigo pode acessá-lo.');
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

            if (in_array($this->request->action, ['edit', 'view'])) {
                $postId = (int)$this->request->params['pass'][0];
                if ($this->Post->isReviser($postId, $user['id'])) {
                    return true;
                }
                else{
                    $this->Session->setFlash('Apenas o revisor do artigo pode acessá-lo.');
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

            if ($this->request->action === 'publish') {
                return true;
            }

            if (in_array($this->request->action, ['edit','view'])) {
                $postId = (int)$this->request->params['pass'][0];
                if ($this->Post->isPublisher($postId, $user['id'])) {
                    return true;
                }
                else{
                    $this->Session->setFlash('Apenas o publicador do artigo pode acessá-lo.');
                    return false;
                }
            }
        }
        else if (isset($user['role']) && $user['role'] === 'gerente') {
            
            //todos podem adicionar artigos
            if ($this->request->action === 'add') {
                return false;
            }

            if ($this->request->action === 'approve') {
                return true;
            }

            if ($this->request->action === 'archive') {
                return true;
            }

            if (in_array($this->request->action, ['view','delete'])) {
                $postId = (int)$this->request->params['pass'][0];
                if ($this->Post->isManager($postId, $user['section'])) {
                    return true;
                }
                else{
                    $this->Session->setFlash('Apenas o gerente desta seção pode fazer alterações.');
                    return false;
                }
            }

        }

        return parent::isAuthorized($user);
    }
}