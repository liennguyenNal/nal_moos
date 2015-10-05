<?php
class LoginComponent extends Object 
{
	var $components = array('Session');
	
	var $controller = true;
	
	var $session;
	
	
	
	/**
	 * Startup - Link the component to the controller.
	 *
	 * @param controller
	 */
    function startup( $controller )
    {
    		
    	$this->initialize( $controller, array() );
    }
    
    /**
     * Init session.
     *
     */
    function initialize(&$controller, $settings=array())
    {
    	$this->controller = &$controller; 
        //echo 1111; die;
        $this->session = $this->controller->Session->read('User');
    	
        if($this->session['User']['id'])
        {
                
                $this->controller->isAdmin = 0;
                $this->controller->s_user_id = $this->session['User']['id'];           
                $this->controller->s_email = $this->session['User']['email'] ;
                $this->controller->s_first_name =  $this->session['User']['first_name'] ;
                $this->controller->s_last_name =  $this->session['User']['last_name'] ;
                //print_r($this->session['User']); die;
        }
        else {
            $this->session = $this->controller->Session->read('Administrator');
        
            if($this->session['Administrator'])
            {
                $this->controller->s_admin_id = $this->session['Administrator']['id'];           
                $this->controller->s_email = $this->session['Administrator']['email'] ;
                $this->controller->s_first_name =  $this->session['Administrator']['first_name'] ;
                $this->controller->s_last_name =  $this->session['Administrator']['last_name'] ;
                $this->controller->s_username = $this->session['Administrator']['username'] ;
                $this->controller->isAdmin = 1;
            }
        }
    }
        
    /**
     * Customer Login
     *
     * @param text $username
     * @param text $password
     */
    function login($email, $password)
    {
       if($email && $password){
            $user = $this->controller->User->find('first', array ( 
                'fields'=>array ( 'id', 'email', 'first_name',  'last_name', 'first_name_kana', 'last_name_kana', 'status_id' ),
                'conditions'=>array( "User.email" => $email, "User.password" => md5($password), 'User.is_deleted'=>0 ) ) );
        
        	if($user)
        	{
        		//print_r($user); die;
        		$this->session = $user;
        		
        		$this->controller->Session->write('User', $this->session);    		
        		
        		//echo $user['User']['status_id']; die; 
        		if ($user['User']['status_id'] >= 2){
                   //  $is_first_login = false;
                   //  if(!$user['User']['last_login_time'])$is_first_login = true;
                   // //update last login IP & time
                   //  $this->controller->User->query("update users set last_login_time=now(), last_login_ip='". $_SERVER['REMOTE_ADDR'] . "' where id='" . $user['User']['id'] . "'");
                   //  if($is_first_login) 
                   //      $this->controller->redirect('/users/create_password');
                   //  else 
                        $this->controller->redirect('/users/my_page');
                }
        		else {
                    $this->controller->set('login_error_msg', 'This account is reject by admin');
                       
                }
        	}
        	else 
        	{
        		$this->controller->set('username', $username);
                $this->controller->set('login_error_msg', 'Incorrect username or password. Please try again!');
        	}
        }
        else {
            $this->controller->set('login_error_msg', 'Please enter username and password');
        }
    }

    /**
     * Customer Login
     *
     * @param text $username
     * @param text $password
     */
    function admin_login($username, $password)
    {
        //echo $password; die;
        $user = $this->controller->Administrator->find('first', array ( 
            'fields'=>array ( 'id', 'email', 'first_name',  'last_name', 'first_name_kana', 'last_name_kana' ),
            'conditions'=>array( "Administrator.username" => $username, "Administrator.password" => md5($password))));
        //echo $password; die;
        if($user)
        {
            
            $this->session = $user;
            
            $this->controller->Session->write('Administrator', $this->session);

            //update last login
            //$this->controller->User->query("update users set last_login_date=now(), last_login_ip='". $_SERVER['REMOTE_ADDR'] . "' where id='" . $user[0]['User']['id'] . "'");
            if ($user){
               
                $this->controller->redirect('/admin/users/');
               
            }
            else {                    
                   $this->controller->set('login_error_msg', 'Incorrect username or password. Please try again!');
            }
        }
        else 
        {
            $this->controller->set('username', $username);
            $this->controller->set('login_error_msg', 'Incorrect username or password. Please try again!');
        }
    }
    function logout()
    {
    	$this->controller->Session->delete('User');
    	$this->controller->redirect('/users/login');
    }
    
    function beforeRedirect($controller, $url, $status=null, $exit=true){
        
    }
    
    function beforeRender($controller){
        
    }


    function shutdown($controller){
        
    }
}
?>