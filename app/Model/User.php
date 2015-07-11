<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Um login é necessário.'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'Este nome de usuário já existe.'
            )
        ),
        'password' => array(
            'create_min' => array(
                'on' => 'create',
                'rule' => array('minLength', '6'),
                'message' => 'O password deve ter no mínimo 6 caracteres.'
            ),
            'update_min' => array(
                'on' => 'update',
                'allowEmpty' => true,
                'rule' => array('minLength', '6'),
                'message' => 'O password deve ter no mínimo 6 caracteres.'
            ),
            'max' => array(
                'rule' => array('maxLength', '15'),
                'message' => 'O password deve ter no máximo 15 caracteres.'
            ),
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('jornalista', 'revisor','publicador','gerente')),
                'message' => 'Entre com um papel válido',
                'allowEmpty' => false
            )
        ),
        'section' => array(
            'valid' => array(
                'rule' => array('inList', array('games', 'musica','series','quadrinhos')),
                'message' => 'Entre com uma seção válida',
                'allowEmpty' => false
            )
        )
    );

    //encripta password
    public function beforeSave($options = array()) {
        if (empty($this->data[$this->alias]['password'])){
            unset($this->data[$this->alias]['password']);
        }
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
}