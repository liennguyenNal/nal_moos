<?php
class UserGuarantorsController extends AppController {

	var $name = "UserGuarantors";
	var $uses = array('UserGuarantor', 'User', 'Work', 'MarriedStatus', 'Pref', 'Insurance', 'Career', 'Residence');
	var $components = array('Login', 'Util', 'Session', 'RequestHandler');
    var $helpers = array('Html', 'Js');

	function edit(){
		
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
	        	'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea')));
	        $this->set('user', $user);
      
			if($user['User']['status_id'] == "2"){

				$user_id = $user['User']['id'];
				$guarantor_id = $this->data['UserGuarantor']['id'];
				
				if($this->data['UserGuarantor']){
					
						$user_guarantor = $this->data;
						
						 $guarantor_id = $user_guarantor['UserGuarantor']['id'];
						$this->UserGuarantor->set($user_guarantor);
						$user = $this->User->read(null, $user_id);

						
						if($this->UserGuarantor->save($user_guarantor, false)){							

							if(!$guarantor_id)
								$guarantor_id = $this->UserGuarantor->getLastInsertId();
							if($guarantor_id)
								$user['User']['user_guarantor_id'] = $guarantor_id;
							if($this->User->save($user, false)){
								$user = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id), 
									'contain'=>array('Status', 'UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserGuarantor', 'ExpectArea', 'UserRelation' )));
      							$this->data = $user;
      							$this->set('user', $user);
								$this->Session->setFlash(__('user.register.update_gurantor.successful'),'default', array('class' => 'alert alert-dismissible alert-success'));
							}
						}							
					

				}
				//cancel edit 
				else {
					$this->data = $user;
					
				}
				$this->render('ajax_guarantor_edit');

			}
			else {
				echo "0"; die;
			}
		} 
		else {
			$this->redirect('/');
		}
			
		


	}

	function edit_other_guarantor(){
		
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
	        	'contain'=>array( 'Status','UserAddress', 'UserCompany', 'MarriedStatus',
	        		 'UserGuarantor',  'OtherGuarantor', 'UserPartner', 'ExpectArea')));
	        $this->set('user', $user);
      
			if($user['User']['status_id'] == "2"){

				$user_id = $user['User']['id'];
				$guarantor_id = $this->data['OtherGuarantor']['id'];
				
				if($this->data['OtherGuarantor']){
					//print_r($this->data['OtherGuarantor']); die;
					$user_guarantor = $this->data;
					
					 $guarantor_id = $user_guarantor['OtherGuarantor']['id'];
					$this->UserGuarantor->set($user_guarantor);
					$user = $this->User->read(null, $user_id);

					
					if($this->UserGuarantor->save($user_guarantor['OtherGuarantor'], false)){
						

						if(!$guarantor_id)
							$guarantor_id = $this->UserGuarantor->getLastInsertId();
						if($guarantor_id)
							$user['User']['other_guarantor_id'] = $guarantor_id;
						if($this->User->save($user, false)){
							$user = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 
								'UserGuarantor', 'OtherGuarantor','ExpectArea', 'UserRelation' )));
  							$this->data = $user;
  							$this->set('user', $user);
							$this->Session->setFlash(__('user.register.update_gurantor.successful'),'default', array('class' => 'alert alert-dismissible alert-success'));
						}
					}
							
				}
				//cancel edit 
				else {
					$this->data = $user;
					
				}
				$this->render('ajax_other_guarantor_edit');

			}
			else {
				echo "0"; die;
			}
		} 
		else {
			$this->redirect('/');
		}
			
		


	}
		


}

?>