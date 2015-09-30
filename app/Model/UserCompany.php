<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class UserCompany extends AppModel {
    var $name = 'UserCompany';
    var $belongsTo = array('WorkingStatus');
    var $hasMany = array('Pref');

    var $validate = array( 
        
        'work_id' => array(
            'rule' => 'notBlank',
            'message'=>'Choose a work'
            
        ) ,
        'insurance_id' => array(
            'rule' => 'notBlank',
            'message'=>'Choose a Insurance Type'
            
        ),

        'name_kana' => array(
            'rule' => 'notBlank',
           	'on'=>'update'
        ),  
        'post_num' =>array(
        	'required'=>true,
        	'on'=>'update'
        ),
        'address' =>array(
        	'required'=>true,
        	'on'=>'update'
        )
        // 'address_kana' =>array(
        // 	'required'=>true,
        // 	 'message'=> "This field is required",	
        // 	'on'=>'update'
        // ),

        // 'year_worked' => array(
        //     'rule1'=>array('rule' => 'numeric',
        //         'message'=>'Must be a numeric'
        //         ),
        //     'rule2'=>array(
        //              'rule' => 'notBlank',
        //              'message'=> "This field is required"
        //         )
            
        // ),   

        // 'month_worked' => array(
        //     'rule1'=>array('rule' => 'numeric',
        //         'message'=>'Must be a numeric'
        //         ),
        //     'rule2'=>array(
        //              'rule' => 'notBlank',
        //              'message'=> "This field is required"
        //         )
            
        // ),

        // 'tax_of_month' => array(
        //     'rule1'=>array('rule' => 'numeric',
        //         'message'=>'Must be a numeric'
        //         ),
        //     'rule2'=>array(
        //              'rule' => 'notBlank',
        //              'message'=> "This field is required"
        //         )
            
        // ),      

    );

    public function afterFind($results, $primary = false) {
	    foreach ($results as $key => $val) {

	        if (isset($val['UserCompany']['working_status_id'])) {
	            $results[$key]['UserCompany']['working_status'] = $this->WorkingStatus->getNameById($val['UserCompany']['working_status_id']);
	        }
	    }
	    return $results;
	}

    function validate_user_company($item){
        return null;
    }
}

?>