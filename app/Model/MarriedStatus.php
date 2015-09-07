<?php 
class MarriedStatus extends AppModel{
	 var $name = 'MarriedStatus';
	 var $hasMany = array('User');
	 function getNameById($id){
	 	$item = $this->read(null, $id);
	 	return $item['MarriedStatus']['name'];
	 }

}

?>