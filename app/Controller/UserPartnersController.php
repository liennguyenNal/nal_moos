<?php
class UserPartnersController extends AppController {

	var $name = "UserPartners";
	var $uses = array('UserPartner', 'User', 'Work', 'MarriedStatus', 'Pref', 'Insurance', 'Career', 'Residence', 'UserRelation');
	var $components = array('Login', 'Util', 'Session', 'RequestHandler');
    var $helpers = array('Html', 'Js');

	function edit(){
		//echo 1111; die;
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

			$user = $this->Session->read('User');
      
			if($user){

				$user_id = $user['User']['id'];
				if($this->data){
					//print_r($this->data['UserRelation']); die;
					$partner_id = $this->data['UserPartner']['id'];
					$this->UserPartner->set($this->data);
					$user = $this->User->read(null, $user_id);

					$valid = $this->UserPartner->validates();
					if($valid){
						
						if($this->UserPartner->save($this->data, false)){
							foreach ($this->data['UserRelation'] as $item) {
								//print_r($item); die;
			                    $item['user_id'] = $user_id;
			                    $this->UserRelation->create();
			                    if(!$this->UserRelation->save($item, false)) {echo "Cannot save"; die; }
			                  }

							if(!$partner_id)
								$partner_id = $this->UserPartner->getLastInsertId();
							//echo $partner_id; die;
							$user['User']['user_partner_id'] = $partner_id;
							if($this->User->save($user, false)){
								$user = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea', 'UserRelation' )));
      							$this->data = $user;
								$this->Session->setFlash('Partner Info has been saved successful!','default', array('class' => 'alert alert-dismissible alert-success'));
							}
						}
						
					}

					


				}
				$this->render('ajax_partner_edit');

			}
			else {
				echo ""; die;
			} 
			
		}
		else {
			$this->redirect('/users/my_page');
		}


	}


}

?>