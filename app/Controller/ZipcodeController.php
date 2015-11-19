<?php
class ZipcodeController extends AppController {
	var $name = "Zipcode";

	var $use = array("Pref", "Zipcde");

	function find_address(){
		//$zipcode 
		$zipcode = $this->request->query['zipcode'];
		$item = $this->Zipcode->find('first', array('conditions'=>array('Zipcode.zipcode'=>$zipcode)));
		$jObject = array('pref_id'=>'', 'ward'=>'', 'addr1'=>'' );
		if($item){
			$pref_id = $item['Zipcode']['pref_id'];
			$city = $item['Zipcode']['ward'];
			$address = $item['Zipcode']['addr1'];
			
			$pos1 = strrpos($address, "（");
			$pos2 = strrpos($address, "）");
		
			if($pos1 && $pos2){
				$city = $city. ' '. substr_replace($address, '', $pos1);

				$address = substr($item['Zipcode']['addr1'], $pos1, strlen($address) - $pos1);
			}
			else {
				$city = $city.$address;
				$address  = "";
			}
			$jObject['pref_id'] = $pref_id ;
			$jObject['ward'] = $city ;
			$jObject['addr1'] = $address ;

		}
		echo json_encode($jObject); die;

	}

}
 ?>
