<?php 
class Pref extends AppModel {
	var $name = 'Pref';
    var $useTable = "prefs";

    // function get Name By Id
    function getNameById($id){
	 	$item = $this->read(null, $id);
	 	return $item['Pref']['name'];
	 }
}

?>
