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

			$user = $this->Session->read('User');
      
			if($user){

				$user_id = $user['User']['id'];
				$guarantor_id = $this->data['UserGuarantor']['id'];
				if($this->data){
					//var_dump($this->data);
					$this->UserGuarantor->set($this->data);
					$user = $this->User->read(null, $user_id);

					$valid = $this->UserGuarantor->validates();
					if($valid){
						$this->UserGuarantor->save($this->data, false);
						if(!$guarantor_id)
							$guarantor_id = $this->UserGuarantor->getLastInsertId();
						//echo $guarantor_id; die;
						$user['User']['user_guarantor_id'] = $guarantor_id;
						if($this->User->save($user, false))
							$user = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id), 'contain'=>array('UserAddress', 'UserCompany', 'MarriedStatus', 'UserGuarantor', 'UserPartner', 'ExpectArea' )));
      						$this->data = $user;
      						
							$this->Session->setFlash('Guarantor Info has been saved successful!','default', array('class' => 'alert alert-dismissible alert-success'));
					
						
					}

					


				}
				$this->render('ajax_guarantor_edit');

			}
			else {
				echo "1111"; die;
			}
		} 
		else {
			$this->redirect('/');
		}
			
		


	}
		


}

?>