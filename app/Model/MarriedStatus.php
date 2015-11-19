<?php 
class MarriedStatus extends AppModel{
	 var $name = 'MarriedStatus';
	 var $hasMany = array('User');
	 //function get Name by Id
	 function getNameById($id){
	 	$item = $this->read(null, $id);
	 	return $item['MarriedStatus']['name'];
	 }

}

?>