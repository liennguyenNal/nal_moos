<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class UsersController extends AppController{
    var $uses = array('User', 'Administrator',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress', 'Work' , 'MarriedStatus', 'Residence', 'Career', 'Insurance', 'AttachmentType', 'UserAttachment', 'UserPartner', 'UserGuarantor', 'UserRelation', 'WorkRequired');
    var $components = array('Login', 'Util', 'Session', 'RequestHandler');
    var $helpers = array('Html' , 'Js');
     
        
    function admin_index(){
        
      $criteria = "1=1 ";
      if($this->params['named']['keyword']){
        $keyword = $this->params['named']['keyword'];
        $criteria .= " AND (User.first_name LIKE '%$keyword%' OR User.last_name LIKE '%$keyword%' OR User.first_name_kana LIKE '%$keyword%'
            OR User.last_name_kana LIKE '%$keyword% OR User.email LIKE '%$keyword%
          ) " ;
        $this->set('keyword', $keyword);
      }
      if($this->params['named']['type']){
        //echo $this->params['named']['type']; die;
        $status_id = $this->params['named']['type'];
        $criteria .= " AND User.status_id = '$status_id'" ;
        $this->set('status', $status);
      }
        $this->paginate = array(
            'conditions' => $criteria,
            'contain' => array('UserCompany', 'UserAddress'),
            'limit' => 20,
            'order' => array('id' => 'desc')
        );
         
        // we are using the 'User' model
        $users = $this->paginate('User');
         
        // pass the value to our view.ctp
        $this->set('users', $users);
    }
    
    function admin_edit( $id=null ){
        
       
       if($this->data){
           $this->User->set($this->data);
           $valid = $this->User->validates();
           if($valid){
               $this->data['User']['passwword'] = md5($this->data['User']['passwword'] );
               $this->data['User']['active'] = 1;
               $user = $this->data;
               if($this->data['User']['birthday']){
                   $birthday = $this->Util->sqlDate($this->data['User']['birthday'], "/", "m/d/Y");
                  $user['User']['birthday']= $birthday;
                  
               }
               if($this->User->save($user, false)){
                   $this->redirect("index");
               }
           }
           else {
           }
       }
       else {
          
           if($id){
               $user = $this->User->read(null, $id);
               $this->data = $user;
           }
       }
    }
    
    function admin_delete($id){
        if($id){
            $this->User->delete($id);
            $this->redirect('index');
        }
    }
    /*
    * Admin Profile
    *
    */
    function admin_profile(){
      $user = $this->Session->read('Administrator');
       $id = $user['Administrator']['id'];
       $admin = $this->Administrator->find('first', array('conditions'=>array('Administrator.id'=>$user['Administrator']['id'])));
      $this->set('user', $admin);
    }

    function admin_edit_profile(){
        $admin = $this->Session->read('Administrator');
        $id = $admin['Administrator']['id'];
       
       if($this->data){

           $this->Administrator->set($this->data);
           $valid = $this->Administrator->validates();
           if($valid){
              $user = $this->data;

              $user['Administrator']['id']= $id;
              //print_r($user);die;
               if($this->Administrator->save($user, false)){
                  $this->Session->setFlash('Your Profile has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
                   $this->redirect("profile");
               }
           }
           else {
              // echo 1111; die;
           }
       }
       else {
          
           if($id){
               $user = $this->Administrator->read(null, $id);
               $this->data = $user;
           }
       }
    }

     /*
    * Function change password
    *
    */
    function admin_change_password(){
      $admin = $this->Session->read('Administrator');
      if ( $admin ){
        $admin = $this->Administrator->find('first', array('conditions'=>array('Administrator.id'=>$admin['Administrator']['id'])));
        $this->set('admin', $admin);
        if($this->data){

          //print_r($this->data); die;
          if (md5($this->data['User']['old_password']) == $admin['Administrator']['password']){
            if($this->data['User']['password'] && strlen($this->data['User']['password']) >= 6){
              if ($this->data['User']['password'] == $this->data['User']['confirm_password']){
                $admin['Administrator']['password'] = md5($this->data['User']['password']);
                if ($this->Administrator->save($admin, true) ){
                  $this->Session->setFlash('Your Password has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
                  $this->redirect('profile');
                }
                else {
                  $this->Session->setFlash("Cannot change your password", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                }
              }
              else {
                  $this->Session->setFlash("Password Confirmation is not match", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                }
            }
            else {
              $this->Session->setFlash("Length of password is too short (6 - 30 charracters)", 'default',
                array('class' => 'alert alert-dismissible alert-info"'));
            }

          }
          else {
             $this->Session->setFlash("Old Password is not match", 'default',
                array('class' => 'alert alert-dismissible alert-info"'));
          }
        }
      }
      else {
        $this->redirect( 'login' );
      }

    }
    
    function admin_login(){
        $this->layout = null;
        $this->Session->delete("User");
        if($this->data){
            //print_r($this->data); die;
            $username = $this->data['User']['username'];
            $password = $this->data['User']['password'];
            $this->Login->admin_login($username, $password);
        }
       
        
        //die;
    }
    
    function admin_logout(){
        $this->Session->delete("Administrator");
        $this->redirect("/admin/users/login");
    }

    /*
    * Admin Profile
    *
    */
    function admin_view($id){
     
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' ,  'ExpectArea')));
      //print_r($user['ExpectArea']); die;
      $this->set('user', $user);
      $married_statuses = $this->MarriedStatus->find( 'list' );
      $this->set( 'married_statuses', $married_statuses);

      $works = $this->Work->find( 'list' );
      $this->set( 'works', $works);


      $prefs = $this->Pref->find('list');
      $this->set('prefs', $prefs);
      $this->data = $user;

      if($user['User']['status_id'] > 1) {

        $this->render('admin_view_2');
      }

      
    }

    function admin_approve_register($id){

      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' ,  'ExpectArea')));
      if($user['User']['status_id'] == 1){
        $user['User']['status_id'] = 2;
        //$username = str_replace(" ", "_", $user['User']['first_name_kana'] ). "_" .  str_replace(" ", "_", $user['User']['last_name_kana']) . "_" . $id;
        $password = $this->Util->createRandomPassword(10);
        $access_token  = $this->Util->createRandomPassword(30);

        $user['User']['access_token'] = $access_token;

        //print_r($user); die;
        if($this->User->save( $user, false )){
          // Send email to user
           $Email = new CakeEmail("gmail");
            $Email->template('approve_basic_reigster', 'register');
            $Email->emailFormat('html');
            $Email->to($user['User']['email']);
            $Email->from('moos@nal.vn');
            $Email->subject("Approve Registration");
            $Email->viewVars(array('user' => $user, 'password'=>$password));
            $Email->send();
          $email = $user['User']['email'];
          $this->Session->setFlash("Has been approved Successful with Email: $email   , and password: $password", 'default',array('class' => 'alert alert-dismissible alert-success"'));
          $this->redirect('view/' . $id);
        }
        else {
          $this->Session->setFlash('Cannot approved this customer', 'default',array('class' => 'alert alert-dismissible alert-info"'));
          $this->redirect('view/' . $id);
        }
      }
      else {
          $this->Session->setFlash('Cannot approved this customer', 'default',array('class' => 'alert alert-dismissible alert-info"'));
          $this->redirect('view/' . $id);
      }
    }

    function admin_reject_register($id){

      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' )));
      $user['User']['status_id'] = 0;
      
      if($this->User->save($user, false)){
        $this->Session->setFlash("Reject successful", 'default',array('class' => 'alert alert-dismissible alert-success"'));
        $this->redirect('view/'. $id);
      }
      else {
          $this->Session->setFlash('Cannot reject this customer', 'default',array('class' => 'alert alert-dismissible alert-info"'));
          $this->redirect('view/' . $id);
      }

    }
    function admin_delete_users(){

      if($this->data){
        foreach ($this->data['ids'] as $id) {
          $this->User->create();
          $this->User->delete($id);
           
        }
        $this->Session->setFlash("Some users has been deleted successful", 'default',array('class' => 'alert alert-dismissible alert-success"'));
        $this->redirect('index');
      }
      else {
        $this->Session->setFlash('Cannot delete users', 'default',array('class' => 'alert alert-dismissible alert-info"'));
        $this->redirect('index');
      }

    }
    function login(){
      $this->layout = null;
       // echo $this->layout; die;
       $this->Session->delete("Administrator");
        if($this->data){
            //print_r($this->data); die;
            $email = $this->data['User']['email'];
            $password = $this->data['User']['password'];
            $this->Login->login($email, $password);
        }
    }
    
    
    function logout(){
        $this->Login->logout();
    }
    
    function profile(){

      $user = $this->Session->read('User');
      $user_id = $user['User']['id'];
      $user = $this->User->read(null, $user_id);
      if ( $user ){
        $this->set('user', $user);
      }
      else {
        $this->redirect('login');
      }
    }

    function create_password($email=null, $access_token=null){
       if($this->data){
        $email = $this->data['User']['email'];
        $access_token = $this->data['access_token']['access_token'];

        $user = $this->User->find('first', array('conditions'=>array( 'User.email'=>$email, 'User.access_token'=>$access_token)));
        if( $user ){
         
            if($this->data['User']['password'] && strlen($this->data['User']['password']) >= 8){
              if ($this->data['User']['password'] == $this->data['User']['confirm_password']){
                $user['User']['password'] = md5($this->data['User']['password']);
                //clear access token
                $user['User']['access_token'] = null; 
                if ($this->User->save($user, false) ){
                  $this->Session->setFlash('Change Password successful!', 'default',array('class' => 'alert alert-dismissible alert-info"'));
                  $this->redirect('profile');
                }
                else {
                  $this->Session->setFlash("Cannot change your password", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                }
              }
              else {
                  $this->Session->setFlash("Password Confirmation is not match", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                }
            }
            else {
              $this->Session->setFlash("Length of password is too short (8 - 30 charracters)", 'default',
                array('class' => 'alert alert-dismissible alert-info'));
            }
        }
      }
      else {
        if($access_token && $email){
          $user = $this->User->find('first', array('conditions'=>array( 'User.email'=>$email, 'User.access_token'=>$access_token)));
          if($user){
            $this->data = $user;
            $this->set('user', $user);

          }
          else $this->redirect("/");
        }
        else {
          $this->redirect("/");
        }
      }
    }
    /*
    * Function change password
    *
    */
    function change_password(){
      $user = $this->Session->read('User');
      if ( $user ){
        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$user['User']['id'])));
        $this->set('user', $user);
        if($this->data){

          //print_r($this->data); die;
          if (md5($this->data['User']['old_password']) == $user['User']['password']){
            if($this->data['User']['password'] && strlen($this->data['User']['password']) >= 6){
              if ($this->data['User']['password'] == $this->data['User']['confirm_password']){
                $user['User']['password'] = md5($this->data['User']['password']);
                if ($this->User->save($user, false) ){
                  $this->Session->setFlash('Change Password successful!', 'default',array('class' => 'alert alert-dismissible alert-info"'));
                  $this->redirect('profile');
                }
                else {
                  $this->Session->setFlash("Cannot change your password", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                }
              }
              else {
                  $this->Session->setFlash("Password Confirmation is not match", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                }
            }
            else {
              $this->Session->setFlash("Length of password is too short (6 - 30 charracters)", 'default',
                array('class' => 'alert alert-dismissible alert-info'));
            }

          }
          else {
             $this->Session->setFlash("Old Password is not match", 'default',
                array('class' => 'alert alert-dismissible alert-info'));
          }
        }
      }
      else {
        $this->redirect( 'login' );
      }

    }
    function edit_profile(){
      $user = $this->Session->read('User');
      if ( $user ){
        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$user['User']['id'])));
        $this->set('user', $user);
        if($this->data){
           $this->User->set($this->data);
           $valid = $this->User->validates();
           if($valid){
              $user = $this->data;

             
               if($this->User->save($user, false)){
                  $this->Session->setFlash('Your Profile has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
                   $this->redirect("profile");
               }
           }
           else {
           }
        }
        else {

          $this->data = $user;
        }

      }
    }

    
    function register(){
      $this->layout = "default_new";
      $married_statuses = $this->MarriedStatus->find( 'list' );
      $this->set( 'married_statuses', $married_statuses);

      $works = $this->Work->find( 'list' );
      $this->set( 'works', $works);
      $careers = $this->Career->find('list');
      $this->set('careers', $careers);
     
      $prefs = $this->Pref->find('list');
      $this->set('prefs', $prefs);
      if( $this->data ){
        //print_r($this->data['ExpectArea']); die;
        $this->User->set( $this->data );
        $this->UserAddress->set( $this->data );
        $this->UserCompany->set( $this->data );

        if( $this->User->validates()  && $this->UserAddress->validates() && $this->UserCompany->validates()){
          
          $this->Session->write( 'user_register', $this->data );

          $this->redirect( "register_confirmation" );
        }
      }

    }
    function register_confirmation(){
      $this->layout = "default_new";
      $user = $this->Session->read( 'user_register' );
      if( $user ) {
          $user['User']['married_status'] = $this->MarriedStatus->getNameById($user['User']['married_status_id']);
          $user['UserCompany']['work'] = $this->Work->getNameById($user['UserCompany']['work_id']);
          $user['UserAddress']['pref'] = $this->Pref->getNameById($user['UserAddress']['pref_id']);

          $this->set('user', $user);

          
          if($this->data){
             //print_r($user['ExpectArea']); die;
             // print_r($this->data); die;
             if ($this->UserCompany->save( $user , false ) && $this->UserAddress->save( $user , false )){

                //save company info
                $user['User']['user_address_id'] = $this->UserAddress->getLastInsertId();                

                //save address
                $user['User']['user_company_id'] = $this->UserCompany->getLastInsertId();
                
                if( $this->User->save( $user, false ) ){

                  $user_id = $this->User->getLastInsertId();
                  foreach ($user['ExpectArea'] as $item) {
                    $item['user_id'] = $user_id;
                    $this->ExpectArea->create();
                    $this->ExpectArea->save($item, false);
                  }
                  //send mail to customer
                  $Email = new CakeEmail("gmail");
                  $Email->template('register_success', 'register');
                  $Email->emailFormat('html');
                  $Email->to($user['User']['email']);
                  $Email->from('moos@nal.vn');
                  $Email->subject("Registration");
                  $Email->viewVars(array('user' => $user));
                  $Email->send();

                  //send mail to Admin

                  // $Email = new CakeEmail("gmail");
                  // $Email->template('register_success', 'register');
                  // $Email->emailFormat('html');
                  // $Email->to($user['User']['email']);
                  // $Email->from('moos@nal.vn');
                  // $Email->subject("Registration");
                  // $Email->viewVars(array('user' => $user));
                  // $Email->send();

                  $this->Session->setFlash('You has been register successful! ','default', array('class' => 'alert alert-dismissible alert-success'));
                  $this->redirect( "register_successful" );
                }
                else {
                  $this->UserAddress->delete($this->UserAddress->getLastInsertId());
                  $this->UserCompany->delete($this->UserCompany->getLastInsertId());
                  $this->redirect( "register" );
                  $this->Session->setFlash("Cannot Save Data", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                }
             
            }
            else {
              $this->data = $user;
              $this->redirect( "register" );
              $this->Session->setFlash("Cannot Save Data", 'default',array('class' => 'alert alert-dismissible alert-info"'));
            }
              
            
          }
          else {
            $married_statuses = $this->MarriedStatus->find( 'list' );
            $this->set( 'married_statuses', $married_statuses);

            $works = $this->Work->find( 'list' );
            $this->set( 'works', $works);

           
            $prefs = $this->Pref->find('list');
            $this->set('prefs', $prefs);
            $this->data = $user;
          }
      }
      else {

      }

    }

    function register_successful(){
      $this->layout = null;
      $this->Session->delete('user_register');
    }

    function my_page(){
      $id = $this->s_user_id;
      if($id){
     //echo $id; die;
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
      $this->data = $user;
      $validations = $this->_validate($user);
      $this->set('validations', $validations);
      //print_r($user['User']['gender']); die;
      $married_statuses = $this->MarriedStatus->find( 'list' );
      $this->set( 'married_statuses', $married_statuses);

      $works = $this->Work->find( 'list' );
      $this->set( 'works', $works);

      $residences = $this->Residence->find('list');
      $this->set('residences', $residences);

      $prefs = $this->Pref->find('list');
      $this->set('prefs', $prefs);

      $careers = $this->Career->find('list');
      $this->set('careers', $careers);

      $insurances = $this->Insurance->find('list');
      $this->set('insurances', $insurances);
      
      $attachment_types = $this->AttachmentType->find('all');
      $this->set('attachment_types', $attachment_types);
      $this->set('user', $user);
    }
    else $this->redirect('login');

    }

    function update_basic_info(){
      if($this->request->is('ajax')){
        $married_statuses = $this->MarriedStatus->find( 'list' );
        $this->set( 'married_statuses', $married_statuses);

        $works = $this->Work->find( 'list' );
        $this->set( 'works', $works);

        $residences = $this->Residence->find('list');
        $this->set('residences', $residences);

        $prefs = $this->Pref->find('list');
        $this->set('prefs', $prefs);

        $careers = $this->Career->find('list');
        $this->set('careers', $careers);

        $insurances = $this->Insurance->find('list');
        $this->set('insurances', $insurances);

        $id = $this->s_user_id;
       //echo $id; die;
        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea')));
        $this->set('user', $user);
        // if($user){

        //     if( $this->User->validates()  && $this->UserAddress->validates() && $this->UserCompany->validates()){
            
        //       if($this->User->save($this->data['User'], false) && $this->UserAddress->save($this->data['UserAddress'], false) && $this->UserCompany->save($this->data['UserCompany'], false)){
        //         foreach ($this->data['ExpectArea'] as $item) {

        //           $item['user_id'] = $id;
        //           if($item['post_num_1'] && $item['post_num_2'] && $item['pref_id'] && $item['city']){
        //             $this->ExpectArea->create();
        //             $this->ExpectArea->save($item, false);
        //           }
        //         }
        //         //reload data
        //         $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea')));
        //         $this->set('user', $user);

        //         $this->Session->setFlash('Basic Account Information has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
        //         $this->render('ajax_update_basic_info');
        //       }
        //     }
        // }
         //print_r($this->data);die;
        if($this->data['User']){

          if($this->data['User']['is_confirm']){

            $user_info = $this->Session->read('user_info');
            //print_r($user_info);die;
              if($this->User->save($user_info['User'], false) && $this->UserAddress->save($user_info['UserAddress'], false) && $this->UserCompany->save($user_info['UserCompany'], false)){
                //print_r($user_info['UserAddress']); die;
                  foreach ($user_info['ExpectArea'] as $item) {

                    $item['user_id'] = $id;
                    if($item['post_num_1'] && $item['post_num_2'] && $item['pref_id'] && $item['city']){
                      $this->ExpectArea->create();
                      $this->ExpectArea->save($item, false);
                    }
                  }
                  //reload data
                  $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea')));
                  $this->set('user', $user);
                  $this->data = $user;
                  $this->Session->setFlash('Basic Account Information has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
                  //$this->render('ajax_update_basic_info');
                }
                $this->set('is_confirm', "");
          }
          else {
            $user_info = $this->data;
           
            $this->Session->write('user_info', $user_info);
            //print_r($this->Session->read('user_info'));die;
            $this->data['User'] = $user_info['User'];
            $user_info['User']['status_id'] = $user['User']['status_id'];
            //print_r($this->data);die;
             $this->set('user', $user_info);
            //echo 1; die;
            $this->set('is_confirm', 1);

          }
          
        }
        $this->render('ajax_update_basic_info');
         
      }

    }

    function edit_register_info(){
        $id = $this->s_user_id;
     //echo $id; die;
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' )));
      $this->set('user', $user);
      if($user['User']['status_id'] == "2"){
        
        //echo 111; die;  
        // $this->data['UserCompany'] = $user['UserCompany'][0];
        //print_r($this->data); die;
        if($this->data){
          //print_r($this->data); die;
          
           $this->User->set( $this->data );
           $this->UserAddress->set( $this->data );
           $this->UserCompany->set( $this->data );
          //$this->User->validates();

           if( $this->User->validates()  && $this->UserAddress->validates() && $this->UserCompany->validates()){
            // if($this->User->save($user, false)){
            //     $this->Session->setFlash('Your Profile has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
            //      $this->redirect("profile");
            //  }
            if($this->User->save($this->data['User'], false) && $this->UserAddress->save($this->data['UserAddress'], false) && $this->UserCompany->save($this->data['UserCompany'], false)){
              $this->Session->setFlash('Your Account Information has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
              $this->redirect( "my_page" );
            }
          }
        }
        else {
          $married_statuses = $this->MarriedStatus->find( 'list' );
          $this->set( 'married_statuses', $married_statuses);

          $works = $this->Work->find( 'list' );
          $this->set( 'works', $works);


          $prefs = $this->Pref->find('list');
          $this->set('prefs', $prefs);
          $this->data = $user;
        }
      }

    }

    function _validate($user){
       $result = array(
        'error'=>0,
        'User'=>array(
            'UserInfo'=> array('key'=>'Basic Info', 'error'=>0, 'fields'=>array()),
            'UserAddress'=> array('key'=>'User Address', 'error'=>0, 'fields'=>array()),
            'UserContact'=> array('key'=>'User Contact', 'error'=>0, 'fields'=>array()),
            'UserCompany'=> array('key'=>'User Company', 'error'=>0, 'fields'=>array()),
            'UserDebt'=> array('key'=>' User Debt', 'error'=>0, 'fields'=>array()),
            'UserResidence'=>array('key'=>'User Residence', 'error'=>0, 'fields'=>array()),
            'ExpectArea'=>array('key'=>'Expect Area', 'error'=>0, 'fields'=>array())
          ),
        'UserPartner'=>array(
            'UserPartnerInfo'=> array('key'=>'Partner Info', 'error'=>0, 'fields'=>array()),
            'UserPartnerContact'=> array('key'=>'UserPartnerContact', 'error'=>0, 'fields'=>array()),
            'UserPartnerCompany'=> array('key'=>'Partner Company', 'error'=>0, 'fields'=>array()),
            'UserPartnerRelation'=> array('key'=>'Partner Relation', 'error'=>0, 'fields'=>array())
          ),
        'UserGuarantor'=>array(
            'UserGuarantorInfo'=> array('key'=>'Guarantor Info', 'error'=>0, 'fields'=>array()),
            'UserGuarantorAddress'=> array('key'=>'Guarantor Address', 'error'=>0, 'fields'=>array()),
            'UserGuarantorCompany'=> array('key'=>'Guarantor Company', 'error'=>0, 'fields'=>array()),
            'UserGuarantorContact'=> array('key'=>'Guarantor Contact', 'error'=>0, 'fields'=>array())
          ),
        'UserAttachment'=> array('key'=>'File Attachment', 'error'=>0, 'fields'=>array())
      );
      $this->User->set($user);
      if(!$this->User->validates()){
        $user_info_fields = array('first_name'=> 'First name', 'last_name' =>' Last Name', 'first_name_kana'=>'First Name Kana', 'last_name_kana'=>'Last Name Kana', 'gender'=>'Gender', 'live_with_family' => 'Live with Family', 'num_child' =>'Number of Children');
        
        $user_contact_fields = array('email'=> 'Email Contact', 'phone'=>'Phone Number', 'home_phone'=>'home_phone', 'contact_type'=>'Contact Type');
       
        $user_debt_fields = array('debt_count'=>'Debt Num', 'debt_total_value'=>'Debt Total Value','debt_pay_per_month'=>'Debt pay perment');
        
         $result['error'] = 1;
         $result['User']['UserInfo']['fields'] = array();
         $result['User']['UserContact']['fields'] = array();
        foreach ($this->User->invalidFields() as $key => $value) {
          if(array_key_exists($key, $user_info_fields)){
            array_push($result['User']['UserInfo']['fields'], $user_info_fields[$key]);
            $result['User']['UserInfo']['error'] = 1;
          }
          else if(array_key_exists($key, $user_contact_fields)){
            array_push($result['User']['UserContact']['fields'], $user_contact_fields[$key]);
            $result['User']['UserContact']['error'] = 1;
          }
          else if(array_key_exists($key, $user_debt_fields)){
            array_push($result['User']['UserDebt']['fields'], $user_debt_fields[$key]);
            $result['User']['UserDebt']['error'] = 1;
          }
          
        }
      }

      $this->UserCompany->set($user);
      //if(!$this->UserCompany->validates()){
      //  $result['error'] = 1;
         $user_company_fields = array('work_id'=>'Work', 'insurance_id'=>'Insurance');
         $user_comapany_required_fields = array( 'name'=>'Name', 'name_kana'=>'Name Kana', 'post_num_1'=>'Post Num 1', 'post_num_2'=>'Post Num 2', 'pref_id' =>'Pref ID',
          'city'=>'City', 'address'=>'Address', 'phone'=>'Phone', 'fax'=>'Fax', 'career_id'=>'Career ID', 'position'=>'Position', 'department'=>'Department', 'description'=>'Description', 
          'month_worked'=> 'Month worked', 'year_worked'=>'Year Worked', 'salary_month'=>'Salary Month', 'salary_year'=>'Salary Year', 'salary_receive_id' => 'Salary Recieve Type', 'salary_type'=>'Salary Type', 'insurance_id'=>'Insurance');
          // foreach ($this->UserCompany->invalidFields() as $key => $value) {
          //    if(array_key_exists($key, $user_company_fields)){
          //        array_push($result['User']['UserCompany']['fields'], $user_company_fields[$key]);
          //       $result['User']['UserCompany']['error'] = 1;
          //    }
          //  }
          if( $user['UserCompany']['work_id'] ){
            $requireds = $this->WorkRequired->find('first', array('conditions'=>array('WorkRequired.work_id'=>$user['UserCompany']['work_id'])));
            //print_r($requireds['WorkRequired'] ); die;
            foreach ($requireds['WorkRequired'] as $key => $value) {
              if($value){
                if(!$user['UserCompany'][$key]){
                   array_push($result['User']['UserCompany']['fields'], $user_comapany_required_fields[$key]);
                   $result['User']['UserCompany']['error'] = 1;
                   $result['error'] = 1;
                }
              }
            }
          }
          else {
            $result['error'] = 1;
             foreach ($user_company_fields as $key => $value) {
       
              array_push($result['User']['UserCompany']['fields'], $value);
              $result['User']['UserCompany']['error'] = 1;
            }
          }
          
      //}
      $this->UserAddress->set($user);
      if(!$this->UserAddress->validates()){
        //print_r($this->UserAddress->invalidFields()); die;
          $result['error'] = 1;
          $user_address_fields = array('post_num_1'=>'Address Post Num 1', 'post_num_2'=>'Addres Post Num 2' , 'pref_id' => 'Address Pref Id', 'city'=> 'Address City ', 'address'=>' House Address');
          $user_residence_fields = array( 'residence_id' => ' Residence Id', 'housing_costs' => 'House Fee','year_residence' => 'Residence Year');
          foreach ($this->UserAddress->invalidFields() as $key => $value) {
             if(array_key_exists($key, $user_address_fields)){
                 array_push($result['User']['UserAddress']['fields'], $user_address_fields[$key]);
                $result['User']['UserAddress']['error'] = 1;
             }
             else if(array_key_exists($key, $user_residence_fields)){
                array_push($result['User']['UserResidence']['fields'], $user_residence_fields[$key]);
                $result['User']['UserResidence']['error'] = 1;
             }
          }
      }
      //foreach($user['ExpectArea'] as $item){
       $user_expect_area_fields = array('post_num_1'=> 'Post Num 1', 'post_num_2'=> 'Post Num 2', 'pref_id' =>'Pref ID', 'city'=>'City', 'address'=>'Address');
      if($user['ExpectArea']){

        $this->ExpectArea->set($user['ExpectArea'][0]);
        
        if( !$this->ExpectArea->validates()){
          $result['error'] = 1;
          foreach ($this->ExpectArea->invalidFields() as $key => $value) {
            if(array_key_exists($key, $user_expect_area_fields)){
                 array_push($result['User']['ExpectArea']['fields'], $user_expect_area_fields[$key]);
                $result['User']['ExpectArea']['error'] = 1;
             }
          }
        }
      }
      else {
        $result['User']['ExpectArea']['error'] = 1;
      }


      //}
     $user_partner_info_fields = array('first_name'=> 'First name', 'last_name' =>' Last Name', 'first_name_kana'=>'First Name Kana', 'last_name_kana'=>'Last Name Kana', 'gender'=>'Gender', 
            'year_of_birthday'=>' Year of Birthday', 'month_of_birth'=>'Month Of Birthday', 'day_of_birth'=> 'Day Of Birthday');
      $user_partner_company_fields = array('work_id'=> 'Work ', 'insurance_id'=> 'Insurance Type');
      $user_partner_contact_fields = array('phone'=> 'Phone Number');

     $partner = $this->UserPartner->find('first',array( 'conditions'=>array( 'UserPartner.id'=> $user['UserPartner']['id'])));
     if($partner){
      $this->UserPartner->set($partner);
      if(!$this->UserPartner->validates()){
        //print_r($this->UserPartner->invalidFields()); die;
        $result['error'] = 1;
       

        $result['UserPartner']['UserPartnerInfo']['fields'] = array();
        $result['UserPartner']['UserPartnerCompany']['fields'] = array();
        $result['UserPartner']['UserPartnerContact']['fields'] = array();
      
        foreach ($this->UserPartner->invalidFields() as $key => $value) {
         
          if (array_key_exists($key, $user_partner_info_fields)){
            array_push($result['UserPartner']['UserPartnerInfo']['fields'], $user_partner_info_fields[$key]);
            $result['UserPartner']['UserPartnerInfo']['error'] = 1;
          }
          else if(array_key_exists($key, $user_partner_company_fields)){
            array_push($result['UserPartner']['UserPartnerCompany']['fields'], $user_partner_company_fields[$key]);
            $result['UserPartner']['UserPartnerCompany']['error'] = 1;
          }

          else if(array_key_exists($key, $user_partner_contact_fields)){
            array_push($result['UserPartner']['UserPartnerContact']['fields'], $user_partner_contact_fields[$key]);
            $result['UserPartner']['UserPartnerContact']['error'] = 1;
          }
          
        }
      }
    }
    else {
      foreach ($user_partner_info_fields as $key => $value) {
       
        array_push($result['UserPartner']['UserPartnerInfo']['fields'], $value);
        $result['UserPartner']['UserPartnerInfo']['error'] = 1;
      }
      foreach ($user_partner_company_fields as $key => $value) {
            array_push($result['UserPartner']['UserPartnerCompany']['fields'], $value);
            $result['UserPartner']['UserPartnerCompany']['error'] = 1;
      }

      foreach ($user_partner_contact_fields as $key => $value) {
        array_push($result['UserPartner']['UserPartnerContact']['fields'], $value);
        $result['UserPartner']['UserPartnerContact']['error'] = 1;
      }
    }
      //print_r( $result['UserPartner']); die;
      if($user['UserRelation']){
        //foreach ($user['User']['UserRelation'] as $item) {
          $item = $user['UserRelation'][0];
          //print_r($item);die;
           $result['UserPartner']['UserPartnerRelation']['fields'] = array();
           $user_partner_relation_fields = array('first_name'=> 'First name', 'last_name' =>' Last Name', 'first_name_kana'=>'First Name Kana', 'last_name_kana'=>'Last Name Kana', 'year_of_birthday'=>' Year of Birthday', 'month_of_birth'=>'Month Of Birthday', 'day_of_birth'=> 'Day Of Birthday', 'relate'=>'Relation');
        $this->UserRelation->set($item);
        if( !$this->UserRelation->validates()){
          $result['error'] = 1;
          foreach ($this->UserRelation->invalidFields() as $key => $value) {
            if(array_key_exists($key, $user_partner_relation_fields)){
                 array_push($result['UserPartner']['UserPartnerRelation']['fields'], $user_partner_relation_fields[$key]);
                $result['UserPartner']['UserPartnerRelation']['error'] = 1;
             }
          }
        }
       
      }
      $guarantor = $this->UserGuarantor->find('first',array( 'conditions'=>array( 'UserGuarantor.id'=> $user['UserGuarantor']['id'])));
      $user_guarantor_info_fields = array('first_name'=> 'First name', 'last_name' =>' Last Name', 'first_name_kana'=>'First Name Kana', 'last_name_kana'=>'Last Name Kana', 
            'year_of_birthday'=>' Year of Birthday', 'month_of_birth'=>'Month Of Birthday', 'day_of_birth'=> 'Day Of Birthday', 'gender'=>'Gender' ,'live_with_family' => 'Live with Family', 'married_status' => 'Marial Status', 'relate'=>'Relationship');
          $user_guarantor_company_fields = array('work_id'=>'Work ID', 'insurance_id'=>'Insurance' );
          $user_guarantor_address_fields = array('post_num_1'=>'Address Post Num 1', 'post_num_2'=>'Addres Post Num 2' , 'pref_id' => 'Address Pref Id', 'city'=> 'Address City ', 
            'address'=>' House Address','residence_id' => 'Residence Status', 'Year residence', 'housing_cost' => 'House Fee');
          $user_guarantor_contact_fields = array('phone'=>'Phone', 'home_phone'=>'Home Phone', 'contact_type_id'=> 'Contact Type');  
      if($guarantor){
        $this->UserGuarantor->set($guarantor);
        if(!$this->UserGuarantor->validates()){
          //print_r($this->UserPartner->invalidFields()); die;
          $result['error'] = 1;
          

          $result['UserGuarantor']['UserGuarantorInfo']['fields'] = array();
          $result['UserGuarantor']['UserGuarantorAddress']['fields'] = array();
          $result['UserGuarantor']['UserGuarantorContact']['fields'] = array();
          $result['UserGuarantor']['UserGuarantorCompany']['fields'] = array();
          foreach ($this->UserGuarantor->invalidFields() as $key => $value) {
           
            if (array_key_exists($key, $user_guarantor_info_fields)){
              array_push($result['UserGuarantor']['UserGuarantorInfo']['fields'], $user_guarantor_info_fields[$key]);
              $result['UserGuarantor']['UserGuarantorInfo']['error'] = 1;
            }
            else if(array_key_exists($key, $user_guarantor_company_fields)){
                 array_push($result['UserGuarantor']['UserGuarantorCompany']['fields'], $user_guarantor_company_fields[$key]);
              $result['UserGuarantor']['UserGuarantorCompany']['error'] = 1;
            }

            else if(array_key_exists($key, $user_guarantor_address_fields)){
               array_push($result['UserGuarantor']['UserGuarantorAddress']['fields'], $user_guarantor_address_fields[$key]);
              $result['UserGuarantor']['UserGuarantorAddress']['error'] = 1;
            }
            else if(array_key_exists($key, $user_guarantor_contact_fields)){
              array_push($result['UserGuarantor']['UserGuarantorContact']['fields'], $user_guarantor_contact_fields[$key]);
              $result['UserGuarantor']['UserGuarantorContact']['error'] = 1;
            }
            
          }
        }
      }
      else {
        $result['error'] = 1;
        $result['UserGuarantor']['UserGuarantorInfo']['error'] = 1;
        foreach ($user_guarantor_info_fields as $key => $value) {
           array_push($result['UserGuarantor']['UserGuarantorInfo']['fields'], $value);
        }
        $result['UserGuarantor']['UserGuarantorCompany']['error'] = 1;
        foreach ($user_guarantor_company_fields as $key => $value) {
           array_push($result['UserGuarantor']['UserGuarantorCompany']['fields'], $value);
        }
        $result['UserGuarantor']['UserGuarantorAddress']['error'] = 1;
        foreach ($user_guarantor_address_fields as $key => $value) {
           array_push($result['UserGuarantor']['UserGuarantorAddress']['fields'], $value);
        }
        $result['UserGuarantor']['UserGuarantorResidence']['error'] = 1;
        foreach ($user_guarantor_contact_fields as $key => $value) {
           array_push($result['UserGuarantor']['UserGuarantorContact']['fields'], $value);
        }
      }
      if($user['UserAttachment']){
        // $attachments = $this->UserAttachment->find('all', array('conditions'=>array('UserAttachment.user_id'=>$user['User']['id'])));
        // foreach ($attachments as $attach) {
        //   $attach['AttachmentType']['is_required']
        // }
        $attachment_types = $this->AttachmentType->find('all', array('conditions'=>array('AttachmentType.is_required'=>1)));
        foreach ($attachment_types as $type) {
          $attachment= $this->UserAttachment->find('all', array('conditions'=>array('UserAttachment.user_id'=>$user['User']['id'], 'UserAttachment.attachment_type_id'=>$type['AttachmentType']['id'])));
          if(!$attachment){
            //'UserAttachment'=> array('key'=>'File Attachment', 'error'=>0, 'fields'=>array())
            
            $result['error'] = 1;
            $result['UserAttachment']['error'] = 1;
            $result['UserAttachment']['error_msg'] = "";

          }
        }

      }
      else {
        $result['error'] = 1;
            $result['UserAttachment']['error'] = 1;
            $result['UserAttachment']['error_msg'] = "";
      }


//die;
      // $result = array(
      //   'error'=>0,
      //   'User'=>array(
      //       'UserInfo'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserAddress'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserContact'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserCompany'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserDebt'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserResidence'=>array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'ExpectArea'=>array('key'=>'', 'error'=>0, 'fields'=>array())
      //     ),
      //   'UserPartner'=>array(
      //       'UserParnerInfo'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserParnerAddress'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserParnerCompany'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserParnerRelation'=> array()
      //     ),
      //   'UserGuarantor'=>array(
      //       'UserGuarantorInfo'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserGuarantorAddress'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserGuarantorCompany'=> array('key'=>'', 'error'=>0, 'fields'=>array()),
      //       'UserGuarantorResidence'=> array('key'=>'', 'error'=>0, 'fields'=>array())
      //     ),
      //   'UserAttachment'=> array('key'=>'', 'error'=>0, 'fields'=>array())
      // );
      // $user_info_error_fields = $this->User->validate_user_info($user['User']);
      // if($user_info_error_fields){
      //   $result['User']['UserInfo']['error'] = 1;
      //   $result['User']['UserInfo']['fields'] = $user_info_error_fields;
      // }
      // $user_address_error_fields = $this->UserAddress->validate_user_address($user['User']);
      // if($user_info_error_fields){
      //   $result['User']['UserAddress']['error'] = 1;
      //   $result['User']['UserAddress']['fields'] = $user_address_error_fields;
      // }

      // $user_contact_error_fields = $this->User->validate_user_contact($user['User']);
      // if($user_info_error_fields){
      //   $result['User']['UserContact']['error'] = 1;
      //   $result['User']['UserContact']['fields'] = $user_contact_error_fields;
      // }
      // $user_company_error_fields = $this->UserCompany->validate_user_company($user['User']);
      // if($user_info_error_fields){
      //   $result['User']['UserCompany']['error'] = 1;
      //   $result['User']['UserCompany']['fields'] = $user_company_error_fields;
      // }
      
      // $user_debt_error_fields = $this->User->validate_user_debt($user['User']);
      // if($user_info_error_fields){
      //   $result['User']['UserDebt']['error'] = 1;
      //   $result['User']['UserDebt']['fields'] = $user_debt_error_fields;
      // }
      // $user_expect_area_error_fields = $this->ExpectArea->validate_user_info($user['ExpectArea']);
      // if($user_info_error_fields){
      //   $result['User']['ExpectArea']['error'] = 1;
      //   $result['User']['ExpectArea']['fields'] = $user_expect_area_error_fields;
      // }
      // echo "<pre>";
      // print_r($result);
      // echo "</pre>";
      // die;
      return $result;
    }    

    function reload_dashboard(){
      if($this->request->is('ajax')){
         $id = $this->s_user_id;
        if($id){
       
          $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
          $this->data = $user;
          $this->set('user', $user);
          $validations = $this->_validate($user);
          $this->set('validations', $validations);
          $this->render('ajax_reload_dashboard');

        }
      }
    }

    function update_account_info(){
       $id = $this->s_user_id;
      if($id){
       //echo $id; die;
        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
        $this->data = $user;
        $validations = $this->_validate($user);
        if(!$validations['error']){
          $user['User']['status_id'] = 3;
          if($this->User->save($user, false)){
            $this->Session->setFlash('Your Account Information has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
              $this->redirect( "my_page" );
            $this->redirect('My Page');

          } 
          else {
            $this->Session->setFlash("Cannot Save Data", 'default',array('class' => 'alert alert-dismissible alert-info"'));
          }

        }
      }
      else {
        $this->redirect('login');
      }
    }

}
?>
