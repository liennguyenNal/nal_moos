<?php 
class WorkingStatus extends AppModel{
	 var $name = 'WorkingStatus';

	 function getNameById($id){
	 	$item = $this->read(null, $id);
	 	return $item['WorkingStatus']['name'];
	 }

}

?>