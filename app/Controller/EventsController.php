<?php
class EventsController extends AppController {

    function index() {
        $this->set('events', $this->Event->find('all'));
    }

    function view($id) {
    	$this->set('events', $this->Event->find( 'all' , array(
        	'conditions' => array('Event.post_id' => $id),
        	'order' => array('Event.created' => 'desc')
    	)));
    }

    //Nós estamos sobreescrevendo a chamada do isAuthorized() do AppController e 
    //internamente verificando na classe pai se o usuário está autorizado.
    public function isAuthorized($user) {
        return true;
    }

}