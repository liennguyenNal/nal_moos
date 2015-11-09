<?php 
class WorkingStatus extends AppModel{
	 var $name = 'WorkingStatus';

	 //function get Name by ID
	 function getNameById($id){
	 	$item = $this->read(null, $id);
	 	return $item['WorkingStatus']['name'];
	 }

}

?>