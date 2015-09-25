<?php
class UserGurantorsController extends AppController {

	var $name = "UserGuarantors";
	var $use = array('UserGuarantor', 'User', 'Work', 'MarialStatus', 'Pref');
	var $component = array();

	function edit_guarantor($id = null){
		$user_id  = $this->s_user_id;
		if($user_id){

			$user = $this->User->read(null, $user_id);
			$guarantor = $this->UserGuarantor->find('first', array('conditions'=>array('UserGuarantor.id'=>$id, 'UserGuarantor.user_id'=>$user_id)));
			if($user && $guarantor){
				if($this->data){
					$this->User->set($this->data);
					$user = $this->data;
					$valid = $this->User->validate();
					if($valid){
						$guarantor['UserGuarantor']['user_id'] = $user_id;

						$this->User->save($user, false);
						
					}
				}


			}
			else {
				$this->redirect('/users/my_page#guarantor');
			}

		}


	}



	function validate(){

	}
}

?>