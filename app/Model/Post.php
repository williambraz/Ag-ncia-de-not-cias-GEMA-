<?php
class Post extends AppModel {
    public $name = 'Post';

    public $actsAs = array('Containable');
    
    public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'content' => array(
            'rule' => 'notEmpty'
        )
    );

    public $belongsTo = array(
        'Journalist' => array(
            'className' => 'User',
            'foreignKey' => 'journalist_id'
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

    public $hasMany = array(
        'Comment' => array(
            'className' => 'Comment',
            'foreignKey' => 'post_id'
        ),
        'Event' => array(
            'className' => 'Event',
            'foreignKey' => 'post_id'
        )
    );

    //
	public function isAuthor($post, $user) { 

		return $this->find('first', array(
            'conditions' => array(
                    'Post.id' => $post,
                    'Post.journalist_id' => $user)
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

    public function isManager($post, $section) { 

        return $this->find('first', array(
            'conditions' => array(
                    'Post.id' => $post,
                    'Post.section' => $section)
        ));
    }
}