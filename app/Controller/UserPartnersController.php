<?php
class UserPartnersController extends AppController {

	var $name = "UserPartners";
	var $uses = array('UserPartner', 'User', 'Work', 'MarriedStatus', 'Pref', 'Insurance', 'Career', 'Residence', 'UserRelation');
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

			$user_id = $this->s_user_id;
			if($user_id){
	       		$user = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea', 'UserRelation' )));
	         	//$user = $this->User->find('first', array('conditions'=>array('User.id'=>$id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea')));
	        	 $this->set('user', $user);
	      		
				if($user['User']['status_id'] == "2"){

					$user_id = $user['User']['id'];
					if($this->data['UserPartner']){
						//if($this->data['UserPartner']['is_confirm']){
							$user_partner = $this->data;

							$partner_id = $user_partner['UserPartner']['id'];
							$this->UserPartner->set($user_partner);
							$user = $this->User->read(null, $user_id);

							// $valid = $this->UserPartner->validates();
							// if($valid){
							$relation_ids = array();
							if($this->UserPartner->save($user_partner, false)){
								$old_relations = $this->UserRelation->find('all', array('conditions'=>array('UserRelation.user_id'=>$user_id)));
								//delete first
								foreach ($user_partner['UserRelation'] as $item) {
									if($item['id'])array_push($relation_ids, $item['id']);
								}
								 foreach ($old_relations as $relation) {
				                	if(in_array($relation['UserRelation']['id'], $relation_ids)){
				                		
				                	}
				                	else {
				                		
				                		$this->UserRelation->create();
				                		$this->UserRelation->delete($relation['UserRelation']['id']);
				                	}
				                	
				                }

								//save personal information in house
								foreach ($user_partner['UserRelation'] as $item) {
									$num_relation =  $this->UserRelation->find('count', array('conditions'=>array('UserRelation.user_id'=>$user_id)));
									if($num_relation < MAX_NUM_RELATION || $item['id'] ){
					                    $item['user_id'] = $user_id;
					                    
					                    $this->UserRelation->create();

					                    if($this->UserRelation->save($item, false)) {

					                    	if(!$item['id']){
					                    		$relation_id = $this->UserRelation->getLastInsertId();
					                    		$num_relation++;
					                    	}
					                    	else $relation_id = $item['id'];
					                    	
					                    }
					                }
				                }
				                
				               
								if(!$partner_id)
									$partner_id = $this->UserPartner->getLastInsertId();
								if($partner_id)
									$user['User']['user_partner_id'] = $partner_id;
								if($this->User->save($user, false)){
									$user = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea', 'UserRelation' )));
	      							$this->data = $user;
	      							$this->set('user', $user);
									$this->Session->setFlash(__('user.register.update_partner.successful'),'default', array('class' => 'alert alert-dismissible alert-success'));
								}
							}
								

					}
					else {
						$this->set('user', $user);
						$this->data = $user;
						
					}					

				}

				$this->render('ajax_partner_edit');
				
			}
			else {
					echo "0"; die;
				} 
			
		}
		else {
			$this->redirect('/users/my_page');
		}


	}


}

?>