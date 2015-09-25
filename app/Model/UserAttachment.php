<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class UserAttachment extends AppModel {
    var $name = 'UserAttachment';
    

    function getFilename($user_id, $type_id){
    	$item = $this->find('first', array('conditions'=>array('user_id'=>$user_id, 'attachment_type_id'=>$type_id)));
    	return $item['UserAttachment']['filename'];
    }

}
?>