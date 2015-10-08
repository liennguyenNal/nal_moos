<?php

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class MembersController extends AppController {
    var $uses = array('User', 'Administrator',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress', 'Work' , 'MarriedStatus', 'Residence', 'Career', 'Insurance', 'AttachmentType', 'UserAttachment');
    var $components = array('Login', 'Util', 'Session', 'RequestHandler');
    //var $helpers = array('Html' , 'Js');
    var $helpers = array('Html', 'Form','Csv'); 
     
    public function beforeFilter(){
        parent::beforeFilter();
        $this->set('menu' , 'member');
    }

    

    function admin_index(){ //$this->layout= null;
        
      $criteria = "User.is_deleted='0' AND User.status_id >='2' ";
      if($this->params['named']['keyword']){
        $keyword = $this->params['named']['keyword'];
        $criteria .= " AND (User.first_name LIKE '%$keyword%' OR User.last_name LIKE '%$keyword%') " ;
        $this->set('keyword', $keyword);
      }
      if($this->params['named']['email']){
        $email = $this->params['named']['email'];
        $criteria .= " AND User.email LIKE '%$email%' " ;
        $this->set('email', $email);
      }
      
      
      //var_dump($this->params['named']['date_from']); var_dump($this->params['named']['date_to']); die;
      if($this->params['named']['date_from']){
        $date_from = $this->params['named']['date_from'];
        $criteria .= " AND User.created >= '$date_from'" ;
        $date_form_1= explode('-',$date_from);
        $from_year_register= $date_form_1[0];
        $from_month_register= $date_form_1[1];
        $from_day_register= $date_form_1[2];

        $this->set('from_year_register', $from_year_register);
        $this->set('from_month_register', $from_month_register);
        $this->set('from_day_register', $from_day_register);
      }
      if($this->params['named']['date_to']){
        $date_to = $this->params['named']['date_to'];
        $criteria .= " AND User.created <= '$date_to' " ;
        $date_to_1= explode('-',$date_to);
        $to_year_register= $date_to_1[0];
        $to_month_register= $date_to_1[1];
        $to_day_register= $date_to_1[2];

        $this->set('to_year_register', $to_year_register);
        $this->set('to_month_register', $to_month_register);
        $this->set('to_day_register', $to_day_register);
      }
      
        $this->paginate = array(
            'conditions' => array($criteria),
            //'contain' => array('UserCompany', 'UserAddress'),
            'limit' => 20,
            'order' => array('id' => 'desc')
        ); 
         
        // we are using the 'User' model

        $users = $this->paginate('User');

         
        // pass the value to our view.ctp
        $this->set('users', $users); 
        //var_dump($users); die('s');
    }
    function admin_multi_delete(){ $ids= $_POST['customer_id']; //var_dump($ids); die;
      if($_POST['customer_id']){
        foreach($ids as $id){
          $this->User->id = $id; 
          $this->User->saveField('is_deleted', 1);
          //$this->User->delete($id);
        }
      $this->Session->setFlash('Selected Customers are deleted','default', array('class' => 'alert alert-dismissible alert-success'));

      $this->redirect( 'index');

      }
      
    }

    // function admin_deleteall(){
    //   $subjectsToDelete = $this->request->data['subjects_to_delete'];
    //   $this->Subject->deleteAll(array('id' => $subjectsToDelete));
    // }
   
    
    function admin_delete($id){
        if($id){
            $this->User->id = $id; 
            $this->User->saveField('is_deleted', 1);
            $this->redirect('index');
        }
    }

    function admin_view($id){ 
      if($_POST){ //var_dump($_POST['data']); //die;
      //var_dump($this->Session); die;
            //$this->Session->write('contact', $contact);
        // $contact = $this->Contact->find('first', array('conditions'=>array('Contact.id'=>$_POST['data']['Contact']['id']), 'contain'=>array('id'))); //var_dump($user['User']['id']); die;
        // $contact['Contact']['status'] = $_POST['data']['Contact']['status'] ;
        // $contact['Contact']['comment'] = $_POST['data']['Contact']['comment'];
        // $this->Session->write('contact', $contact);

        // //var_dump($contact); die;
        //     $this->redirect("edit_confirm");

        //$this->redirect( 'change_confirm' );

      }
      else{
        // if(!$id){
        //    $id = $this->data['User']['id'];
        // }
      	$user = $this->User->read( null, $id );
      	if($user){ 
          $prefs = $this->Pref->find('list');
      $this->set('prefs', $prefs);

      		$this->set( 'user', $user ); 
          //var_dump($contact); die;
          $this->data= $user;
          // if($this->data){
           
          //   $user = $this->user->read( null, $id );
            
          //   ///$this->Session->write('contact', $contact);
          //   //$this->redirect('change_confirm');
          // }
      	}
      	else {
      		$this->Session->setFlash( "Contact message is not exist in system", 'default',array('class' => 'alert alert-dismissible alert-info"' ) );
      		$this->redirect( 'index' );
      	}
      }
    }


}
?>