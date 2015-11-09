<?php
class EmailConfig {

	public $default = array(
		'host' => 'smtp4.gmoserver.jp',
        'port' => 25,
        'username' => 'noreply@moraeru-house.com',
        'password' => '8zujTj&K',
        'transport' => 'Smtp',
        'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('site@localhost' => 'My Site'),
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
	public $gmail = array(
        'host' => 'smtp4.gmoserver.jp',
        'port' => 25,
        'username' => 'noreply@moraeru-house.com',
        'password' => '8zujTj&K',
        'transport' => 'Smtp',
        'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
    );

	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
}
