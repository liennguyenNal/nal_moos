<?php

class UserAddress extends AppModel {
    var $name = 'UserAddress';
    var $belongsTo = array('Pref');
    

    var $validate = array( 
        
        'post_num_1' => array(
            'rule1'=>array('rule' => 'numeric',
                'message'=>'Must be a numeric'
                ),
            'rule2'=>array(
                 'rule' => 'notBlank',
                 'message'=> "This field is required"
            )
            
        ),   
        'post_num_2' => array(
            'rule1'=>array('rule' => 'numeric',
                'message'=>'Must be a numeric'
                ),
            'rule2'=>array(
                 'rule' => 'notBlank',
                 'message'=> "This field is required"
            )
            
        ), 

        'pref_id' => array(
            'rule' => 'notBlank',
        ),  
        'city' =>array(
            'rule' => 'notBlank',
        ),

        'address' =>array(
        	'rule' => 'notBlank',
        ),

        'residence_id' =>array(
            'rule' => 'notBlank',
        ),
        'housing_costs' =>array(
            'rule' => 'checkResidence',

        ),
        
        'year_residence' =>array(
            'rule' => 'notBlank',
        )

    );
    
    function checkResidence(){
        if(!$this->data[$this->alias]['residence_id'])return true;
        if($this->data[$this->alias]['residence_id'] != 1 && $this->data[$this->alias]['residence_id'] != 2){
            //echo $this->data[$this->alias]['housing_costs']; die;
            if($this->data[$this->alias]['housing_costs']) return true;
            else {
                //echo 1111; die;
                return false;
            }
        }
        return true;
    }

}
?>