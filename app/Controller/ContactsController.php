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

    public function index(){ //var_dump($this->data);die;
      if($this->data){
        $this->Session->write('contact', $this->data);

        //var_dump($contact); die;
            $this->redirect("confirm");
      }
        else{
    	$this->layout = "contact";
    	}
    }
    function confirm(){

     //var_dump($_POST); die;
      
      if($_POST){//die('s');
            $contact = $this->Session->read( 'contact' );
            //var_dump($contact); die;
            //$this->layout = "default_new";
            //$this->set( 'contact', $contact ); 

           $this->Contact->set( $contact );
           $valid = $this->Contact->validates();
           if($valid){ 

               //$contact = $contact;
               if($this->Contact->save( $contact, false) ) {
                $code = date("Ymd"). "-".$this->Contact->getLastInsertId();
                $contact['Contact']['id'] = $this->Contact->getLastInsertId();
                $contact['Contact']['code'] = $code;
                $this->Contact->create();
                $this->Contact->save( $contact, false);
                  /**
                   * EMAIL REJECT USER REGISTRATION
                   */
                  $Email = new CakeEmail('gmail');
                  $Email->template('user_contact_success');
                  $Email->emailFormat('html');
                  $Email->to($contact['Contact']['email']);
                  $Email->from('moos@nal.vn');
                  $Email->subject('【家賃でもらえる家】お問い合わせ');
                  $Email->viewVars(array('contact' => $contact));
                  $Email->send();

                  /**
                   * 
                   */
                   /** SEND EMAIL TO ADMIN
                   * @var CakeEmail
                   */
                  $Email = new CakeEmail("gmail");
                  $Email->template('admin_contact_success');
                  $Email->emailFormat('html');
                  $Email->to(ADMIN_EMAIL);
                  $Email->from('moos@nal.vn');
                  $Email->subject("【MOOS】問い合わせ通知");
                  $Email->viewVars(array('contact' => $contact));
                  $Email->send();

                  $this->redirect("contact_successful");
               }

           }
           
       }
       else { //die('ss');
            $contact = $this->Session->read( 'contact' );
            
            $this->set( 'contact', $contact ); 
              // echo 1111; die;
         }
         $this->layout = "contact";
    }

    function admin_index(){ //var_dump($this->params['named']['keyword']); die('ss');
      
       $criteria = "1=1 ";
      if($this->params['named']['keyword']){
        $keyword = $this->params['named']['keyword'];
        $criteria .= " AND (Contact.first_name LIKE '%$keyword%' OR Contact.last_name LIKE '%$keyword%') " ;
        $this->set('keyword', $keyword);
      }
      if($this->params['named']['company']){
        $company = $this->params['named']['company'];
        $criteria .= " AND Contact.company LIKE '%$company%' " ;
        $this->set('company', $company);
      }
      if($this->params['named']['status']){
        $status = $this->params['named']['status'];
        $criteria .= " AND Contact.status = '$status'" ;
        $this->set('status', $status);
      }
      if($this->params['named']['type']){
        $type = $this->params['named']['type'];
        $criteria .= " AND Contact.type = '$type'" ;
        $this->set('type', $type);
      }
      //var_dump($this->params['named']['date_from']); var_dump($this->params['named']['date_to']); die;
      if($this->params['named']['date_from']){
        $date_from = $this->params['named']['date_from'];
        $criteria .= " AND Contact.created >= '$date_from'" ;
        $date_form_1= explode('-',$date_from);
        $from_year_register= $date_form_1[0];
        $from_month_register= $date_form_1[1];
        $from_day_register= $date_form_1[2];

        $this->set('from_year_register', $from_year_register);
        $this->set('from_month_register', $from_month_register);
        $this->set('from_day_register', $from_day_register);
        //$this->set('date_from', $date_from);
      }
      if($this->params['named']['date_to']){
        $date_to = $this->params['named']['date_to'];
        $criteria .= " AND Contact.created <= '$date_to' " ;
        $date_to_1= explode('-',$date_to);
        $to_year_register= $date_to_1[0];
        $to_month_register= $date_to_1[1];
        $to_day_register= $date_to_1[2];

        $this->set('to_year_register', $to_year_register);
        $this->set('to_month_register', $to_month_register);
        $this->set('to_day_register', $to_day_register);
        //$this->set('date_to', $date_to);
      }

      // $conditions = array();
      // if($this->params['named']['keyword']){
      //   $keyword = $this->request->params['named']['keyword'];
      //    $conditions = array("Article.title LIKE '%$keyword%'" );
      //    $this->set('keyword', $keyword);
      // }
      
        $this->paginate = array(
            'conditions' => array($criteria),
            'limit' => 10,
            'order' => array('id' => 'desc')
        );
         
        // we are using the 'User' model
        $contacts = $this->paginate('Contact');
         
        // pass the value to our view.ctp
        $this->set('contacts', $contacts);
    }

    function admin_deleteall(){
      $subjectsToDelete = $this->request->data['subjects_to_delete'];
      $this->Subject->deleteAll(array('id' => $subjectsToDelete));
    }
   
    
    function admin_delete($id){
        if($id){
            $this->Contact->delete( $id );
            $this->redirect('index');
        }
    }

    function admin_view($id){ 
      if($_POST){ //var_dump($_POST['data']); //die;
      //var_dump($this->Session); die;
            //$this->Session->write('contact', $contact);
        $contact = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$_POST['data']['Contact']['id']), 'contain'=>array('id'))); //var_dump($user['User']['id']); die;
        $contact['Contact']['status'] = $_POST['data']['Contact']['status'] ;
        $contact['Contact']['comment'] = $_POST['data']['Contact']['comment'];
        $this->Session->write('contact', $contact);

        //var_dump($contact); die;
            $this->redirect("edit_confirm");

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
          if($this->data){
           
            $contact = $this->Contact->read( null, $id );
            $contact['Contact']['status'] = $this->data['Contact']['status'] ;
            $contact['Contact']['comment'] = $this->data['Contact']['comment'] ;
            $this->Session->write('contact', $contact);
            //$this->redirect('change_confirm');
          }
      	}
      	else {
      		//$this->Session->setFlash( "Contact message is not exist in system", 'default',array('class' => 'alert alert-dismissible alert-info"' ) );
      		$this->redirect( 'index' );
      	}
      }
    }
    function admin_edit_confirm(){
            $contact = $this->Session->read( 'contact' );
           // $this->set( 'contact', $contact ); 
           // $this->data= $contact;


      //var_dump($contact); die;
      //var_dump($contact); die;
        if($_POST){ 
          

          $this->Contact->id = $contact['Contact']['id']; 
          $this->Contact->saveField('status', $contact['Contact']['status']);
          $this->Contact->saveField('updated', date("Y-m-d H:i:s"));
          $this->Contact->saveField('comment', $contact['Contact']['comment']);
          $this->Session->setFlash('問合せの保存が完了しました','default', array('class' => 'alert alert-dismissible alert-success' ) );
          $this->redirect( 'change_confirm/'.$contact['Contact']['id'] );

        }
        else{
          //$contact = $this->Session->read( 'contact' );
           $this->set( 'contact', $contact ); 
           $this->data= $contact;
        }

    }
    function admin_multi_delete(){ $ids= $_POST['contact_id'];
      if($_POST['contact_id']){
        foreach($ids as $id){
          $this->Contact->delete($id);
        }
     // $this->Session->setFlash('Selected Contacts are deleted','default', array('class' => 'alert alert-dismissible alert-success'));

      $this->redirect( 'index');

      }
      
    }
    
    function admin_change_confirm($id){ 
        $contact = $this->Contact->find('first', array('conditions'=>array('Contact.id'=> $id)));
        $this->set( 'contact', $contact ); 

        //var_dump($contact); die;
      if($this->data){
         if($contact){
          //$contact['Contact']['status'] = $status;
          if ($this->Contact->save( $contact, false ) ){
            //$this->Session->setFlash('問合せの保存が完了しました','default', array('class' => 'alert alert-dismissible alert-success' ) );
            $this->redirect("view/".$this->data['Contact']['id']);
          }
        }
        else {
          //$this->Session->setFlash( "Contact message is not exist in system", 'default',array('class' => 'alert alert-dismissible alert-info"' ) );
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
            //$this->Session->setFlash('問合せの保存が完了しました','default', array('class' => 'alert alert-dismissible alert-success' ) );
            $this->redirect("index");
          }
        }
        else {
          //$this->Session->setFlash( "Contact message is not exist in system", 'default',array('class' => 'alert alert-dismissible alert-info"' ) );
          $this->redirect( 'index' );
        }
    
      
    }
    else {
      $this->data= $contact; 
    }
  }

  function contact_successful() {
    $this->layout = 'contact';
  }

}
?>