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
                $this->controller->user_id = $this->session['User']['id'];           
                $this->controller->s_email = $this->session['User']['email'] ;
                $this->controller->s_first_name =  $this->session['User']['first_name'] ;
                $this->controller->s_last_name =  $this->session['User']['last_name'] ;
                //print_r($this->session['User']); die;
        }
        else {
            $this->session = $this->controller->Session->read('Administrator');
        
            if($this->session['Administrator'])
            {
                //echo 121212;die;    
                $this->controller->user_id = $this->session['Administrator']['id'];           
                $this->controller->s_email = $this->session['Administrator']['email'] ;
                $this->controller->s_first_name =  $this->session['Administrator']['first_name'] ;
                $this->controller->s_last_name =  $this->session['Administrator']['last_name'] ;
                $this->controller->s_username = $this->session['Administrator']['username'] ;
                $this->controller->isAdmin = 1;
                //print_r($this->session['User']); die;
            }
        }
    }
        
    /**
     * Customer Login
     *
     * @param text $username
     * @param text $password
     */
    function login($username, $password)
    {
    	//echo $password; die;
        $user = $this->controller->User->find('first', array ( 
            'fields'=>array ( 'id', 'email', 'first_name',  'last_name', 'first_name_kana', 'last_name_kana' ),
            'conditions'=>array( "User.email" => $username)));
    	//print_r($user);die;
    	if($user)
    	{
    		
    		$this->session = $user;
    		
    		$this->controller->Session->write('User', $this->session);
    		
    		//update last login
    		//$this->controller->User->query("update users set last_login_date=now(), last_login_ip='". $_SERVER['REMOTE_ADDR'] . "' where id='" . $user[0]['User']['id'] . "'");
    		if ($user){
               
                $this->controller->redirect('/users/profile');
            }
    		else {
                    
                   
            }
    	}
    	else 
    	{
    		$this->controller->set('email', $username);
            $this->controller->set('login_error_msg', 'Incorrect username or password. Please try again!');
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
        //echo $username; die;
        if($user)
        {
            
            $this->session = $user;
            
            $this->controller->Session->write('Administrator', $this->session);
            //print_r($this->session); die;
            
            //update last login
            //$this->controller->User->query("update users set last_login_date=now(), last_login_ip='". $_SERVER['REMOTE_ADDR'] . "' where id='" . $user[0]['User']['id'] . "'");
            if ($user){
               //echo "/admin/users/profile";die;
                $this->controller->redirect('/admin/users/profile');
                $this->controller->set('login_error_msg', 'Incorrect username or password. Please try again!');
            }
            else {                    
                  // echo 2232323; die;
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