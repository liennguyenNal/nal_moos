<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends AppModel {
    var $name = 'User';
     var $validate = array( 
        // 'username' => array(
        //     'loginRule' => array(
        //         'rule'    => array('notEmpty'),
        //         'message' => 'Username must be not empty'
        //     ),
        //     'loginRule-1' => array(
        //         'rule'    => 'alphaNumeric',
        //         'message' => 'Only alphabets and numbers allowed'
        //      ),
        //     'loginRule-2' => array(
        //         'rule'    => array('isUnique'),
        //         'message' => 'Username is unique'
        //     )
            
        // ),
        'email' => array(
            'emailrule-1' => array(
                'rule'    => 'isUnique',
                'message' => 'Email is used'
             ),
            'emailRule-2' => array(
                'rule'    => array('email'),
                'message' => 'Email is invalid'
            )
        ),
        'first_name' => array(
            'rule1' => array(
                'rule'    => array('notEmpty'),
                'message' => 'Server must be not empty'
            )
           
            
        ),   
        'last_name' => array(
            'rule1' => array(
                'rule'    => array('notEmpty'),
                'message' => 'Server must be not empty'
            )
           
            
        ),    
        'password' => array(
            'length' => array(
                'rule'      => array('between', 8, 40),
                'message'   => 'Your password must be between 8 and 40 characters.',
            ),
            
            'rule2'=>array(                    
                'rule'    => array('notEmpty'),
                'message' => 'Server must be not empty'
            )
           
            
        ),    
        'confirm_password' => array(
            'length' => array(
                'rule'      => array('between', 8, 40),
                'message'   => 'Your password must be between 8 and 40 characters.',
            ),
            
            'compare'    => array(
                'rule'      => array('validate_passwords'),
                'message' => 'The passwords you entered do not match.',
            )
           
            
        ),   

    );

    public function validate_passwords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
    }
}
?>