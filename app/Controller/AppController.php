<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

App::uses('CakeEmail', 'Network/Email');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package     app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    var $is_admin = 0;
    var $s_user_id = "";
    var $s_username = "";
    var $s_first_name = "";
    var $s_last_name = "";
    var $s_email = "";
    var $uses = array('User', 'Administrator');
    var $components = array('Login', 'Session', 'Upload', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Session', 'Js' => array('Jquery'));
    public function beforeFilter(){
        parent::beforeFilter();
        //Configure::write('Config.language', 'jpa');
        
        Configure::write('Config.language', 'ja');

        if(isset($this->params['prefix']))
        {
              
                $prefix = $this->params['prefix'];
                if($prefix=='admin')
                {
                    if (!isset($_SERVER['HTTPS'])) {
                            $this->forceSSL();
                    }

                        $this->layout = "/admin/default";
                        $user = $this->Session->read('Administrator');
                        //print_r($user);die;
                        if($user){
                             $this->set('s_admin_id', $this->userid);
                            $this->set('s_username', $this->s_username);
                            
                            $this->set('s_email',  $this->s_email);
                           
                            $this->set('s_first_name', $this->s_first_name);
                            $this->set('s_last_name', $this->s_last_name);
                            $this->set('is_admin', 1);
                          
                        }
                        else {
                           if($this->action != "admin_login")
                               $this->redirect("/admin/users/login");
                           else {
                              
                           }
                        }
                        
                    $this->set('menu', '');
                }
                else {
                     //$this->layout = "/default";
                }
        }
        else {
            $user = $this->Session->read('User');
            

            if($user){
                if (!isset($_SERVER['HTTPS'])) {
                        $this->forceSSL();
                }

                $this->layout = 'user';
                $this->set('s_user_id', $this->s_user_id);
                $this->set('s_first_name', $this->s_first_name);
                $this->set('s_last_name', $this->s_last_name);
                
                if(!$this->request->is('ajax')){
                    
                    if($this->action != "my_page"){
                        if($this->action == "login" || $this->action == "register"  || $this->action == "register_confirmation"){
                            $this->redirect("/users/my_page");
                        }
                    }
                }

            }
            else {
                //echo $_SERVER['HTTPS']; die;
                
                if($this->action == "login" || $this->action == "register"  || $this->action == "register_confirmation" || $this->action == "register_confirmation"){
                    if(!isset($_SERVER['HTTPS'])){
                        
                              $this->forceSSL();
                        
                    }
                }
                else {
                    if(isset($_SERVER['HTTPS'])){
                        if(!$this->request->is('ajax'))
                            $this->unforceSSL();
                    }
                }
                $this->layout = 'default_new';
            }
        }
        
    }
    
     function uploadImage($file, $path, $width =null, $height=null, &$errors)
    {

            $destination = realpath($path);
            $image = null;
            if(!empty($file['name']))
            {
                if($width)    
                $this->Upload->upload($file, $destination . '/', null, array('type' => 'resizemin', 'size' => array($width, $height), 'output' => 'jpg'));
                else $this->Upload->upload($file, $destination . '/', null, array('type' => 'resizemin', 'output' => 'jpg'));
                    if(!$this->Upload->errors)
                    {
                            $image = $this->Upload->result; 
                    }
            }

            $errors = $this->Upload->errors;

            return $image;
    }
    
    function uploadFile($file, $path, &$errors){
        $destination = realpath($path);
        $filename = null;
        if(!empty($file['name']))
        {
            $this->Upload->upload($file, $destination . '/');
            if(!$this->Upload->errors)$filename = $this->Upload->result;
        }
        $errors = $this->Upload->errors;
        return $filename;
    }
    
    function adminErrorMsg($msg = 'Error ocurred.')
    {
            $this->Session->setFlash($msg, 'default',
                array('class' => 'alert alert-error'));
            //$this->Session->write('Message.type', 'error-msg');
    }

    function adminSuccessMsg($msg = 'Information saved.')
    {
            $this->Session->setFlash($msg, 'default',
                array('class' => 'alert alert-success'));
            //$this->Session->write('Message.type', 'success-msg');
    }
    function adminWarningMsg($msg = 'Warning!')
    {
            $this->Session->setFlash($msg, 'default',
                array('class' => 'alert alert-info'));
            
    }

    
    function _send_mail($from, $to, $subject, $content){

      $Email = new CakeEmail();
      $Email->from(array($from => 'MOOS Site'));
      $Email->to($to);
      $Email->subject($subject);
      $Email->send($content);
    }

    function beforeRender() {
        if($this->name == 'CakeError') {
            //echo 1111; die;
            $this->layout = null;
        }
    }

    function forceSSL() {
        $this->redirect('https://' . $_SERVER['SERVER_NAME'] . $this->here);
    }
    function unforceSSL() {
        $this->redirect('http://' . $_SERVER['SERVER_NAME'] . $this->here);
    }
}