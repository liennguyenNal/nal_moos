<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class ContactsController extends AppController {
    var $uses = array( 'User', 'Contact', 'Contact' );
    var $components = array( 'Login', 'Util', 'Session' );
    var $helpers = array('Html');
     
    public function beforeFilter(){
        parent::beforeFilter();
        $this->set('menu' , 'contact');
    }

    public function index(){
    	//$this->layout = null;
    	if($this->data){
           $this->Contact->set( $this->data );
           $valid = $this->Contact->validates();
           if($valid){ 

               $contact = $this->data;               
               if($this->Contact->save( $contact, false) ) {
                	$this->Session->setFlash('Thanks you, you have been send email successful to administrator.','default', array('class' => 'alert alert-dismissible alert-success' ) );
                  $this->redirect("index");
               }

           }
           else {
              // echo 1111; die;
           }
       }
    }

    function admin_index(){
      
       $criteria = "1=1 ";
      if($this->params['named']['keyword']){
        $keyword = $this->params['named']['keyword'];
        $criteria .= " AND (Contact.title LIKE '%$keyword%' OR Contact.email LIKE '%$keyword%' OR Contact.name LIKE '%$keyword%') " ;
        $this->set('keyword', $keyword);
      }
      if($this->params['named']['status']){
        $status = $this->params['named']['status'];
        $criteria .= " AND Contact.status = '$status'" ;
        $this->set('status', $status);
      }

      
        $this->paginate = array(
            'conditions' => array($criteria),
            'limit' => 20,
            'order' => array('id' => 'desc')
        );
         
        // we are using the 'User' model
        $contacts = $this->paginate('Contact');
         
        // pass the value to our view.ctp
        $this->set('contacts', $contacts);
    }
    
   
    
    function admin_delete($id){
        if($id){
            $this->Contact->delete( $id );
            $this->redirect('index');
        }
    }

    function admin_view($id){
    	$contact = $this->Contact->read( null, $id );
    	if($contact){
    		$this->set( 'contact', $contact );
    	}
    	else {
    		$this->Session->setFlash( "Contact message is not exist in system", 'default',array('class' => 'alert alert-dismissible alert-info"' ) );
    		$this->redirect( 'index' );
    	}
    }


    function admin_change_status($id, $status){    
     $contact = $this->Contact->read( null, $id );
      if($contact){
        $contact['Contact']['status'] = $status;
        if ($this->Contact->save( $contact, false ) ){
          $this->Session->setFlash('You have update status for this Contact','default', array('class' => 'alert alert-dismissible alert-success' ) );
          $this->redirect("index");
        }
      }
      else {
        $this->Session->setFlash( "Contact message is not exist in system", 'default',array('class' => 'alert alert-dismissible alert-info"' ) );
        $this->redirect( 'index' );
      }
    
    }
}
?>