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
    	$this->layout = "default_new";
    	if($this->data){
           $this->Contact->set($this->data);
           $valid = $this->Contact->validates();
           if($valid){ 
               $contact = $this->data;              
               if($this->Contact->save( $contact, false) ) {
                  $contact_id = $this->Contact->getLastInsertId();
                  $contact = $this->Contact->read(null, $contact_id);

                  /*EMAIL TO USER*/
                  $Email = new CakeEmail("gmail");
                  $Email->template('user_contact_success');
                  $Email->emailFormat('html');
                  $Email->to($contact['Contact']['email']);
                  $Email->from('moos@nal.vn');
                  $Email->subject("【家賃でもらえる家】お問い合わせ");
                  $Email->viewVars(array('contact' => $contact));
                  $Email->send();
                  
                  /*EMAIL TO ADMIN*/
                  $Email = new CakeEmail("gmail");
                  $Email->template('admin_contact_success');
                  $Email->emailFormat('html');
                  $Email->to('thanhvunguyenbkdn@gmail.com');
                  $Email->from('moos@nal.vn');
                  $Email->subject("【MOOS】問い合わせ通知");
                  $Email->viewVars(array('contact' => $contact));
                  $Email->send();
                  
                  $this->redirect("contact_successful");
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
        $criteria .= " AND (Contact.email LIKE '%$keyword%' OR Contact.first_name LIKE '%$keyword%' OR Contact.last_name LIKE '%$keyword%') " ;
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
      if($_POST){ //var_dump($_POST['data']['Contact']); die;
          $contact1 = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$_POST['data']['Contact']['id']), 'contain'=>array('id'))); //var_dump($user['User']['id']); die;

          $this->Contact->id = $contact1['Contact']['id']; 
          $this->Contact->saveField('status', $_POST['data']['Contact']['status']);
          $this->Contact->saveField('comment', $_POST['data']['Contact']['comment']);
          $this->Session->setFlash('You have update status for this Contact','default', array('class' => 'alert alert-dismissible alert-success' ) );
            $this->redirect("index");

        //$this->redirect( 'change_confirm' );

      }
      else{
        if(!$id){
           $id = $this->data['Contact']['id'];
        }
        $contact = $this->Contact->read( null, $id );
        if($contact){ 

          $this->set( 'contact', $contact ); 
          //var_dump($contact); die;
          $this->data= $contact;
          //if($this->data){
           
            $contact = $this->Contact->read( null, $id );
            $contact['Contact']['status'] = $this->data['Contact']['status'] ;
            $contact['Contact']['comment'] = $this->data['Contact']['comment'] ;
            $this->Session->write('contact', $contact);
            //$this->redirect('change_confirm');
          //}
        }
        else {
          $this->Session->setFlash( "Contact message is not exist in system", 'default',array('class' => 'alert alert-dismissible alert-info"' ) );
          $this->redirect( 'index' );
        }
      }
    }

    function admin_change_confirm(){
      $contact = $this->Session->read( 'contact' );
      if($this->data){
         if($contact){
          //$contact['Contact']['status'] = $status;
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
      else {
        $this->data = $contact;
      }
    }    

    function admin_change_status(){    

     $contact = $this->Session->read( 'contact' );
    if($this->data){

      
        if($contact){
          //$contact['Contact']['status'] = $status;
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
    else {
      $this->data= $contact; 
    }
  }

  function contact_successful() {
    $this->layout = "default_new";
  }

}
?>