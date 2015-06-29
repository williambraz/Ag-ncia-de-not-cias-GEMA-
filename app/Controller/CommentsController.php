<?php
class CommentsController extends AppController {

    function index() {
        $this->set('comments', $this->Comment->find('all'));
    }

    //Nós estamos sobreescrevendo a chamada do isAuthorized() do AppController e 
    //internamente verificando na classe pai se o usuário está autorizado.
    public function isAuthorized($user) {
        return true;
    }

}