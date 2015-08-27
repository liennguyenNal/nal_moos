<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class UsersController extends AppController{
    var $uses = array('User', 'Administrator');
    var $components = array('Login', 'Util', 'Session');
    var $helpers = array('Html');
     
        
    function admin_index(){
        $users = $this->User->find('all');
        $this->set('users', $users);
    }
    
    function admin_edit($id=null){
        
       $roles = $this->Role->find('list');
       $this->set('roles', $roles);
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
               
               
               //print_r($user);die;
               if($this->User->save($user, false)){
                   $this->redirect("index");
               }
           }
           else {
              // echo 1111; die;
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
    
    function admin_login(){
        $this->layout = null;
        
        if($this->data){
            //print_r($this->data); die;
            $username = $this->data['User']['username'];
            $password = $this->data['User']['password'];
            $this->Login->admin_login($username, $password);
        }
        else {
           
        }
        
        //die;
    }
    
    function admin_logout(){
        $this->Session->delete("User");
        $this->redirect("/admin/users/login");
    }
    function login(){
      $this->layout = null;
       // echo $this->layout; die;
       
        if($this->data){
            //print_r($this->data); die;
            $username = $this->data['User']['email'];
            $password = $this->data['User']['password'];
            $this->Login->login($username, $password);
        }
    }
    
    
    function logout(){
        $this->Login->logout();
    }
    
    function profile(){

      $user = $this->Session->read('User');
      //print_r($user);die;
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
                  $this->Session->setFlash('Change Password successful!','default', array('class' => 'error'));
                  $this->redirect('profile');
                }
                else {
                  $this->Session->setFlash("Cannot change your password", 'default',array('class' => 'error'));
                }
              }
              else {
                  $this->Session->setFlash("Password Confirmation is not match", 'default',array('class' => 'error'));
                }
            }
            else {
              $this->Session->setFlash("Length of password is too short (6 - 30 charracters)", 'default',
                array('class' => 'error'));
            }

          }
          else {
             $this->Session->setFlash("Old Password is not match", 'default',
                array('class' => 'error'));
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
          
        }

      }
    }
}
?>
