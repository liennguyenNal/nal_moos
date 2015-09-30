<?php

class ExpectArea extends AppModel {
    var $name = 'ExpectArea';
    var $belongsTo = array('User', 'Pref');
    

    var $validate = array( 
        
       'post_num_1' => array(
            'rule' => 'notBlank'
        ),  
        'post_num_2' =>array(
            'rule'=>'notBlank'
        ),
        'city' =>array(
            'rule'=>'notBlank'
        ),
        'address' =>array(
            'rule'=>'notBlank'
        ),
     

    );

    function checkRequired($check)
	{
	     if($check) return true; 
	     return false;
	   //return true;
	}


}
?>