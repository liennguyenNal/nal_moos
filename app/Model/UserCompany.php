<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class UserCompany extends AppModel {
    var $name = 'UserCompany';
    var $belongsTo = array('Work', 'Pref','Insurance','Career');

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