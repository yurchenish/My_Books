<?php 

$mybooks_id = $_POST['mybooks_id'];
$cookie_name = "reeded[$mybooks_id]";

if( isset($_COOKIE['reeded']) &&
array_key_exists($mybooks_id, $_COOKIE['reeded']) ){
	setcookie($cookie_name, '', time()-4000, '/');
}else{
	setcookie($cookie_name, '1', time()+600*600, '/');
}