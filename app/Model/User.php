<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends AppModel {
    var $name = 'User';
    var $hasMany = array('ExpectArea', 'UserRelation', 'UserAttachment');
    var $belongsTo = array('MarriedStatus',  'UserAddress', 'UserCompany', 'UserPartner', 'UserGuarantor');
    var $actsAs = array('Containable');
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
        'year_of_birth' => array(
                
                'rule' => 'notBlank'
            
        ),   
        'month_of_birth' => array(
              'rule' => 'notBlank',
                'message'=>'This field is required'           
            
        ),    
        'day_of_birth' => array(
                'rule' => 'notBlank',
                'message'=>'This field is required'
           
        ),   
        'genre' => array(
                'rule' => 'notBlank',
                'message'=>'This field is required'
            
        ), 
        'married_status_id' => array(
               'rule' => 'notBlank',
                'message'=>'This field is required'
            
        ), 
        'live_with_family' => array(
               'rule' => 'notBlank',
                'message'=>'This field is required'
            
        ), 
        'num_child' => array(
               'rule' => 'notBlank',
                'message'=>'This field is required'
            
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

        'email' => array(
            'rule1'=>array(
                'rule' => 'email',
                'message'=> 'Invalid email format',
                'on'=>'create'
            ),
            'rule2'=>array(
                 'rule' => 'notBlank',
                 'message'=> "This field is required",
                 'on'=>'create'
            ),
            'rule3'=>array(
                'rule' => 'isUnique',
                'message' => 'Email already registered',
                'on'=>'create'
            )
        ), 
        'email_confirm' => array(
            'rule1'=>array(
                'rule' => 'email',
                'message'=> 'Invalid email format',
                'on'=>'create'
            ),
            'compare'    => array(
                'rule'      => array('validate_confirm_email'), 
                'message' => 'The email confirmation don\'t match.',
                'on'=>'create'
            )
        ),
        'debt_count' => array(
               'rule' => 'notBlank',
                'message'=>'This field is required'
            
        ),
        'debt_total_value' => array(
               'rule' => 'notBlank',
                'message'=>'This field is required'
            
        ),
        'debt_pay_per_month' => array(
               'rule' => 'notBlank',
                'message'=>'This field is required'
            
        ),

        // 'password' => array(
        //     'length' => array(
        //         'rule'      => array('between', 8, 40),
        //         'message'   => 'Your password must be between 8 and 40 characters.',
        //     ),
            
        //     'rule2'=>array(                    
        //         'rule'    => array('notBlank'),
        //         'message' => 'Server must be not empty'
        //     )
           
            
        // ),    
        // 'confirm_password' => array(
        //     'length' => array(
        //         'rule'      => array('between', 8, 40),
        //         'message'   => 'Your password must be between 8 and 40 characters.',
        //     ),
            
        //     'compare'    => array(
        //         'rule'      => array('validate_passwords'),
        //         'message' => 'The passwords you entered do not match.',
        //     )
           
            
        // ),   

    );
    public function validate_confirm_email(){
        return $this->data[$this->alias]['email'] === $this->data[$this->alias]['email_confirm'];
    }
    public function validate_passwords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
    }

    public function validate_phone() {
        //echo 123;die;
        return $this->data[$this->alias]['phone'] != "" || $this->data[$this->alias]['home_phone']!="";
    }

    function checkRequired($check)
    {
         if($check) return true; 
         return false;
       //return true;
    }


}
?>