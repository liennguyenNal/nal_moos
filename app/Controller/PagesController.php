<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Article',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress' , 'MarriedStatus', 'Work', 'Career');

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

	public function index(){
		$this->layout = 'default_new';
		
		 $articles = $this->Article->find('all', array('conditions'=>array('Article.is_published'=>1, 'Article.created <= NOW()'), 'order'=>array('Article.created DESC')));
		 
		
		  
		 foreach($articles as $article){
		 	//if($article['Article']['created'] <= date("Y-m-d")){
		 		$arts[]= $article;
		 	//}

		 }
		 $this->set('articles', $arts);
		 

	}
	public function faq(){
		$this->layout = null;
		
		$this->set('menu','faq');
	}
	public function campaign(){
		
		$this->layout = null;
		
	}

	public function landing_page(){
  	  $this->layout = null;
      $married_statuses = $this->MarriedStatus->find( 'list' );
      $this->set( 'married_statuses', $married_statuses);

      $works = $this->Work->find( 'list' );
      $this->set( 'works', $works);
      $careers = $this->Career->find('list');
      $this->set('careers', $careers);
     
      $prefs = $this->Pref->find('list');
      $this->set('prefs', $prefs);
      if( $this->data ){
      	$user = $this->data; 
      	//delete session before submit form register on LP
      	$this->Session->delete('User');
        $this->User->set( $this->data );
        
        if( $this->User->validates() ){
        	
          	if($this->UserCompany->save( $user , false ) && $this->UserAddress->save( $user , false )){
          		$user = $this->data;
          		$user['User']['user_address_id'] = $this->UserAddress->getLastInsertId();
                $user['User']['user_company_id'] = $this->UserCompany->getLastInsertId();
	          	if($this->User->save($user, false)){
	          		$user_id = $this->User->getLastInsertId();
	          		foreach($this->data['ExpectArea'] as $item){
	          			$item['user_id'] = $user_id;
	          			$this->ExpectArea->create();
	          			$this->ExpectArea->save($item, false);
	          		}

	          		
	          		//send mail to User
                    $this->sendEmailToUser($user['User']['email'],  'user_register_success', __('user.email.register.title'), array('user'=>$user));
                    
                    //send mail to Admin
                    $this->sendEmailToAdmin('admin_register_success', __('user.email.admin_register.title'), array('user'=>$user));                    

	          		$this->redirect( "register_successful" );

	      		}
	      	}
        }
        else {
        	$this->set('user', $this->data);
        	
          	$this->Session->setFlash(__('global.errors.landing-page.email.unique'), 'default');
        }
      }
	}

	/**
     * USER REGISTER SUCCESSFUL VIEW
     * @return response
     */
    function register_successful(){
      	$this->layout = "default_new";
      	$this->Session->delete('user_register');
    }

    function introduction() {
      $this->layout = null;
    }

    function work_flow() {
      $this->layout = null;
    }
}
