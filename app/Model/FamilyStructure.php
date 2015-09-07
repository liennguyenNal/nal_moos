<?php 
class FamilyStructure extends AppModel{
	 var $name = 'FamilyStructure';

	 function getNameById($id){
	 	$item = $this->read(null, $id);
	 	return $item['FamilyStructure']['name'];
	 }

}

?>