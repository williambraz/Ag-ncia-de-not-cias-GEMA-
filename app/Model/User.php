<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Um login é necessário'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Um password é necessário'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('jornalista', 'revisor','publicador','gerente')),
                'message' => 'Entre com um papel válido',
                'allowEmpty' => false
            )
        )
    );

    //encripta password
    public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
}