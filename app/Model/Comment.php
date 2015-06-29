<?php
class Comment extends AppModel{
	public $name = 'Comment';

	public $belongsTo = 'User';

	public $validate = array(
        'content' => array(
            'rule' => 'notEmpty'
        )
    );
}