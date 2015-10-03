<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class UsersController extends AppController{
    var $uses = array('User', 'Administrator',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress', 'Work' , 
      'MarriedStatus', 'Residence', 'Career', 'Insurance', 'AttachmentType', 'UserAttachment', 'UserPartner', 'UserGuarantor', 'UserRelation', 'WorkRequired',
      'Status');
    var $components = array('Login', 'Util', 'Session', 'RequestHandler');
    var $helpers = array('Html' , 'Js');
     
    /**
     * ADMIN VIEW FUNCTION
     * @return response
     */
    function admin_index(){
      $statuses = $this->Status->find('list', array('conditions'=>array('Status.id <> 0')));
      $this->set('statuses', $statuses);
      $prefs = $this->Pref->find('list');
      $this->set('prefs', $prefs);
      $criteria = " User.is_deleted = 0";
       if($this->params['named']['status']){
        $status_id = $this->params['named']['status'];
        $criteria .= " AND User.status_id = '$status_id'" ;
        $this->set('status', $status_id);
      }
      if($this->params['named']['city']){
        $city = $this->params['named']['city'];
         $criteria .= " AND UserAddress.city = '$city'" ;
        
        $this->set('city', $city);
      }
      if($this->params['named']['pref']){
        $pref = $this->params['named']['pref'];
         $criteria .= " AND UserAddress.pref_id = '$pref'" ;
        
        $this->set('pref', $pref);
      }
      
       if($this->params['named']['from_register']){
        $from_register = $this->params['named']['from_register'];
        $criteria .= " AND User.created > '$from_register'" ;
        //$this->set('status', $status);
      }
       if($this->params['named']['to_register']){
        $to_register = $this->params['named']['to_register'];
        $criteria .= " AND User.created < '$to_register'" ;
        //$this->set('status', $status);
      }
     
      if($this->params['named']['from_approve']){
        $from_approve = $this->params['named']['from_approve'];
        $criteria .= " AND User.approved_date > '$from_approve'" ;
        //$this->set('status', $status);
      }
      if($this->params['named']['to_approve']){
        $to_approve = $this->params['named']['to_approve'];
        $criteria .= " AND User.approved_date > '$to_approve'" ;
        //$this->set('status', $status);
      }
      //echo $criteria; die;
        $this->paginate = array(
            'conditions' => $criteria,
            'contain' => array('UserCompany', 'UserCompany.Work',  'UserAddress', 'Status'),
            'limit' => 20,
            'recursive' => 3,
            'order' => array('id' => 'desc')
        );
        $users = $this->paginate('User');
        $this->set('users', $users);
        //print_r($users[0]['UserCompany']['Work']);die;
    }

    
    /**
     * ADMIN EDIT FUNCTION
     * @param  $id
     * @return response
     */
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

    
    /**
     * ADMIN DELETE FUNCTION
     * @param  $id
     * @return response
     */
    function admin_delete($id){
      if($id){
          //$user = $this->User->delete($id);
          $user['User']['is_deleted'] = 1;
          if($this->User->save($user, false)){
             $this->Session->setFlash('An User has been deleted successful!','default', array('class' => 'alert alert-dismissible alert-success'));
            $this->redirect('index');
          }
          
      }
    }


    /**
     * ADMIN PROFILE FUNCTION
     * @return response
     */
    function admin_profile(){
      $user = $this->Session->read('Administrator');
       $id = $user['Administrator']['id'];
       $admin = $this->Administrator->find('first', array('conditions'=>array('Administrator.id'=>$user['Administrator']['id'])));
      $this->set('user', $admin);
    }


    /**
     * ADMIN EDIT PROFILE FUNCTION
     * @return response
     */
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
           else {}
          }
        else {
           if($id){
               $user = $this->Administrator->read(null, $id);
               $this->data = $user;
           }
        }
      }


    /**
     * ADMIN CHANGE PASSWORD FUNCTION
     * @return response
     */
    function admin_change_password() {
      $admin = $this->Session->read('Administrator');
      if ( $admin ){
        $admin = $this->Administrator->find('first', array('conditions'=>array('Administrator.id'=>$admin['Administrator']['id'])));
        $this->set('admin', $admin);
        if($this->data){
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
    

    /**
     * ADMIN LOGIN FUNCTION
     * @return response
     */
    function admin_login(){
        $this->layout = null;
        $this->Session->delete("User");
        if($this->data){
          $username = $this->data['User']['username'];
          $password = $this->data['User']['password'];
          $this->Login->admin_login($username, $password);
        }
    }
    

    /**
     * ADMIN LOGOUT FUNCTION 
     * @return response
     */
    function admin_logout(){
        $this->Session->delete("Administrator");
        $this->redirect("/admin/users/login");
    }

    
    /**
     * ADMIN VIEW DETAIL
     * @param  $id
     * @return response
     */
    function admin_view($id){
     //echo date("Y-m-d H:i:s"); die;
      //$id = $this->s_user_id;
      if($id){
        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 
          'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
        $this->data = $user;

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

        if($user['User']['status_id'] > 1) {
            
          $validations = $this->_validate($user);
          $this->set('validations', $validations);
            $this->render('admin_view_2');
        }
      }
    }

    /**
     * ADMIN APPROVE USER REGISTRATION
     * @param  $user['id']
     * @return response
     */
    function admin_approve_register($id){
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id)));
      if ($user['User']['status_id'] == 1) {
        $user['User']['status_id'] = 2;
        $user['User']['approved_register_date'] =  DboSource::expression('NOW()');

        if ($this->User->save($user, false)) {
          /**
           * SEND MAIL TO CUSTOMER
           * @var CakeEmail
           */
          $Email = new CakeEmail('gmail');
          $Email->template('user_approve_success');
          $Email->emailFormat('html');
          $Email->to($user['User']['email']);
          $Email->from('moos@nal.vn');
          $Email->subject('【家賃でもらえる家】会員登録の内容確認完了');
          $Email->viewVars(array('user' => $user));
          $Email->send();
          $this->Session->setFlash("Register User has been approved", 'default',array('class' => 'alert alert-dismissible alert-success"'));
          $this->redirect('view/'.$id);
        } else {
           $this->Session->setFlash('Cannot approve this customer', 'default',array('class' => 'alert alert-dismissible alert-info"'));
          $this->redirect('view/'.$id);
        }
      } else {
           $this->Session->setFlash('Cannot approve this customer', 'default',array('class' => 'alert alert-dismissible alert-info"'));
          $this->redirect('view/'.$id);
      }
    }


    /**
     * ADMIN REJECT USER REGISTRATION
     * @param  $user['id']
     * @return response
     */
    function admin_reject_register($id){
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' )));
      $user['User']['status_id'] = 0;
      if($this->User->save($user, false)){
        /**
         * EMAIL REJECT USER REGISTRATION
         */
        $Email = new CakeEmail('gmail');
        $Email->template('user_approve_reject');
        $Email->emailFormat('html');
        $Email->to($user['User']['email']);
        $Email->from('moos@nal.vn');
        $Email->subject('【家賃でもらえる家】会員登録の却下');
        $Email->viewVars(array('user' => $user));
        $Email->send();

        echo "Reject successfully";
        $this->redirect('view/'. $id);
      }
      else {
        $this->Session->setFlash('Cannot reject this customer', 'default',array('class' => 'alert alert-dismissible alert-info"'));
        $this->redirect('view/' . $id);
      }
    }


    /**
     * ADMIN DELETE USER FUNCTION
     * @return response
     */
    function admin_delete_users(){
      if($this->data){
        foreach ($this->data['ids'] as $id) {
          $this->User->create();
          $user = $this->User->read(null, $id);
          $user['User']['is_deleted'] = 1;
          if($this->User->save($user, false)){
            
          }
        }
        $this->Session->setFlash("Some users has been deleted successful", 'default',array('class' => 'alert alert-dismissible alert-success"'));
        $this->redirect('index');
      }
      else {
        $this->Session->setFlash('Cannot delete users', 'default',array('class' => 'alert alert-dismissible alert-info"'));
        $this->redirect('index');
      }
    }

    function admin_approve($user_id){
      $user = $this->User->read(null, $user_id);
      if($user['User']['status_id'] == 3){
        
        $user['User']['status_id'] = 4;
        $user['User']['approved_date'] = DboSource::expression('NOW()');
        if($this->User->save($user, false)){
          /**
           * EMAIL Aprrove User Step 2
           */
          $Email = new CakeEmail('gmail');
          $Email->template('approve_user');
          $Email->emailFormat('html');
          $Email->to($user['User']['email']);
          $Email->from('moos@nal.vn');
          $Email->subject(__('admin.email.approve_user.title'));
          $Email->viewVars(array('user' => $user));
          $Email->send();
        
          $this->Session->setFlash("User has been approved", 'default',array('class' => 'alert alert-dismissible alert-success"'));
          $this->redirect('view/'. $user_id);
        }

      }
      else {
        $this->redirect("users/". $user_id);
      }
    }
    function admin_reject($user_id){
      $user = $this->User->read(null, $user_id);
      if($user['User']['status_id'] == 3){
          $user['User']['status_id'] = 0;
          if($this->User->save($user, false)){
              /**
             * EMAIL Aprrove User Step 2
             */
            $Email = new CakeEmail('gmail');
            $Email->template('reject_user');
            $Email->emailFormat('html');
            $Email->to($user['User']['email']);
            $Email->from('moos@nal.vn');
            $Email->subject(__('admin.email.reject_user.title'));
            $Email->viewVars(array('user' => $user));
            $Email->send();

            $this->Session->setFlash("Reject User successful", 'default',array('class' => 'alert alert-dismissible alert-success"'));
            $this->redirect('view/'. $user_id);
          }
          else {

             $this->Session->setFlash('Cannot Reject users', 'default',array('class' => 'alert alert-dismissible alert-info"'));
             $this->redirect('view/'. $user_id);
          }
      }
      else {
        $this->redirect("users/". $user_id);
      }
    }
    function admin_return($user_id){
      $user = $this->User->read(null, $user_id);
      if($user['User']['status_id'] == "3"){
        if($this->data){
          $comment = $this->data['User']['comment']; 
         $requireds =  $this->data['User']['required'] ;
          foreach($this->data['User']['required'] as $item){
            if($item == REQUEST_MORE_GUARANTOR_ID ){
              $user['User']['need_more_guarantor'] = 1;
            }  
          }
     

          $user['User']['status_id'] = 2;
          if($this->User->save($user, false)){
            /**
             * EMAIL Aprrove User Step 2
             */
            $Email = new CakeEmail('gmail');
            $Email->template('return_user');
            $Email->emailFormat('html');
            $Email->to($user['User']['email']);
            $Email->from('moos@nal.vn');
            $Email->subject(__('admin.email.return_user.title'));
            $Email->viewVars(array('user' => $user, 'requireds'=>$requireds, 'comment'=>$comment));
            $Email->send();
            $this->Session->setFlash("Return User successful", 'default',array('class' => 'alert alert-dismissible alert-success"'));
            $this->redirect('view/'. $user_id);
          }
          else {

             $this->Session->setFlash('Cannot return users', 'default',array('class' => 'alert alert-dismissible alert-info"'));
             $this->redirect('view/'. $user_id);
          }



        }
        else {
          $this->Session->setFlash('Invalid data', 'default',array('class' => 'alert alert-dismissible alert-info"'));
        }
      }
      else {
        $this->redirect("users/". $user_id);
      }
    }

    function admin_edit_max_payment($user_id){
      $user = $this->User->read(null, $user_id);
      if($user_id){
        $max_payment = $this->data['User']['max_payment'];

        $user['User']['max_payment'] = $max_payment;
        if($this->User->save($user, false)){
          $this->redirect('view/'. $user_id);
        }
        else {
          $this->Session->setFlash( "Cannot set max payment value for this user", 'default',array('class' => 'alert alert-dismissible alert-info"'));
        }
      }
    }
    function admin_process_payment($user_id){
      $user = $this->User->read(null, $user_id);
      if($user['User']['status_id'] == 4){
          $user['User']['status_id'] = 5;
          if($this->User->save($user, false)){
              /**
             * EMAIL Aprrove User Step 2
             */
            $Email = new CakeEmail('gmail');
            $Email->template('process_payment_successful');
            $Email->emailFormat('html');
            $Email->to($user['User']['email']);
            $Email->from('moos@nal.vn');
            $Email->subject(__('admin.email.project_payment.title'));
            $Email->viewVars(array('user' => $user));
            $Email->send();

            $this->Session->setFlash("Reject User successful", 'default',array('class' => 'alert alert-dismissible alert-success"'));
            $this->redirect('view/'. $user_id);
          }
          else {

             $this->Session->setFlash('Cannot Reject users', 'default',array('class' => 'alert alert-dismissible alert-info"'));
             $this->redirect('view/'. $user_id);
          }
      }
      else {
        $this->redirect("users/". $user_id);
      }
    }
    /**
     * USER LOGIN FUNCTION
     * @return response
     */
    function login(){
      $this->layout = null;
      $this->Session->delete("Administrator");
      if($this->data){
        $email = $this->data['User']['email'];
        $password = $this->data['User']['password'];
        $this->Login->login($email, $password);
      }
    }
    
    
    /**
     * USER LOGOUT FUNCTION
     * @return response
     */
    function logout(){
      $this->Login->logout();
    }
    

    /**
     * USER VIEW PROFILE FUNCTION
     * @return [type] [description]
     */
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


    /**
     * USER CREATE PASSWORD FUNCTION
     * @param  $user['email']
     * @param  $user['access_token']
     * @return response
     */
    function create_password($email=null, $access_token=null){
      $this->layout = null;
      if ($this->data) {
        $email = $this->data['User']['email'];
        $access_token = $this->data['User']['access_token'];
        $user = $this->User->find('first', array('conditions'=>array('User.email'=>$email, 'User.access_token'=>$access_token)));
        if( $user ){
          if($this->data['User']['password'] && strlen($this->data['User']['password']) >= 8){
            if ($this->data['User']['password'] == $this->data['User']['confirm_password']){
              $user['User']['password'] = md5($this->data['User']['password']);
              $user['User']['access_token'] = null; 
              if ($this->User->save($user, false) ){
                $this->redirect('create_password_successful');
              } else {
                $this->Session->setFlash("Cannot change your password", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                echo "Khong the thay doi password";
              } 
            } else {
              $this->Session->setFlash("Password Confirmation is not match", 'default',array('class' => 'alert alert-dismissible alert-info"'));
              echo "Password confirm ko dung";
            }
          } else {
            $this->Session->setFlash('Do dai cua password qua ngan (8-30 ky tu)', 'default');
            echo "Do dai password qua ngan";
          }
        }
      } else {
        if($access_token && $email){
          $user = $this->User->find('first', array('conditions'=>array( 'User.email'=>$email, 'User.access_token'=>$access_token)));
          if ($user) {
            $this->data = $user;
            $this->set('user', $user);
          } else {
            echo "Khong duoc 1";
          }
        } else {
          echo "Khong co access_token va email";
        }
      }
    }


    /**
     * USER VIEW CREATE PASSWORD SUCCESSFUL
     * @return response
     */
    function create_password_successful() {
      $this->layout = null;
    }
    

    /**
     * USER CHANGE PASSWORD FUNCTION
     * @return response
     */
    function change_password(){
      $this->layout = null;
      $user = $this->Session->read('User');
      if ( $user ){
        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$user['User']['id'])));
        $this->set('user', $user);
        if($this->data){
            if($this->data['User']['password'] && strlen($this->data['User']['password']) >= 6){
              if ($this->data['User']['password'] == $this->data['User']['confirm_password']){
                $user['User']['password'] = md5($this->data['User']['password']);
                if ($this->User->save($user, false) ){
                  $this->redirect('change_password_successful');
                }
                else {
                  $this->Session->setFlash("Cannot change your password", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                  echo "Khong the thay doi password";
                }
              }
              else {
                  $this->Session->setFlash("Password Confirmation is not match", 'default',array('class' => 'alert alert-dismissible alert-info"'));
                  echo "Password confirm khong dung";
                }
            }
            else {
              $this->Session->setFlash("Length of password is too short (6 - 30 charracters)", 'default',
                array('class' => 'alert alert-dismissible alert-info'));
              echo "Do dai password sai";
            }
          }
        }
      else {
        $this->redirect( 'login' );
      }
    }


    /**
     * USER EMAIL CHANGE PASSWORD
     * @return response
     */
    function email_change_password() {
      $this->layout = 'default_new';
      $user = $this->Session->read('User');
      $user['User']['access_token'] = md5(rand(0,100));
      $this->User->save($user, false);

      $Email = new CakeEmail("gmail");
      $Email->template('user_change_password');
      $Email->emailFormat('html');
      $Email->to($user['User']['email']);
      $Email->from('moos@nal.vn');
      $Email->subject("【家賃でもらえる家】パスワードの変更");
      $Email->viewVars(array('user' => $user));
      $Email->send();
    }


    /**
     * USER CHANGE PASSWORD SUCCESSFUL
     * @return response
     */
    function change_password_successful() {
      $this->layout = null;
      $user = $this->Session->read('User');
      $user['User']['access_token'] = null;
      $this->User->save($user, false);
      /**
       * USER THAY DOI PASSWORD THANH CONG -> GUI EMAIL THANH CONG DEN NGUOI DUNG
       */
      $Email = new CakeEmail("gmail");
      $Email->template('user_change_password_success');
      $Email->emailFormat('html');
      $Email->to($user['User']['email']);
      $Email->from('moos@nal.vn');
      $Email->subject("【家賃でもらえる家】パスワードの設定完了");
      $Email->viewVars(array('user' => $user));
      $Email->send();
    }


    /**
     * USER RESET PASSWORD FUNCTION
     * @return response
     */
    function reset_password() {
      $this->layout = null;
      if($this->data['email']){
        $user = $this->User->find('first', array('conditions'=>array('User.email'=>$this->data['email']), 'contain'=>array('id')));
        if($user){
          $hash=sha1($user['User']['username'].rand(0,100));
          $this->User->id = $user['User']['id']; 
          $this->User->saveField('access_token', $hash);

          $Email = new CakeEmail("gmail"); 
          $Email->template('user_reset_password');
          $Email->emailFormat('html');
          $Email->from('moos@nal.vn');
          $Email->to($this->data['email']);
          $Email->subject('【家賃でもらえる家】パスワードの変更');
          $Email->viewVars(array('user' => $user, 'hash'=>$hash));

          if($Email->send()){
            return $this->render("reset_password_successful");
          }
        }
      }
    }


    /**
     * USER AJAX RESET PASSWORD 
     * @return [type] [description]
     */
    function ajax_password_reset(){
      $user = $this->User->find('first', array('conditions'=>array('User.email'=>$_POST['email']), 'contain'=>array('id')));
      if($user){
        die ('ok');
      }
      else{
        die('not');
      }
    }
    

    /**
     * USER RESET PASSWORD VIEW
     * @return [type] [description]
     */
    function reset_link(){
      if($_GET['token'] and $_GET['email']){
          $user = $this->User->find('first', array('conditions'=>array('User.access_token'=>$_GET['token']), 'contain'=>array('id')));
        if($user['User']['email'] == $_GET['email']) {
          $this->layout = null;
        }
        else{ 
          return $this->redirect("login");
        }
      }else{
        return $this->redirect("login");
      }
    }


    /**
     * USER RESET PASSWORD VIEW 2
     * @return [type] [description]
     */
    function reset_link_after(){
      if($_POST['token']){
        $user = $this->User->find('first', array('conditions'=>array('User.access_token'=>$_POST['token']), 'contain'=>array('id'))); 
      }

      if($user and $_POST['password']){
          $user = $this->User->find('first', array('conditions'=>array('User.access_token'=>$_POST['token']), 'contain'=>array('id')));
          $this->User->id = $user['User']['id']; 
          $this->User->saveField('password', md5($_POST['password']));
          $this->User->saveField('access_token', '');
          return $this->redirect("reset_password_successful");
      }
    }


    /**
     * USER RESET PASSWORD SUCCESSFUL
     * @return response
     */
    function reset_password_successful(){
      $this->layout = null;
    }


    /**
     * USER AJAX RESET LINK
     * @return response
     */
    function ajax_reset_link(){
      if($_POST['token']){
      $user = $this->User->find('first', array('conditions'=>array('User.access_token'=>$_POST['token']), 'contain'=>array('id')));
      }
      else {die ('not'); }
      if($user){
        die ('ok');
      }
      else{
        die('not');
      }
    }


    /**
     * USER EDIT PROFILE FUNCTION
     * @return response
     */
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
           else {}
        }
        else {
          $this->data = $user;
        }
      }
    }

    
    /**
     * USER REGISTER FUNCTION
     * @return response
     */
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
        $this->User->set( $this->data );
        $this->UserAddress->set( $this->data );
        $this->UserCompany->set( $this->data );
        if( $this->User->validates()  && $this->UserAddress->validates() && $this->UserCompany->validates()){
          $this->Session->write( 'user_register', $this->data );
          $this->redirect( "register_confirmation" );
        }
      }
    }


    /**
     * USER REGISTER CONFIRMATION VIEW
     * @return [type] [description]
     */
    function register_confirmation(){
      $this->layout = "default_new";
      $user = $this->Session->read( 'user_register' );
      if( $user ) {
          $user['User']['married_status'] = $this->MarriedStatus->getNameById($user['User']['married_status_id']);
          $user['UserCompany']['work'] = $this->Work->getNameById($user['UserCompany']['work_id']);
          $user['UserAddress']['pref'] = $this->Pref->getNameById($user['UserAddress']['pref_id']);
          $user['User']['access_token'] = md5(rand(0,100));
          $this->set('user', $user);
          if($this->data){
             if ($this->UserCompany->save( $user , false ) && $this->UserAddress->save( $user , false )){
                $user['User']['user_address_id'] = $this->UserAddress->getLastInsertId();
                $user['User']['user_company_id'] = $this->UserCompany->getLastInsertId();
                if( $this->User->save( $user, false ) ){
                  $user_id = $this->User->getLastInsertId();
                  foreach ($user['ExpectArea'] as $item) {
                    $item['user_id'] = $user_id;
                    $this->ExpectArea->create();
                    $this->ExpectArea->save($item, false);
                  }

                  $user = $this->User->read(null, $user_id);
                  $user['UserCompany']['work'] = $this->Work->getNameById($user['UserCompany']['work_id']);
                  $user['UserAddress']['pref'] = $this->Pref->getNameById($user['UserAddress']['pref_id']);

                  /**
                   * SEND EMAIL TO CUSTOMER
                   * @var CakeEmail
                   */
                  $Email = new CakeEmail("gmail");
                  $Email->template('user_register_success');
                  $Email->emailFormat('html');
                  $Email->to($user['User']['email']);
                  $Email->from('moos@nal.vn');
                  $Email->subject("【家賃でもらえる家】無料会員登録");
                  $Email->viewVars(array('user' => $user));
                  $Email->send();

                  /**
                   * SEND EMAIL TO ADMIN
                   * @var CakeEmail
                   */
                  $Email = new CakeEmail("gmail");
                  $Email->template('admin_register_success');
                  $Email->emailFormat('html');
                  $Email->to('thanhvunguyenbkdn@gmail.com');
                  $Email->from('moos@nal.vn');
                  $Email->subject("【MOOS】会員登録通知");
                  $Email->viewVars(array('user' => $user));
                  $Email->send();

                  $this->redirect( "register_successful" );
                } else {
                  $this->UserAddress->delete($this->UserAddress->getLastInsertId());
                  $this->UserCompany->delete($this->UserCompany->getLastInsertId());
                  $this->redirect( "register" );
                }
            } else {
              $this->data = $user;
              $this->redirect( "register" );
            }
          } else {
            $married_statuses = $this->MarriedStatus->find( 'list' );
            $this->set( 'married_statuses', $married_statuses);
            $works = $this->Work->find( 'list' );
            $this->set( 'works', $works);
            $prefs = $this->Pref->find('list');
            $this->set('prefs', $prefs);
            $this->data = $user;
          }
      }
      else {}
    }


    /**
     * USER REGISTER SUCCESSFUL VIEW
     * @return response
     */
    function register_successful(){
      $this->layout = "default_new";
      $this->Session->delete('user_register');
    }


    /**
     * USER MYPAGE INFORMATION
     * @return response
     */
    function my_page(){
      //$this->layout=null;
      $id = $this->s_user_id;
      if($id){
        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 
          'UserGuarantor', 'OtherGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
        //print_r($user['OtherGuarantor']); die;
        $this->data = $user;
        $validations = $this->_validate($user);
        $this->set('validations', $validations);
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
    else {
      $this->redirect('login');
    }
  }


    /**
     * USER UPDATE BASIC INFORMATION
     * @return response
     */
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
     
        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 
          'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
        
        
         if($user['User']['status_id'] == "2"){
            if($this->data['User']){              
              //update user info
              $user_info = $this->data;
              if($this->User->save($user_info['User'], false) && $this->UserAddress->save($user_info['UserAddress'], false) && $this->UserCompany->save($user_info['UserCompany'], false)){
                //print_r($user_info);die;
                foreach ($user_info['ExpectArea'] as $item) {

                  $item['user_id'] = $id;
                  //if($item['post_num_1'] && $item['post_num_2'] && $item['pref_id'] && $item['city']){
                    $this->ExpectArea->create();
                    $this->ExpectArea->save($item, false);
                  //}
                }
                //reload data
                $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 
                  'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
                $this->set('user', $user);
                $this->data = $user;
                $this->Session->setFlash('Basic Account Information has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
              }
                    
             
              
            }
            else {
              $this->set('user', $user);
              
              $this->data = $user;
            }
            $this->render('ajax_update_basic_info');
        }
         
      }

    }

    
    /**
     * USER EDIT REGISTER INFORMATION
     * @return response
     */
    function edit_register_info(){
      $id = $this->s_user_id;
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' )));
      $this->set('user', $user);
      if($user['User']['status_id'] == "2"){
        
        //echo 111; die;  
        // $this->data['UserCompany'] = $user['UserCompany'][0];
        //print_r($this->data); die;

        if($this->data){

           $this->User->set( $this->data );
           $this->UserAddress->set( $this->data );
           $this->UserCompany->set( $this->data );

           if( $this->User->validates()  && $this->UserAddress->validates() && $this->UserCompany->validates()){
            if($this->User->save($this->data['User'], false) && $this->UserAddress->save($this->data['UserAddress'], false) && $this->UserCompany->save($this->data['UserCompany'], false)){
              $this->Session->setFlash('Your Account Information has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
              $this->redirect( "my_page" );
            }
          }
        } else {
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
        'OtherGuarantor'=>array(
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
     if($partner && $user['User']['married_status_id'] == 1){
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
    if($user['User']['live_with_family']){
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
        $result['UserGuarantor']['UserGuarantorContact']['error'] = 1;
        foreach ($user_guarantor_contact_fields as $key => $value) {
           array_push($result['UserGuarantor']['UserGuarantorContact']['fields'], $value);
        }
      }

      if($user['User']['need_more_guarantor']){
        $other_guarantor = $this->UserGuarantor->find('first',array( 'conditions'=>array( 'UserGuarantor.id'=> $user['User']['other_guarantor_id'])));
       
        if($other_guarantor){
          $this->UserGuarantor->set($other_guarantor);
          if(!$this->UserGuarantor->validates()){
            //print_r($this->UserPartner->invalidFields()); die;
            $result['error'] = 1;
            

            $result['OtherGuarantor']['UserGuarantorInfo']['fields'] = array();
            $result['OtherGuarantor']['UserGuarantorAddress']['fields'] = array();
            $result['OtherGuarantor']['UserGuarantorContact']['fields'] = array();
            $result['OtherGuarantor']['UserGuarantorCompany']['fields'] = array();
            foreach ($this->UserGuarantor->invalidFields() as $key => $value) {
             
              if (array_key_exists($key, $user_guarantor_info_fields)){
                array_push($result['OtherGuarantor']['UserGuarantorInfo']['fields'], $user_guarantor_info_fields[$key]);
                $result['OtherGuarantor']['UserGuarantorInfo']['error'] = 1;
              }
              else if(array_key_exists($key, $user_guarantor_company_fields)){
                   array_push($result['OtherGuarantor']['UserGuarantorCompany']['fields'], $user_guarantor_company_fields[$key]);
                $result['OtherGuarantor']['UserGuarantorCompany']['error'] = 1;
              }

              else if(array_key_exists($key, $user_guarantor_address_fields)){
                 array_push($result['OtherGuarantor']['UserGuarantorAddress']['fields'], $user_guarantor_address_fields[$key]);
                $result['OtherGuarantor']['UserGuarantorAddress']['error'] = 1;
              }
              else if(array_key_exists($key, $user_guarantor_contact_fields)){
                array_push($result['OtherGuarantor']['UserGuarantorContact']['fields'], $user_guarantor_contact_fields[$key]);
                $result['OtherGuarantor']['UserGuarantorContact']['error'] = 1;
              }
              
            }
          }
        }
        else {
          $result['error'] = 1;
          $result['OtherGuarantor']['UserGuarantorInfo']['error'] = 1;
          foreach ($user_guarantor_info_fields as $key => $value) {
             array_push($result['OtherGuarantor']['UserGuarantorInfo']['fields'], $value);
          }
          $result['OtherGuarantor']['UserGuarantorCompany']['error'] = 1;
          foreach ($user_guarantor_company_fields as $key => $value) {
             array_push($result['OtherGuarantor']['UserGuarantorCompany']['fields'], $value);
          }
          $result['OtherGuarantor']['UserGuarantorAddress']['error'] = 1;
          foreach ($user_guarantor_address_fields as $key => $value) {
             array_push($result['OtherGuarantor']['UserGuarantorAddress']['fields'], $value);
          }
          $result['OtherGuarantor']['UserGuarantorContact']['error'] = 1;
          foreach ($user_guarantor_contact_fields as $key => $value) {
             array_push($result['OtherGuarantor']['UserGuarantorContact']['fields'], $value);
          }
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
        //validate before save
        $validations = $this->_validate($user);
        if(!$validations['error']){
          $user['User']['status_id'] = 3;
          $user['User']['updated_date'] = DboSource::expression('NOW()');
          if($this->User->save($user, false)){
            //send mail
            $Email = new CakeEmail('gmail');
            $Email->template('update_account');
            $Email->emailFormat('html');
            $Email->to($user['User']['email']);
            $Email->from('moos@nal.vn');
            $Email->subject(__('admin.email.update_account.title'));
            $Email->viewVars(array('user' => $user));
            $Email->send();

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
