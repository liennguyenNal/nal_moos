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
	public $uses = array('Article',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress' , 'MarriedStatus');

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
		//print_r("this is hom page"); die;
		// $articles = $this->Article->find('all', array('conditions'=>array('Article.is_published'=>1), 'order'=>array('Article.created DESC'), 'limit'=>4));
		// $this->set('articles', $articles);

	}
	public function faq(){
		$this->layout = 'default_new';
		//print_r("this is hom page"); die;
		$this->set('menu','faq');
	}
	public function campaign(){
		$this->layout = 'default_new';
		$this->layout = null;
		//print_r("this is hom page"); die;
		//$this->set('menu','campaign');
		
	}
	public function landing_page(){
		$this->layout = null;
		//$this->layout = new Layout();
		$married_statuses = $this->MarriedStatus->find( 'list' );
      	$this->set( 'married_statuses', $married_statuses);

      
     
      	$prefs = $this->Pref->find('list');
      	$this->set('prefs', $prefs);
      	if( $this->data ){
        	$this->User->set( $this->data );
        	$this->UserAddress->set( $this->data );
        	$this->UserCompany->set( $this->data );

        if( $this->User->validates()  && $this->UserAddress->validates() && $this->UserCompany->validates()){
          $this->Session->write( 'user_register', $this->data );
          $this->redirect( "register_confirmation" );
        }
      }
	}
}
