<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class UsersController extends AppController{
    var $uses = array('User', 'Administrator',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress', 'Work' , 'MarriedStatus', 'Residence', 'Career', 'Insurance', 'AttachmentType', 'UserAttachment');
    var $components = array('Login', 'Util', 'Session', 'RequestHandler');
    var $helpers = array('Html' , 'Js');
     
    /**
     * ADMIN VIEW FUNCTION
     * @return response
     */
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
        $users = $this->paginate('User');
        $this->set('users', $users);
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
          $this->User->delete($id);
          $this->redirect('index');
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


    /**
     * ADMIN APPROVE USER REGISTRATION
     * @param  $user['id']
     * @return response
     */
    function admin_approve_register($id){
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus' ,  'ExpectArea')));
      if ($user['User']['status_id'] == 1) {
        $user['User']['status_id'] == 2;
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
          echo "User has been approved successfully";
          $this->redirect('view/'.$id);
        } else {
          echo "Cannot approved this user";
          $this->redirect('view/'.$id);
        }
      } else {
          echo "Cannot approved this user";
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
      $id = $this->s_user_id;
      if($id){
      $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
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

      if($this->data){

      }
      } else $this->redirect('login');
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

        $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea')));
        $this->set('user', $user);
        if($user){

            if( $this->User->validates()  && $this->UserAddress->validates() && $this->UserCompany->validates()){
            
            if($this->User->save($this->data['User'], false) && $this->UserAddress->save($this->data['UserAddress'], false) && $this->UserCompany->save($this->data['UserCompany'], false)){
              foreach ($this->data['ExpectArea'] as $item) {

                $item['user_id'] = $id;
                if($item['post_num_1'] && $item['post_num_2'] && $item['pref_id'] && $item['city']){
                  $this->ExpectArea->create();
                  $this->ExpectArea->save($item, false);
                }
              }
              
              $user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea')));
              $this->set('user', $user);

              $this->Session->setFlash('Basic Account Information has been changed successful!','default', array('class' => 'alert alert-dismissible alert-success'));
              $this->render('ajax_update_basic_info');
            }
          }
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
      if($user){
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
}
?>
