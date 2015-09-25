<?php 
class Work extends AppModel{
	 var $name = 'Work';

	 function getNameById($id){
	 	$item = $this->read(null, $id);
	 	return $item['WorkingStatus']['name'];
	 }

}

?>