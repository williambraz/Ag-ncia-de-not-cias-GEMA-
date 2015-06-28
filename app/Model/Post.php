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
        'Journalist' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ),
        'Reviser' => array(
            'className' => 'User',
            'foreignKey' => 'reviser_id'
        ),
        'Publisher' => array(
            'className' => 'User',
            'foreignKey' => 'publisher_id'
        )
    );

    //
	public function isAuthor($post, $user) { 

		return $this->find('first', array(
            'conditions' => array(
                    'Post.id' => $post,
                    'Post.user_id' => $user)
        ));
    } 

    public function isReviser($post, $user) { 

        return $this->find('first', array(
            'conditions' => array(
                    'Post.id' => $post,
                    'Post.reviser_id' => $user)
        ));
    }

    public function isPublisher($post, $user) { 

        return $this->find('first', array(
            'conditions' => array(
                    'Post.id' => $post,
                    'Post.publisher_id' => $user)
        ));
    }
}