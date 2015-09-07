<?php

class UserAddress extends AppModel {
    var $name = 'UserAddress';
    //var $belongsTo = array('User');
    var $hasMany = array('City');

    var $validate = array( 
        
        'post_num' => array(
            'rule1'=>array('rule' => 'numeric',
                'message'=>'Must be a numeric'
                ),
            'rule2'=>array(
                 'rule' => 'notBlank',
                 'message'=> "This field is required"
            )
            
        ),   
        'city_id' => array(
            'rule' => 'notBlank',
        ),  
        'address' =>array(
        	'rule' => 'notBlank',
        ),
        'address_kana' =>array(
        	'rule' => 'notBlank',
        ),

        'phone' => array(
            'rule1'=>array('rule' => 'numeric',
                'message'=>'Must be a numeric'
                ),
            'rule2'=>array(
                     'rule' => 'notBlank',
                     'message'=> "This field is required"
                )
            
        ),
        'home_phone'=>array(
                'rule1'=>array('rule' => 'numeric',
                'message'=>'Must be a numeric'
                )
            ),

        'email' => array(
            'rule1'=>array(
                'rule' => 'email',
                'message'=> 'Invalid email format'
            ),
            'rule2'=>array(
                 'rule' => 'notBlank',
                 'message'=> "This field is required"
            )
        ),      

    );


}
?>