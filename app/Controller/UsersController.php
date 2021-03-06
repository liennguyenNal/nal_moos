<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class UsersController extends AppController{
		var $uses = array('User', 'Administrator',  'Pref' ,'ExpectArea', 'UserCompany', 'UserAddress', 'Work' , 
			'MarriedStatus', 'Residence', 'Career', 'Insurance', 'AttachmentType', 'UserAttachment', 'UserPartner', 'UserGuarantor', 'UserRelation', 
			'WorkRequired', 'GuarantorWorkRequired', 'Status');
		var $components = array('Login', 'Util', 'Session', 'RequestHandler');
		//var $helpers = array('Html' , 'Js');
		 
		/**
		 * ADMIN VIEW FUNCTION
		 * @return response
		 */
		var $helpers = array('Html', 'Form','Csv'); 
		public function beforeFilter(){
				parent::beforeFilter();
				if(substr($this->here, -15)=='change_password' || substr($this->here, -7)=='profile'){
					$this->set('menu' , 'user1');
				}
				else{
					$this->set('menu' , 'user');
				}
				//$this->set('menu' , 'user');
		}

		
		function admin_download()
		{
				 
			 $criteria = " User.is_deleted =0 ";
			 if(isset($this->params['named']['status'])){
				$status_id = $this->params['named']['status'];
				$criteria .= " AND User.status_id = '$status_id'" ;
				
			}
			if($this->params['named']['city']){
				$city = $this->params['named']['city'];
				 $criteria .= " AND UserAddress.city = '$city'" ;
				
				
			}
			if($this->params['named']['pref']){
				$pref = $this->params['named']['pref'];
				 $criteria .= " AND UserAddress.pref_id = '$pref'" ;
				
				
			}
			
			 if($this->params['named']['from_register']){
				$from_register = $this->params['named']['from_register'];
				$criteria .= " AND User.created > '$from_register'" ;
				
			}
			 if($this->params['named']['to_register']){
				$to_register = $this->params['named']['to_register'];
				$criteria .= " AND User.created < '$to_register'" ;
				
			}
		 
			if($this->params['named']['from_approve']){
				$from_approve = $this->params['named']['from_approve'];
				$criteria .= " AND User.approved_date > '$from_approve'" ;
				
			}
			if($this->params['named']['to_approve']){
				$to_approve = $this->params['named']['to_approve'];
				$criteria .= " AND User.approved_date > '$to_approve'" ;
				
			}
			$users = $this->User->find('all', 
				array('conditions'=>array($criteria), 
					'contain' => array('ExpectArea', 'UserCompany', 'UserAddress', 'UserCompany.Work','OtherGuarantor.Work','UserGuarantor.Work','UserPartner.Work', 'OtherGuarantor.MarriedStatus','UserGuarantor.MarriedStatus','UserPartner.CompanyPref',
			'MarriedStatus',  'UserAttachment', 'UserPartner', 'UserGuarantor', 'UserRelation', 'UserCompany.Career','OtherGuarantor.Career','UserGuarantor.Career','UserPartner.Career',
			'Status', 'UserCompany.Work','UserAddress.Pref','UserCompany.Pref', 'ExpectArea.Pref', 'UserGuarantor.Pref','UserGuarantor.Residence','UserGuarantor.Insurance','OtherGuarantor.Residence','OtherGuarantor.Insurance', 'OtherGuarantor', 'OtherGuarantor.Pref', 'UserGuarantor.CompanyPref', 'UserAddress.Residence', 'UserCompany.Insurance')
					// 'recursive' => 3,
					//'fields'=>array('User.first_name', 'User.last_name', 'User.first_name_kana', 'User.last_name_kana', 'User.year_of_birth', 'User.month_of_birth', 'User.day_of_birth','UserCompany.Work.name' , 'UserCompany.salary_month', 'UserAddress.Pref.name', 'UserAddress.Pref.city')
					));
			
				$this->set('users', $users);
				
				$this->layout = null;
			 $this->autoLayout = false;
			Configure::write('debug', 0);

		}
		function admin_index(){
		 
			$statuses = $this->Status->find('list');
			$this->set('statuses', $statuses);
			$prefs = $this->Pref->find('list');
			$this->set('prefs', $prefs);
			$criteria = " User.is_deleted != 1 ";
			 if(isset($this->params['named']['status'])){
				$status_id = $this->params['named']['status'];
				$criteria .= " AND User.status_id = '$status_id'" ;
				$this->set('status', $status_id);
			}
			if($this->params['named']['city']){
				$city = $this->params['named']['city'];
				 $criteria .= " AND UserAddress.city LIKE '%$city%'" ;
				
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
				$this->set('from_register', $from_register);
			}
			 if($this->params['named']['to_register']){
				$to_register = $this->params['named']['to_register'];
				$criteria .= " AND User.created < '$to_register'" ;
				$this->set('to_register', $to_register);
			}
		 
			if($this->params['named']['from_approve']){
				$from_approve = $this->params['named']['from_approve'];
				$criteria .= " AND User.approved_date > '$from_approve'" ;
				$this->set('from_approve', $from_approve);
			}
			if($this->params['named']['to_approve']){
				$to_approve = $this->params['named']['to_approve'];
				$criteria .= " AND User.approved_date > '$to_approve'" ;
				$this->set('to_approve', $to_approve);
			}
			
				$this->paginate = array(
						'conditions' => $criteria,
						'contain' => array('UserCompany', 'UserCompany.Work',  'UserAddress', 'Status', 'UserAddress.Pref'),
						'limit' => 20,
						'recursive' => 3,
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
					//$user = $this->User->delete($id);
					$user['User']['is_deleted'] = 1;
					if($this->User->save($user, false)){
						 $this->Session->setFlash(__("admin.user.delete.successful"),'default', array('class' => 'alert alert-dismissible alert-success'));
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
									$this->Session->setFlash('パスワード変更は完了しました。','default', array('class' => 'alert alert-dismissible alert-success'));
									
								}
								else {
									$this->Session->setFlash("パスワード変更はできませんでした。", 'default',array('class' => 'alert alert-dismissible alert-info"'));
								}
							}
							else {
									$this->Session->setFlash("パスワードが異なります。", 'default',array('class' => 'alert alert-dismissible alert-info"'));
								}
						}
						else {
							$this->Session->setFlash("パスワードが短すぎます。（3～6文字)", 'default',
								array('class' => 'alert alert-dismissible alert-info"'));
						}

					}
					else {
						 $this->Session->setFlash("現在のパスワードが異なります。", 'default',
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
		 
			if($id){
				$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 
					'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'OtherGuarantor','UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
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

				if($user['User']['status_id'] != 1 && $user['User']['status_id'] != -1) {
					$this->data = $user;
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

				$password = $this->Util->createRandomPassword(10);
				$access_token  = $this->Util->createRandomPassword(30);
				$user['User']['access_token'] = $access_token;
				
				if ($this->User->save($user, false)) {
					/**
					 * SEND MAIL TO CUSTOMER
					 * @var CakeEmail
					 */
					// $Email = new CakeEmail('gmail');
					// $Email->template('user_approve_success');
					// $Email->emailFormat('html');
					// $Email->to($user['User']['email']);
					// $Email->from(FROM_EMAIL);
					// $Email->subject('【家賃でもらえる家】会員登録の内容確認完了');
					// $Email->viewVars(array('user' => $user));
					// $Email->send();
					$this->sendEmailToUser($user['User']['email'], 'approve_register_user', __('admin.email.approve_register_user.title'), array('user' => $user)); 
					
					$this->Session->setFlash(__("admin.user.approve_register.successful"), 'default',array('class' => 'alert alert-dismissible alert-success"'));
					$this->redirect('view/'.$id);
				} else {
					 $this->Session->setFlash(__("admin.user.approve_register.failed"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
					$this->redirect('view/'.$id);
				}
			} else {
					 $this->Session->setFlash(__("admin.user.not_exist"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
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
			$user['User']['status_id'] = -1;
			if($this->User->save($user, false)){
				/**
				 * EMAIL REJECT USER REGISTRATION
				 */
				// $Email = new CakeEmail('gmail');
				// $Email->template('user_approve_reject');
				// $Email->emailFormat('html');
				// $Email->to($user['User']['email']);
				// $Email->from(FROM_EMAIL);
				// $Email->subject('【家賃でもらえる家】会員登録の却下');
				// $Email->viewVars(array('user' => $user));
				// $Email->send();

				$this->sendEmailToUser($user['User']['email'], 'reject_register_user', __('admin.email.reject_register_user.title'), array('user' => $user));

				//echo "Reject successfully";
				 $this->Session->setFlash(__("admin.user.reject.successful"), 'default',array('class' => 'alert alert-dismissible alert-success"'));
				$this->redirect('view/'. $id);
			}
			else {
				$this->Session->setFlash(__("admin.user.reject.failed"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
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
				$this->Session->setFlash(__("admin.user.delete_users.successful"), 'default',array('class' => 'alert alert-dismissible alert-success"'));
				$this->redirect('index');
			}
			else {
				$this->Session->setFlash(__("admin.user.delete_users.failed"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
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
					// $Email = new CakeEmail('gmail');
					// $Email->template('approve_user');
					// $Email->emailFormat('html');
					// $Email->to($user['User']['email']);
					// $Email->from(FROM_EMAIL);
					// $Email->subject(__('admin.email.approve_user.title'));
					// $Email->viewVars(array('user' => $user));
					// $Email->send();
				
					$this->sendEmailToUser($user['User']['email'], 'approve_user', __('admin.email.approve_user.title'), array('user' => $user));

					$this->Session->setFlash(__("admin.user.approve.successful"), 'default',array('class' => 'alert alert-dismissible alert-success"'));
					$this->redirect('view/'. $user_id);
				}
				else {
					$this->Session->setFlash(__("admin.user.approve.failed"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
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
						// $Email = new CakeEmail('gmail');
						// $Email->template('reject_user');
						// $Email->emailFormat('html');
						// $Email->to($user['User']['email']);
						// $Email->from(FROM_EMAIL);
						// $Email->subject(__('admin.email.reject_user.title'));
						// $Email->viewVars(array('user' => $user));
						// $Email->send();
						
						$this->sendEmailToUser($user['User']['email'], 'reject_user', __('admin.email.reject_user.title'), array('user' => $user));
						
						$this->Session->setFlash(__("admin.user.reject.successful"), 'default',array('class' => 'alert alert-dismissible alert-success"'));
						$this->redirect('view/'. $user_id);
					}
					else {

						 $this->Session->setFlash(__("admin.user.reject.failed"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
						 $this->redirect('view/'. $user_id);
					}
			}
			else {
				$this->redirect("users/". $user_id);
			}
		}
		function admin_return($user_id){

			$user = $this->User->read(null, $user_id);
			//print_r($this->data); die;
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
						// $Email = new CakeEmail('gmail');
						// $Email->template('return_user');
						// $Email->emailFormat('html');
						// $Email->to($user['User']['email']);
						// $Email->from(FROM_EMAIL);
						// $Email->subject(__('admin.email.return_user.title'));
						// $Email->viewVars(array('user' => $user, 'requireds'=>$requireds, 'comment'=>$comment));
						// $Email->send();
						 $this->sendEmailToUser($user['User']['email'], 'return_user', __('admin.email.return_user.title'), array('user' => $user, 'requireds'=>$requireds, 'comment'=>$comment));

						$this->Session->setFlash(__("admin.user.return.successful"), 'default',array('class' => 'alert alert-dismissible alert-success"'));
						$this->redirect('view/'. $user_id);
					}
					else {

						 $this->Session->setFlash(__("admin.user.return.failed"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
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
					$this->Session->setFlash(__("admin.user.set_max_payment.successful"), 'default',array('class' => 'alert alert-dismissible alert-success"'));
					$this->redirect('view/'. $user_id);
				}
				else {
					$this->Session->setFlash( __("admin.user.set_max_payment.failed"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
				}
			}
		}
		function admin_process_payment($user_id){
			$user = $this->User->read(null, $user_id);
			if($user['User']['status_id'] == 4){
					$user['User']['status_id'] = 5;
					$user['User']['payment_date'] = DboSource::expression('NOW()');
					if($this->User->save($user, false)){
							/**
						 * EMAIL Aprrove User Step 2
						 */
						// $Email = new CakeEmail('gmail');
						// $Email->template('process_payment_successful');
						// $Email->emailFormat('html');
						// $Email->to($user['User']['email']);
						// $Email->from(FROM_EMAIL);
						// $Email->subject(__('admin.email.process_payment.title'));
						// $Email->viewVars(array('user' => $user));
						// $Email->send();
						$this->sendEmailToUser($user['User']['email'], 'process_payment_successful', __('admin.email.process_payment.title'), array('user' => $user));
						$this->Session->setFlash(__("admin.user.process_payment.successful"), 'default',array('class' => 'alert alert-dismissible alert-success"'));
						$this->redirect('view/'. $user_id);
					}
					else {

						 $this->Session->setFlash(__("admin.user.process_payment.failed"), 'default',array('class' => 'alert alert-dismissible alert-info"'));
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
			$this->layout = "successful";
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
								$this->Session->setFlash(__('user.create_password.fail'), 'default',array('class' => 'alert alert-dismissible alert-info"'));
								
							} 
						} else {
							$this->Session->setFlash(__('user.create_password.password_confirm_not_match'), 'default',array('class' => 'alert alert-dismissible alert-info"'));
							
						}
					} else {
						$this->Session->setFlash(__('user.password.lenght_error'), 'default');
						
					}
				}
			} else {
				if($access_token && $email){
					$user = $this->User->find('first', array('conditions'=>array( 'User.email'=>$email, 'User.access_token'=>$access_token)));
					if ($user) {
						$this->data = $user;
						$this->set('user', $user);
					} else {
						
					}
				} else {
					
				}
			}
		}


		/**
		 * USER VIEW CREATE PASSWORD SUCCESSFUL
		 * @return response
		 */
		function create_password_successful() {
			$this->layout = "successful";
		}
		

		// /**
		//  * USER CHANGE PASSWORD FUNCTION
		//  * @return response
		//  */
		// function change_password(){
		//   $this->layout = "successful";
		//   $user = $this->Session->read('User');
		//   if ( $user ){
		//     $user = $this->User->find('first', array('conditions'=>array('User.id'=>$user['User']['id'])));
		//     $this->set('user', $user);
		//     if($this->data){
		//         if($this->data['User']['password'] && strlen($this->data['User']['password']) >= 6){
		//           if ($this->data['User']['password'] == $this->data['User']['confirm_password']){
		//             $user['User']['password'] = md5($this->data['User']['password']);
		//             if ($this->User->save($user, false) ){
		//               $this->redirect('change_password_successful');
		//             }
		//             else {
		//               $this->Session->setFlash("Cannot change your password", 'default',array('class' => 'alert alert-dismissible alert-info"'));
								 
		//             }
		//           }
		//           else {
		//               $this->Session->setFlash("Password Confirmation is not match", 'default',array('class' => 'alert alert-dismissible alert-info"'));
									
		//             }
		//         }
		//         else {
		//           $this->Session->setFlash("Length of password is too short (6 - 30 charracters)", 'default',
		//             array('class' => 'alert alert-dismissible alert-info'));
							
		//         }
		//       }
		//     }
		//   else {
		//     $this->redirect( 'login' );
		//   }
		// }


		/**
		 * USER EMAIL CHANGE PASSWORD
		 * @return response
		 */
		function email_change_password() {
			//$this->layout = 'default_new';
			$user = $this->Session->read('User');
			if($user){
				$user['User']['access_token'] = sha1($user['User']['id'].microtime());
				if($this->User->save($user, false)){

					// $Email = new CakeEmail("gmail");
					// $Email->template('user_change_password');
					// $Email->emailFormat('html');
					// $Email->to($user['User']['email']);
					// $Email->from(FROM_EMAIL);
					// $Email->subject("【家賃でもらえる家】パスワードの変更");
					// $Email->viewVars(array('user' => $user));
					// $Email->send();
					$this->sendEmailToUser($user['User']['email'], 'user_change_password',  __('user.email.request_change_password.title'), array('user' => $user));
				}
			}
			else {
				$this->redirect( 'login' );
			}
		}

		/**
		 * USER CHANGE PASSWORD SUCCESSFUL
		 * @return response
		 */
		function change_password_successful() {
			$this->layout = "successful";
			$user = $this->Session->read('User');
			$user['User']['access_token'] = null;
			$this->User->save($user, false);
			/**
			 * USER THAY DOI PASSWORD THANH CONG -> GUI EMAIL THANH CONG DEN NGUOI DUNG
			 */
			// $Email = new CakeEmail("gmail");
			// $Email->template('user_change_password_success');
			// $Email->emailFormat('html');
			// $Email->to($user['User']['email']);
			// $Email->from(FROM_EMAIL);
			// $Email->subject("【家賃でもらえる家】パスワードの設定完了");
			// $Email->viewVars(array('user' => $user));
			// $Email->send();

			$this->sendEmailToUser($user['User']['email'], 'user_change_password_success',  __('user.email.change_password.title'), array('user' => $user));
		}

		/**
		 * USER RESET PASSWORD FUNCTION
		 * @return response
		 */
		function reset_password() {
			$this->layout = "successful";
			if($this->data['email']){
				$user = $this->User->find('first', array('conditions'=>array('User.email'=>$this->data['email']), 'contain'=>array('id')));
				if($user) {
					$user['User']['access_token'] =sha1($user['User']['id'].microtime());;
					if ($this->User->save($user, false)) {
						// $Email = new CakeEmail("gmail"); 
						// $Email->template('user_reset_password');
						// $Email->emailFormat('html');
						// $Email->from(FROM_EMAIL);
						// $Email->to($this->data['email']);
						// $Email->subject('【家賃でもらえる家】パスワードの変更');
						// $Email->viewVars(array('user' => $user));
						// $Email->send();

						$this->sendEmailToUser($this->data['email'], 'user_reset_password',  __('user.email.reset_password.title'), array('user' => $user));

						$this->redirect('reset_password_email');
					}
				} else {
					 $this->Session->setFlash(__('global.errors.reset_password.email_unique'), 'default');
				}
			}
		}

		/**
		 * USER SEND EMAIL RESET PASSWORD
		 * @return [type] [description]
		 */
		function reset_password_email() {
			$this->layout = "successful";
		} 

		/**
		 * USER RESET PASSWORD VIEW
		 * @return [type] [description]
		 */
		function reset_link(){
			$this->layout = "successful";
			if ($_POST['token']) {
				$user = $this->User->find('first', array('conditions'=>array('User.access_token'=>$_POST['token']), 'contain'=>array('id')));
				if ($user) {
					if ($_POST['password']) {
						$user['User']['password'] = md5($_POST['password']);
						$user['User']['access_token'] = null;
						if ($this->User->save($user, false)) {

							// Send mail to User
							// $Email = new CakeEmail("gmail");
							// $Email->template('user_change_password_success');
							// $Email->emailFormat('html');
							// $Email->to($user['User']['email']);
							// $Email->from(FROM_EMAIL);
							// $Email->subject("【家賃でもらえる家】パスワードの設定完了");
							// $Email->viewVars(array('user' => $user));
							// $Email->send();
							$this->sendEmailToUser($user['User']['email'],  'user_change_password_success', "【家賃でもらえる家】パスワードの設定完了", array('user'=>$user));
							$this->redirect('reset_password_successful');
						}
					} else {
						//echo "Password ko duoc post";
					}
				}
			}
		}

		/**
		 * USER RESET PASSWORD SUCCESSFUL
		 * @return response
		 */
		function reset_password_successful(){
			$this->layout = "successful";
		}

		

		
		/**
		 * USER REGISTER FUNCTION
		 * @return response
		 */
		function register(){
			$this->layout = "register";
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
				 $this->Session->write( 'user_register', $this->data );
				if( $this->User->validates() ){
					//if($this->UserAddress->validates() && $this->UserCompany->validates())
					
					$this->redirect( "register_confirmation" );
				}
				else {
					$this->set('user', $this->data); 
					$this->Session->setFlash(__('global.errors.reset.email'), 'default');
				}
			}
			else {
				
			}
		}


		/**
		 * USER REGISTER CONFIRMATION VIEW
		 * @return [type] [description]
		 */
		function register_confirmation(){
			$this->layout = "register";
			$user = $this->Session->read( 'user_register' );
			
			if( $user ) {
					$user['User']['married_status'] = $this->MarriedStatus->getNameById($user['User']['married_status_id']);
					$user['UserCompany']['work'] = $this->Work->getNameById($user['UserCompany']['work_id']);
					$user['UserAddress']['pref'] = $this->Pref->getNameById($user['UserAddress']['pref_id']);
			 

					if($this->data){
						 
						 if ($this->UserCompany->save( $user , false ) && $this->UserAddress->save( $user , false )){
								$user['User']['user_address_id'] = $this->UserAddress->getLastInsertId();
								$user['User']['user_company_id'] = $this->UserCompany->getLastInsertId();
								$this->User->set($user);
								
								$email = $this->user['User']['email'];
								$user_email = $this->User->find('first', array('conditions'=>array('User.email'=>$email)));
								if(!$user_email){
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
										$user =  $this->User->find('first', array('conditions'=>array('User.id'=>$user_id), 
											'contain'=>array('Status', 'UserAddress', 'UserCompany', 'UserCompany.Work', 'MarriedStatus', 'UserGuarantor', 'OtherGuarantor',
													'UserPartner', 'ExpectArea', 'ExpectArea.Pref' ,'UserRelation', 'UserAttachment'), 
												'recursive'=>3
											));
										$user['User']['age_of_birth'] = $this->Util->calculateAge($user['User']['year_of_birth'], $user['User']['month_of_birth'], $user['User']['day_of_birth']);
										/**
										 * SEND EMAIL TO CUSTOMER
										 * @var CakeEmail
										 */
										// $Email = new CakeEmail("gmail");
										// $Email->template('user_register_success');
										// $Email->emailFormat('html');
										// $Email->to($user['User']['email']);
										// $Email->from(FROM_EMAIL);
										// $Email->subject("【家賃でもらえる家】無料会員登録");
										// $Email->viewVars(array('user' => $user));
										// $Email->send();
										$this->sendEmailToUser($user['User']['email'],  'user_register_success', __('user.email.register.title'), array('user'=>$user));
										/**
										 * SEND EMAIL TO ADMIN
										 * @var CakeEmail
										 */
										// $Email = new CakeEmail("gmail");
										// $Email->template('admin_register_success');
										// $Email->emailFormat('html');
										// $Email->to(ADMIN_EMAIL);
										// $Email->from(FROM_EMAIL);
										// $Email->subject("【MOOS】会員登録通知");
										// $Email->viewVars(array('user' => $user));
										// $Email->send();
										
										$this->sendEmailToAdmin('admin_register_success', __('user.email.admin_register.title'), array('user'=>$user));

										$this->Session->delete('user_register');
										$this->redirect( "register_successful" );
									} else {
										
										$this->UserCompany->delete($this->UserCompany->getLastInsertId());
										$this->redirect( "register" );
									}
							 }
							 else {
									 $this->data = $user;
										$this->Session->setFlash(__('global.errors.reset.email'));
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
						$this->set('user', $user);
					}
			}
			else {
			 
							$this->redirect( "register" );
			}
		}


		/**
		 * USER REGISTER SUCCESSFUL VIEW
		 * @return response
		 */
		function register_successful(){
			
			$this->layout = "register";
			$this->Session->delete('user_register');
		}


		/**
		 * USER MYPAGE INFORMATION
		 * @return response
		 */
		function my_page(){
			$this->layout="user";
			$id = $this->s_user_id;
			if($id){
				$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 
					'UserGuarantor', 'OtherGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
				
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
								$this->ExpectArea->create();
								$old_areas = $this->ExpectArea->find('all', array('conditions'=>array('ExpectArea.user_id'=>$id)));
								
								$expect_ids = array();
								foreach ($user_info['ExpectArea'] as $item) {

									if($item['id']){
										array_push($expect_ids, $item['id']);
										
									};
								}
							
							 foreach ($old_areas as $area) {
									if(in_array($area['ExpectArea']['id'], $expect_ids)){
										
									}
									else {
										
										$this->ExpectArea->create();
										$this->ExpectArea->delete($area['ExpectArea']['id']);
									}
									
								}
								
								foreach ($user_info['ExpectArea'] as $item) {
									$this->ExpectArea->create();
									 $num_area =  $this->ExpectArea->find('count', array('conditions'=>array('ExpectArea.user_id'=>$id)));
									if($num_area < MAX_NUM_AREA || $item['id']){
										$item['user_id'] = $id;
								
									
										$this->ExpectArea->create();
										$this->ExpectArea->save($item, false);
									
									}
								}
								//reload data
								$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 
									'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
								$this->set('user', $user);
								$this->data = $user;
								$this->Session->setFlash(__('user.register.update_basic_info.successful'),'default', array('class' => 'alert alert-dismissible alert-success'));
							}
							
						 
							
						}
						else {
							$this->set('user', $user);
							
							$this->data = $user;
						}
						$this->render('ajax_update_basic_info');
					}
					else {
						//echo "0";
					}
				}
				else $this->redirect("/users/login");

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
			
				if($this->data){

					 $this->User->set( $this->data );
					 $this->UserAddress->set( $this->data );
					 $this->UserCompany->set( $this->data );

					 if( $this->User->validates()  && $this->UserAddress->validates() && $this->UserCompany->validates()){
						if($this->User->save($this->data['User'], false) && $this->UserAddress->save($this->data['UserAddress'], false) && $this->UserCompany->save($this->data['UserCompany'], false)){
							$this->Session->setFlash(__('global.mypage.update.successful'),'default', array('class' => 'alert alert-dismissible alert-success'));
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
						'UserInfo'=> array('key'=>__('user.dashboard.user.basic_info'), 'error'=>0, 'fields'=>array()),
						'UserAddress'=> array('key'=>__('user.dashboard.user.address'), 'error'=>0, 'fields'=>array()),
						'UserContact'=> array('key'=>__('user.dashboard.user.contact'), 'error'=>0, 'fields'=>array()),
						'UserCompany'=> array('key'=>__('user.dashboard.user.company'), 'error'=>0, 'fields'=>array()),
						'UserDebt'=> array('key'=>__('user.dashboard.user.debt'), 'error'=>0, 'fields'=>array()),
						//'UserResidence'=>array('key'=>__('user.dashboard.user.residence'), 'error'=>0, 'fields'=>array()),
						'ExpectArea'=>array('key'=>__('user.dashboard.user.expect_area'), 'error'=>0, 'fields'=>array())
					),
				'UserPartner'=>array(
						'UserPartnerInfo'=> array('key'=>__('user.partner.user.info'), 'error'=>0, 'fields'=>array()),
						'UserPartnerContact'=> array('key'=>__('user.partner.user.contact'), 'error'=>0, 'fields'=>array()),
						'UserPartnerCompany'=> array('key'=>__('user.partner.user.company'), 'error'=>0, 'fields'=>array()),
						'UserPartnerRelation'=> array('key'=>__('user.dashboard.partner.relationship'), 'error'=>0, 'fields'=>array())
					),
				'UserGuarantor'=>array(
						'UserGuarantorInfo'=> array('key'=>__('user.guarantor.user.info'), 'error'=>0, 'fields'=>array()),
						'UserGuarantorAddress'=> array('key'=>__('user.guarantor.user.address'), 'error'=>0, 'fields'=>array()),
						
						'UserGuarantorContact'=> array('key'=>__('user.guarantor.user.contact'), 'error'=>0, 'fields'=>array()),
						'UserGuarantorCompany'=> array('key'=>__('user.guarantor.user.company'), 'error'=>0, 'fields'=>array())
					),
				'OtherGuarantor'=>array(
						'UserGuarantorInfo'=> array('key'=>__('user.guarantor.user.info'), 'error'=>0, 'fields'=>array()),
						'UserGuarantorAddress'=> array('key'=>__('user.guarantor.user.address'), 'error'=>0, 'fields'=>array()),            
						'UserGuarantorContact'=> array('key'=>__('user.guarantor.user.contact'), 'error'=>0, 'fields'=>array()),
						'UserGuarantorCompany'=> array('key'=>__('user.guarantor.user.company'), 'error'=>0, 'fields'=>array())
					),
				'UserAttachment'=> array('key'=>__('user.attachment.user.file_attachment'), 'error'=>0, 'fields'=>array())
			);
			$this->User->set($user);
			if(!$this->User->validates()){
				$user_info_fields = array('first_name'=>__('user.register.firstname'), 'last_name' =>__('user.register.lastname'), 'first_name_kana'=>__('user.register.firstnamekana'), 'last_name_kana'=>__('user.register.lastnamekana'), 'gender'=>__('user.register.gender'), 'live_with_family' =>__('user.my_page.basic_info.family'));
				
				$user_contact_fields = array('email'=>__('user.register.email'), 'phone'=>__('user.register.mobiphone'), 'home_phone'=>__('user.register.homephone'), 'contact_type'=>__('user.contact.type-company'));
			 
				$user_debt_fields = array('debt_count'=>__('user.my_page.basic_info.debt_count'), 'debt_total_value'=>__('user.my_page.basic_info.debt_total'),'debt_pay_per_month'=>__('user.my_page.basic_info.debt_month'));
				
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
			if(!$user['UserCompany']['month_worked']  && $user['UserCompany']['year_worked'] )$user['UserCompany']['month_worked'] = "100";
			if($user['UserCompany']['month_worked']  && !$user['UserCompany']['year_worked'] )$user['UserCompany']['year_worked'] = "100";
		 
			$this->UserCompany->set($user);
			//if(!$this->UserCompany->validates()){
			//  $result['error'] = 1;
				 $user_company_fields = array('work_id'=>__('user.register.work'), 'insurance_id'=>__('user.my_page.basic_info.insurances'));
					// foreach ($this->UserCompany->invalidFields() as $key => $value) {
				 $user_comapany_required_fields = array( 'name'=>__('user.my_page.basic_info.company_name'), 'name_kana'=>__('user.my_page.basic_info.company_name_kana'), 'post_num_1'=>__('user.dashboard.user.post_num_1'), 'post_num_2'=>__('user.dashboard.user.post_num_2'), 'pref_id' =>__('user.register.pref'),
					'city'=>__('user.register.city'), 'address'=>__('user.register.address'), 'phone'=>__('user.register.phone'), 'fax'=>__('user.my_page.basic_info.fax'), 'career_id'=>__('user.my_page.basic_info.career'), 'position'=>__('user.my_page.basic_info.position'), 'department'=>__('user.my_page.basic_info.department'), 'description'=>__('user.my_page.basic_info.description'), 
					'month_worked'=>__('user.dashboard.user.month_worked'), 'year_worked'=>__('user.dashboard.user.year_worked'), 'salary_month'=>__('user.my_page.basic_info.salary_month'), 'salary_year'=>__('user.my_page.basic_info.salary_year'), 'salary_receive_id' =>__('user.my_page.basic_info.salary_receive'), 'salary_type'=>__('user.my_page.basic_info.salary_type'), 'insurance_id'=>__('user.my_page.basic_info.insurances'));
				 
					if( $user['UserCompany']['work_id'] ){
						$requireds = $this->WorkRequired->find('first', array('conditions'=>array('WorkRequired.work_id'=>$user['UserCompany']['work_id'])));
						
						foreach ($requireds['WorkRequired'] as $key => $value) {
							
							if($value){
								if($user['UserCompany'][$key]!= "0"){
									if(!$user['UserCompany'][$key]){
										
										if($user_comapany_required_fields[$key]){
											 array_push($result['User']['UserCompany']['fields'], $user_comapany_required_fields[$key]);
											 $result['User']['UserCompany']['error'] = 1;
											 $result['error'] = 1;
										}
									}
									
								}

								if($key=="salary_receive_id"){
									if($user['UserCompany']['salary_receive_id'] == 3){
										if(!$user['UserCompany']['salary_date']){           
											array_push($result['User']['UserCompany']['fields'], __('user.my_page.basic_info.salary_receive_date'));
											 $result['User']['UserCompany']['error'] = 1;
											$result['error'] = 1;
										}
									}
								}
								if($key=="salary_type"){
									if($user['UserCompany']['salary_type'] == 4){
										if(!$user['UserCompany']['salary_type_other']){
											array_push($result['User']['UserCompany']['fields'], __('user.my_page.basic_info.salary_type'));
											 $result['User']['UserCompany']['error'] = 1;
											$result['error'] = 1;
										}
									}
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
				
					$result['error'] = 1;
					$user_address_fields = array('post_num_1'=>__('user.dashboard.user.post_num_1'), 'post_num_2'=>__('user.dashboard.user.post_num_2'), 'pref_id' =>__('user.register.pref'), 'city'=>__('user.register.city'), 'address'=>__('user.register.house'),
							'residence_id' =>__('user.my_page.basic_info.residence'), 'housing_costs' =>__('user.my_page.basic_info.house_cost'),'year_residence' =>__('user.my_page.basic_info.year_residence'));
					foreach ($this->UserAddress->invalidFields() as $key => $value) {
						 if(array_key_exists($key, $user_address_fields)){
								 array_push($result['User']['UserAddress']['fields'], $user_address_fields[$key]);
								$result['User']['UserAddress']['error'] = 1;
						 }
						 
					}
			}
			
			// validate expect area
			// The first item will be checked
			 $user_expect_area_fields = array('post_num_1'=>__('user.dashboard.user.post_num_1'), 
					'post_num_2'=>__('user.dashboard.user.post_num_2'), 'pref_id' =>__('user.register.pref'), 'city'=>__('user.register.city'));
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
				 foreach ($user_expect_area_fields as $key => $value) {
						array_push($result['User']['ExpectArea']['fields'], $value);
				 }
			}


		 // validate Partner
		 $user_partner_info_fields = array('first_name'=>__('user.register.firstname'), 'last_name' =>__('user.register.lastname'), 'first_name_kana'=>__('user.register.firstnamekana'), 'last_name_kana'=>__('user.register.lastnamekana'), 'gender'=>__('user.register.gender'), 
						'year_of_birthday'=>__('user.register.year'), 'month_of_birth'=>__('user.register.month'), 'day_of_birth'=>__('user.register.day'));
			$user_partner_company_fields = array('work_id'=>__('user.register.work'), 'insurance_id'=>__('user.my_page.basic_info.insurances'));
			$user_partner_contact_fields = array('phone'=>__('user.register.mobiphone'));


		
		 $partner = $this->UserPartner->find('first',array( 'conditions'=>array( 'UserPartner.id'=> $user['UserPartner']['id'])));
		 if($user['User']['married_status_id'] == 1){
				if($partner){
					$this->UserPartner->set($partner);
					if(!$this->UserPartner->validates()){
						
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
				if($partner){
					 $partner_validate =  $this->_validate_work_type($partner['UserPartner'], $result['UserPartner']['UserPartnerCompany']);
					
						//validate partner company
						if($partner_validate['error'] == 1){
							 $result['error'] = 1;
						}
						$result['UserPartner']['UserPartnerCompany']['error'] = $partner_validate['error'];
						$result['UserPartner']['UserPartnerCompany']['fields'] = $partner_validate['fields'];
				}
		}
		 $user_partner_relation_fields = array('first_name'=>__('user.register.firstname'), 'last_name' =>__('user.register.lastname'), 
						'first_name_kana'=>__('user.register.firstnamekana'), 'last_name_kana'=>__('user.register.lastnamekana'), 'year_of_birthday'=>__('user.register.year'), 
						'month_of_birth'=>__('user.register.month'), 'day_of_birth'=>__('user.register.day'), 'relate'=>__('user.partner.user.relation'));
		if(!is_null($user['User']['live_with_family'])){
			
			if($user['User']['live_with_family']){
				if($user['UserRelation']){
					//foreach ($user['User']['UserRelation'] as $item) {
						$item = $user['UserRelation'][0];
					 
						 $result['UserPartner']['UserPartnerRelation']['fields'] = array();

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
				else {
					
					$result['error'] = 1;
					$result['UserPartner']['UserPartnerRelation']['error'] = 1;
					foreach ($user_partner_relation_fields as $key => $value) {
						 array_push($result['UserPartner']['UserPartnerRelation']['fields'], $value);
					}
					
				}
			}
		}



		// validate guarantor
			$guarantor = $this->UserGuarantor->find('first',array( 'conditions'=>array( 'UserGuarantor.id'=> $user['UserGuarantor']['id'])));
			$user_guarantor_info_fields = array('first_name'=>__('user.register.firstname'), 'last_name' =>__('user.register.lastname'), 'first_name_kana'=>__('user.register.firstnamekana'), 'last_name_kana'=>__('user.register.lastnamekana'), 
						'year_of_birthday'=>__('user.register.year'), 'month_of_birth'=>__('user.register.month'), 'day_of_birth'=>__('user.register.day'), 'gender'=>__('user.register.gender'), 'live_with_family' =>__('user.my_page.basic_info.family'), 'married_status' =>__('user.register.married'), 'relate'=>__('user.my_page.guarantor.relationship'));
					$user_guarantor_company_fields = array('work_id'=>__('user.register.work'), 'insurance_id'=>__('user.my_page.basic_info.insurances'));
					$user_guarantor_address_fields = array('post_num_1'=>__('user.dashboard.user.post_num_1'), 'post_num_2'=>__('user.dashboard.user.post_num_2'), 'pref_id' =>__('user.register.pref'), 'city'=>__('user.register.city'), 
						'address'=>__('user.register.house'),'residence_id' =>__('user.my_page.basic_info.residence'),'year_residence'=>__('user.my_page.basic_info.year_residence'));
					$user_guarantor_contact_fields = array('phone'=>__('user.register.mobiphone'), 'home_phone'=>__('user.register.homephone'), 'contact_type_id'=>__('user.my_page.basic_info.contact_type'));  
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
				
				$result['UserGuarantor']['UserGuarantorAddress']['error'] = 1;
				foreach ($user_guarantor_address_fields as $key => $value) {
					 array_push($result['UserGuarantor']['UserGuarantorAddress']['fields'], $value);
				}
				$result['UserGuarantor']['UserGuarantorContact']['error'] = 1;
				foreach ($user_guarantor_contact_fields as $key => $value) {
					 array_push($result['UserGuarantor']['UserGuarantorContact']['fields'], $value);
				}
			}

		 if($guarantor){
			 $guarantor_validate =  $this->_validate_work_type($guarantor['UserGuarantor'], $result['UserGuarantor']['UserGuarantorCompany']);
					//validate guarantor company
				if($guarantor_validate['error'] == 1){
					 $result['error'] = 1;
				}
				$result['UserGuarantor']['UserGuarantorCompany']['error'] = $guarantor_validate['error'];
				$result['UserGuarantor']['UserGuarantorCompany']['fields'] = $guarantor_validate['fields'];
		 }
		 

			
			if($user['User']['need_more_guarantor']){
				$other_guarantor = $this->UserGuarantor->find('first',array( 'conditions'=>array( 'UserGuarantor.id'=> $user['User']['other_guarantor_id'])));
			 
				if($other_guarantor){
					$this->UserGuarantor->set($other_guarantor);
					if(!$this->UserGuarantor->validates()){
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

				if($other_guarantor){
					$other_guarantor_validate =  $this->_validate_work_type($other_guarantor['UserGuarantor'], $result['OtherGuarantor']['UserGuarantorCompany']);
					
						//validate guarantor company
						if($other_guarantor_validate['error'] == 1){
							 $result['error'] = 1;
						}
						$result['OtherGuarantor']['UserGuarantorCompany']['error'] = $other_guarantor_validate['error'];
						$result['OtherGuarantor']['UserGuarantorCompany']['fields'] = $other_guarantor_validate['fields'];
				 }
			}
		 
			if($user['UserAttachment']){
			 
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

		// validate work type
		function _validate_work_type($obj, $result){
			$company_required_fields = array( 'company'=>__('user.my_page.basic_info.company_name'), 'company_kana'=>__('user.my_page.basic_info.company_name_kana'), 'company_post_num_1'=>__('user.dashboard.user.post_num_1'), 'company_post_num_2'=>__('user.dashboard.user.post_num_2'), 'company_pref_id' =>__('user.register.pref'),
					'company_city'=>__('user.register.city'), 'company_address'=>__('user.register.address'), 'company_phone'=>__('user.register.phone'), 'company_fax'=>__('user.my_page.basic_info.fax'), 'career_id'=>__('user.my_page.basic_info.career'), 'company_position'=>__('user.my_page.basic_info.position'), 'company_department'=>__('user.my_page.basic_info.department'), 'company_job_desc'=>__('user.my_page.basic_info.description'), 
					'month_worked'=>__('user.dashboard.user.month_worked'), 'year_worked'=>__('user.dashboard.user.year_worked'), 'income_month'=>__('user.my_page.basic_info.salary_month'), 'income_year'=>__('user.my_page.basic_info.salary_year'), 'salary_receive_id' =>__('user.my_page.basic_info.salary_receive'), 'salary_type'=>__('user.my_page.basic_info.salary_type'), 'insurance_id'=>__('user.my_page.basic_info.insurances'));
				if(!$obj['month_worked']  && $obj['year_worked'] )$obj['month_worked'] = "100";
				if($obj['month_worked']  && !$obj['year_worked'] )$obj['year_worked'] = "100";
					if( $obj['work_id'] ){
						$requireds = $this->GuarantorWorkRequired->find('first', array('conditions'=>array('GuarantorWorkRequired.work_id'=>$obj['work_id'] )));
					 
					 foreach ($requireds['GuarantorWorkRequired'] as $key => $value) {
							
							if($value){
								if($obj[$key] != "0"){
									if(!$obj[$key]){
										 array_push($result['fields'], $company_required_fields[$key]);
										 $result['error'] = 1;
									}
								}
								
								if($key=="salary_receive_id"){
									if($obj['salary_receive_id'] == 3){
										if(!$obj['salary_date']){
											
											array_push($result['fields'], __('user.my_page.basic_info.salary_receive_date'));
											$result['error'] = 1;
										}
									}
								}
								if($key=="salary_type"){
									if($obj['salary_type'] == 4){
										if(!$obj['salary_type_other']){
											array_push($result['fields'], __('user.my_page.basic_info.salary_type'));
											$result['error'] = 1;
										}
									}
								}
								
							}
						}
						
					}
					else {
					 
						 foreach ($company_required_fields as $key => $value) {
			 
							array_push($result['fields'], $value);
							
						}
					}
					
					return $result;
		}


		//ajax reload dashboad
		function reload_dashboard(){
			if($this->request->is('ajax')){
				 $id = $this->s_user_id;
				if($id){
			 
					$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('Status' ,'UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment')));
					$this->data = $user;
					$this->set('user', $user);
					$validations = $this->_validate($user);
					$this->set('validations', $validations);
					$this->render('ajax_reload_dashboard');

				}
			}
		}

		// submit register 2
		function update_account_info(){
			 $id = $this->s_user_id;
			if($id){
				
				$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 
					'contain'=>array('UserAddress', 'UserCompany','UserCompany.Work', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea', 'ExpectArea.Pref' ,'UserRelation', 'UserAttachment'),
					'recursive'=>3,
					));
				$this->data = $user;
				//validate before save
				$validations = $this->_validate($user);
				if(!$validations['error']){
					
					$user['User']['status_id'] = 3;
					$user['User']['updated_date'] = DboSource::expression('NOW()');
					if($this->User->save($user, false)){
						$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 
							'contain'=>array('Status', 'UserAddress', 'UserCompany', 'UserCompany.Work', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' ,'UserRelation', 'UserAttachment', 'ExpectArea.Pref'),
							'recursive'=>3
							));
						//send mail to user
						// $Email = new CakeEmail('gmail');
						// $Email->template('update_account');
						// $Email->emailFormat('html');
						// $Email->to($user['User']['email']);
						// $Email->from(FROM_EMAIL);
						// $Email->subject(__('admin.email.update_account.title'));
						// $Email->viewVars(array('user' => $user));
						// $Email->send();
						$this->sendEmailToUser($user['User']['email'], 'update_account',  __('user.email.update_account.title'), array('user' => $user));
						//send mail to admin
						// $Email = new CakeEmail('gmail');
						// $Email->template('admin_update_account');
						// $Email->emailFormat('html');
						// $Email->to(ADMIN_EMAIL);
						// $Email->from(FROM_EMAIL);
						// $Email->subject('【MOOS】審査申し込み通知');
						 
						// $Email->viewVars(array('user' => $user));
						// $Email->send();
						$this->sendEmailToAdmin( 'admin_update_account',  __('user.email.admin_update_account.title'), array('user' => $user));
						$this->Session->setFlash(__('global.mypage.update.successful'),'default', array('class' => 'alert alert-dismissible alert-success'));
						$this->redirect( "my_page" );
						

					} 
					else {
						$this->Session->setFlash("Cannot Save Data", 'default',array('class' => 'alert alert-dismissible alert-info"'));
					}

				}
				else {
					
					$this->Session->setFlash('Cannot submit account','default', array('class' => 'alert alert-dismissible alert-info'));
					$this->redirect('my_page');

				}
			}
			else {
				$this->redirect('login');
			}
		}
		function first_login_update(){

			$user = $this->User->find('first', array('conditions'=>array('User.id'=>$_POST['id']), 'contain'=>array('id')));
				
			 $user['User']['first_login'] = 1;   
			if($this->User->save($user, false)){
				die('ok');
			}else{die('not');}
			
		}

	 

}
?>
