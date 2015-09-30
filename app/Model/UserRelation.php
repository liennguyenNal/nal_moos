<?php

class UserRelation extends AppModel {
    var $name = 'UserRelation';
    var $belongsTo = array('User');

    var $validate = array(         
         'first_name' => array(
            'rule' => 'notBlank'
            
        ),   
        'last_name' => array(
            'rule' => 'notBlank'
            
        ),    
        'first_name_kana' => array(
            'rule' => 'notBlank'
            
        ),   
        'last_name_kana' => array(
           'rule' => 'notBlank'
        ),
        'year_of_birth' => array(
            'rule' => 'notBlank'
        ),   
        'month_of_birth' => array(        
            'rule' => 'notBlank'
        ),    
        'day_of_birth' => array(
           'rule' => 'notBlank'
        ),   
        'gender' => array(
            'rule' => 'notBlank'
        
        ),
        'relate'=>array(
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