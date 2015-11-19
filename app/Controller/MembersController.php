<?php

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class MembersController extends AppController {
    var $uses = array('User', 'Administrator',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress', 'Work' , 'MarriedStatus', 'Residence', 'Career', 'Insurance', 'AttachmentType', 'UserAttachment');
    var $components = array('Login', 'Util', 'Session', 'RequestHandler');
    var $helpers = array('Html', 'Form','Csv'); 
     
    public function beforeFilter(){
        parent::beforeFilter();
        $this->set('menu' , 'member');
    }

    

    function admin_index(){ 
        
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
    }
    function admin_multi_delete(){ $ids= $_POST['customer_id']; 
      if($_POST['customer_id']){
        foreach($ids as $id){
          $this->User->id = $id; 
          $this->User->saveField('is_deleted', 1);
        }

      $this->redirect( 'index');

      }
      
    }


   
    
    function admin_delete($id){
        if($id){
            $this->User->id = $id; 
            $this->User->saveField('is_deleted', 1);
            $this->redirect('index');
        }
    }

    function admin_view($id){ 
      if($_POST){ 
      }
      else{

      	$user = $this->User->read( null, $id );
      	if($user){ 
          $prefs = $this->Pref->find('list');
      $this->set('prefs', $prefs);

      		$this->set( 'user', $user ); 
          $this->data= $user;

      	}
      	else {
      		$this->redirect( 'index' );
      	}
      }
    }


}
?>