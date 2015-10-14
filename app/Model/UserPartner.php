<?php

class UserPartner extends AppModel {
    var $name = 'UserPartner';
    var $belongsTo = array('Work','Career');

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
        'work_id' => array(
            'rule'=>'notBlank'
        ),
        'insurance_id'=>array(
            'rule'=>'notBlank'
        ),
        'phone'=>array(
            'rule'=>'notBlank'
        ),
        'company_pref_id'=>array(
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