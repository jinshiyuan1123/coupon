<?php
//require('../db.config.php');

define("APP_PATH",dirname(__FILE__));
define("SP_PATH",dirname(__FILE__).'/SpeedPHP');
$spConfig = array(
	"db" => array(
		'driver' => 'mysqli',
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'GZ8FCgz8fccqwyo89',
		'database' => 'blockchain',
		'port' => 3306,
	),	
	'auto_session' => false,
	'mode' => 'debug',
	'view' => array(
		'enabled' => TRUE, // ¿ªÆôSmarty
		'config' =>array(
				'template_dir' => APP_PATH.'/tpl',
				'compile_dir' => APP_PATH.'/tmp',
				'cache_dir' => APP_PATH.'/tmp',
				'left_delimiter' => '<{',
				'right_delimiter' => '}>',
		),
	),
);
require(SP_PATH."/SpeedPHP.php");
//session_start();
spRun();