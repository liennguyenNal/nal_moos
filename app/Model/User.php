<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends AppModel {
    var $name = 'User';
    //var $hasMany = array('UserAddress', 'UserCompany');
    var $belongsTo = array('MarriedStatus', 'FamilyStructure', 'UserAddress', 'UserCompany');
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
        'age_of_birth' => array(
               
               'rule' => 'notBlank',
                'message'=>'This field is required'
            
        ),
        'year_of_birth' => array(
                
                'rule' => 'notBlank',
                'message'=>'This field is required'
            
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
        'family_structure_id' => array(
               'rule' => 'notBlank',
                'message'=>'This field is required'
            
        ) 
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

    public function validate_passwords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
    }
}
?>