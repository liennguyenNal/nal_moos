<?php

class UserGuarantor extends AppModel {
    var $name = 'UserGuarantor';
    var $belongsTo = array('Pref','Residence','Insurance', 'Work','Career','MarriedStatus');

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
        'pref_id' => array(
            'rule' => 'notBlank',
        ),
        'residence_id' => array(
            'rule' => 'notBlank',
        ),
        'insurance_id'=>array(
            'rule'=>'notBlank'
        ), 
        'married_status_id'=>array(
            'rule'=>'notBlank'
        ), 
        
        'phone' => array(
            'rule2'=>array(
                     'rule' => 'validate_phone',
                     'message'=> "Input least one field of phone"
                ),
            'rule1'=>array('rule' => 'numeric',
                'allowEmpty' => true,
                'message'=>'Must be a numeric',

                )
            
        ),
        'home_phone'=>array(
            
            'rule2'=>array(
                     'rule' => 'validate_phone',
                     'allowEmpty' => true,
                     'message'=> "Input least one field of phone"
                ),
            'rule1'=>array('rule' => 'numeric',
                'allowEmpty' => true,
                'message'=>'Must be a numeric'
                )
        ),
        'contact_type_id'=>array(
            'rule'=>'notBlank'
        ),
        'relate'=>array(
            'rule'=>'notBlank'
        )
        

    );

function checkRequired($check)
{
     if($check) return true; 
     return false;
   //return true;
}
public function validate_phone() {
       
        return $this->data[$this->alias]['phone'] != "" || $this->data[$this->alias]['home_phone']!="";
    }


}
?>