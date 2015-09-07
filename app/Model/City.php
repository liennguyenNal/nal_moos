<?php 
class City extends AppModel {
	var $name = 'City';
    var $useTable = "cities";


    function getNameById($id){
	 	$item = $this->read(null, $id);
	 	return $item['City']['name'];
	 }
}

?>