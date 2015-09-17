<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class UsersController extends AppController{
    var $uses = array('User', 'Administrator',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress', 'WorkingStatus' , 'MarriedStatus');
    var $components = array('Login', 'Util', 'Session');
    var $helpers = array('Html');
     
        
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
    
    function admin_edit($id=null){
        
       
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
     
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' , 'FamilyStructure',  'ExpectArea')));
      $this->set('user', $user);
      $married_statuses = $this->MarriedStatus->find( 'list' );
      $this->set( 'married_statuses', $married_statuses);

      $working_statuses = $this->WorkingStatus->find( 'list' );
      $this->set( 'working_statuses', $working_statuses);


      $prefs = $this->Pref->find('list');
      $this->set('prefs', $prefs);
      $this->data = $user;

      if($user['User']['status_id'] > 1) {

        $this->render('admin_view_2');
      }

      
    }

    function admin_approve_register($id){

      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' , 'FamilyStructure', 'ExpectArea')));
      if($user['User']['status_id'] == 1){
        $user['User']['status_id'] = 2;
        $username = str_replace(" ", "_", $user['User']['first_name_kana'] ). "_" .  str_replace(" ", "_", $user['User']['last_name_kana']) . "_" . $id;
        $password = $this->Util->createRandomPassword(10);
        $user['User']['username'] = $username;
        $user['User']['password'] = md5($password);
        //print_r($user); die;
        if($this->User->save($user, false)){
          //echo $password; die;
          $this->Session->setFlash("Has been approved Successful with username:  $username , and password: $password", 'default',array('class' => 'alert alert-dismissible alert-success"'));
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

      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' , 'FamilyStructure')));
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
            $username = $this->data['User']['username'];
            $password = $this->data['User']['password'];
            $this->Login->login($username, $password);
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
      $married_statuses = $this->MarriedStatus->find( 'list' );
      $this->set( 'married_statuses', $married_statuses);

      $working_statuses = $this->WorkingStatus->find( 'list' );
      $this->set( 'working_statuses', $working_statuses);

     
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
    function register_confirmation(){
      $user = $this->Session->read( 'user_register' );
      if( $user ) {
          $user['User']['married_status'] = $this->MarriedStatus->getNameById($user['User']['married_status_id']);
          // $user['User']['family_structure'] = $this->FamilyStructure->getNameById($user['User']['family_structure_id']);
          $user['UserCompany']['working_status'] = $this->WorkingStatus->getNameById($user['UserCompany']['working_status_id']);
          $user['UserAddress']['pref'] = $this->Pref->getNameById($user['UserAddress']['pref_id']);

          $this->set('user', $user);
          
          if($this->data){
             // print_r($this->data); die;
             if ($this->UserCompany->save( $user , false ) && $this->UserAddress->save( $user , false )){

                //save company info
                $user['User']['user_address_id'] = $this->UserAddress->getLastInsertId();                

                //save address
                $user['User']['user_company_id'] = $this->UserCompany->getLastInsertId();
                
                if( $this->User->save( $user, false ) ){

                  $user_id = $this->User->getLastInsertId();
                  // print_r($user_id); die;
                  foreach ($user['ExpectArea'] as $item) {
                    $item['user_id'] = $user_id;
                    $this->ExpectArea->create();
                    $this->ExpectArea->save($item, false);
                  }
                  

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

            $working_statuses = $this->WorkingStatus->find( 'list' );
            $this->set( 'working_statuses', $working_statuses);

           
            $prefs = $this->Pref->find('list');
            $this->set('prefs', $prefs);
            $this->data = $user;
          }
      }
      else {

      }

    }

    function register_successful(){
      $this->Session->delete('user_register');
    }

    function my_page(){
      $id = $this->s_user_id;
     //echo $id; die;
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' , 'FamilyStructure')));
      $this->set('user', $user);
    }

    function edit_register_info(){
        $id = $this->s_user_id;
     //echo $id; die;
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' , 'FamilyStructure')));
      $this->set('user', $user);
      if($user){
        
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

          $working_statuses = $this->WorkingStatus->find( 'list' );
          $this->set( 'working_statuses', $working_statuses);


          $prefs = $this->Pref->find('list');
          $this->set('prefs', $prefs);
          $this->data = $user;
        }
      }

    }

}
?>
