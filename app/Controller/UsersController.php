<?php
// app/Controller/UsersController.php
class UsersController extends AppController {

    public $helpers = array('Html','Form','Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout');
    }

    public function login() {
        if (!empty($this->Session->read('Auth.User'))){
            $this->redirect(array("controller"=>"posts",'action' => 'index'));
        }
        if ($this->request->is('post')){ 
            if ($this->Auth->login()) {
                $this->redirect(array("controller"=>"posts",'action' => 'index'));
            } else {
                if (!empty($this->request->data['User'])){
                    $this->Session->setFlash(__('Usuário ou senha inválido'));
                }
            }
        }
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('O usuário foi criado com sucesso.'));
                $this->redirect(array('controller' => 'users','action' => 'index'));
            } else {
                $this->Session->setFlash(__('O usuário não pode ser criado. Por favor, tente novamente.'));
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('O usuário foi alterado.'));
                $this->redirect(array('controller' => 'users','action' => 'index'));
            } else {
                $this->Session->setFlash(__('O usuário não pode ser alterado. Tente novamente.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário deletado com sucesso.'));
            $this->redirect(array('controller' => 'users','action' => 'index'));
        }
        $this->Session->setFlash(__('O usuário não pode ser deletado.'));
        $this->redirect(array('controller' => 'users','action' => 'index'));
    }

    //internamente verificando na classe pai se o usuário está autorizado.
    function isAuthorized($user) {

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true; // Admin pode acessar todas actions
        }
        else if ($this->request->action === 'edit') {
            $userId = (int)$this->request->params['pass'][0];
            if ($userId == $this->Session->read('Auth.User.id')){
                return true;
            }
            else{
                $this->Session->setFlash('O usuário apenas pode alterar os seus próprios dados.');
                return false;
            }
            return true;
        }
        else{
            return false;
        }

        return parent::isAuthorized($user);
    }
}