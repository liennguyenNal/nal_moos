<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Contact extends AppModel {
    var $name = 'Contact';
     var $validate = array( 
        
        'first_name' => array(
            'rule' => 'notBlank',
           'message'=>'This field is required'
            
        ),   
        'last_name' => array(
            'rule' => 'notBlank',
           'message'=>'This field is required'
            
        ),    
        'first_name_kana' => array(
            'rule' => 'notBlank',
           'message'=>'This field is required'
            
        ),   
        'last_name_kana' => array(
           'rule' => 'notBlank',
           'message'=>'This field is required'            
        ),

        'type' => array(
           'rule' => 'notBlank',
           'message'=>'This field is required'            
        ),
        'phone' => array(
            
            'rule1'=>array('rule' => 'numeric',
                'message'=>'Must be a numeric',

                ),
            'rule2'=>array(
                    'rule' => 'notBlank',
           		'message'=>'This field is required'     
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
        'email_confirm' => array(
            'rule1'=>array(
                'rule' => 'email',
                'message'=> 'Invalid email format'
            ),
            'compare'    => array(
                'rule'      => array('validate_confirm_email'), 
                'message' => 'The email confirmation don\'t match.',
            )
        ),
        'content' => array(
           'rule' => 'notBlank',
           'message'=>'This field is required'            
        ),
        'agree' => array(
           'rule' => 'notBlank',
           'message'=>'This field is required'            
        )

        

    );
    public function validate_confirm_email(){
        return $this->data[$this->alias]['email'] === $this->data[$this->alias]['email_confirm'];
    }
    
}
?>