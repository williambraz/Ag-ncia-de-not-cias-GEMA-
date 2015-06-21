<?php
class Post extends AppModel {
    public $name = 'Post';
    
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

    //
	public function isOwnedBy($post, $user) { 

		return $this->find('first', array(
                        'conditions' => array(
                        	'Post.id' => $post,
                        	'Post.user_id' => $user)
                    ));
    } 
}