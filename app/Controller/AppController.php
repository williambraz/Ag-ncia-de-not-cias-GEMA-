<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

//códigos no appcontroller afetam toda a aplicação
class AppController extends Controller {
	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'posts', 'action' => 'home'),
            'authorize' => array('Controller') // configurar acesso por roles
        )
    );

    /*public function appError($error) {
        //print_r($this->Session->read());
        if (!empty($this->Session->read('Auth.User'))){
            $this->Session->setFlash('Página não encontrada.');
            $this->redirect(array('controller' => 'posts', 'action' => 'index'));   
        }else{
           $this->Session->setFlash('Página não encontrada.');
           $this->redirect(array('controller' => 'posts', 'action' => 'home')); 
        }
    }*/

	//permite que qualquer usuário veja qualquer view.
    function beforeFilter() {
    	//$this->Auth->unauthorizedRedirect=FALSE ;
		$this->Auth->authError = 'É necessário estar logado para ver esta página';
        //$this->Auth->allow('index','view','home');
        $this->Auth->allow('home','section');
    }

    //configura acessos
    public function isAuthorized($user) {
	    if (isset($user['role']) && $user['role'] === 'admin') {
	        return true; // Admin pode acessar todas actions
	    }
	   	else
	   	{
	    	return false; // Os outros usuários não podem
	    }
	}
}
