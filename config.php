<?php
$dt_DB = array();
if($_SERVER['HTTP_HOST'] == 'localhost'){
	//localhost
	$dt_DB =  array(
		'server' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'waroeng_new',
		);
 }else{
 	//online
 	$dt_DB =  array(
 		'server' => 'localhost',
 		'username' => 'markdesi_root',
 		'password' => '1q2w3e4r5t6y',
 		'database' => 'markdesi_bethesda',
 		);
}
