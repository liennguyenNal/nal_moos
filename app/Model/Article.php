<?php

class Article extends AppModel {
    var $name = 'Article';
    var $validates = array(
	    'title' => array(
	        'required' => true
	    ),
	    'short_description' => array(
	        'required' => true
	    ),
	    'content' => array(
	        'required' => true
	    ),
    );
}
?>