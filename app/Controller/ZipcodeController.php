<?php
class ZipcodeController extends AppController {
	var $name = "Zipcode";

	var $use = array("Pref", "Zipcde");

	function find_address( ){
		//$zipcode 
		$zipcode = $this->request->query['zipcode'];
		$item = $this->Zipcode->find('first', array('conditions'=>array('Zipcode.zipcode'=>$zipcode)));
		echo json_encode($item['Zipcode']); die;
	}

}
 ?>
