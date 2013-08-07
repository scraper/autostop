<?php

require 'functions2.php';
require 'conf.php';

include 'views/profile.tmpl.php';

if(isset($_POST['id'])) {
	connect();
	update_user_profile(
		$_POST['id'],
		$_POST['isDriver'],
		$_POST['vehicle'],
		$_POST['v_color'],
		$_POST['climat'],
		$_POST['experience'],
		$_POST['smoking'],
		$_POST['email'],
		$_POST['phone']
	);
}
else {
ob_start(); // ensures anything dumped out will be caught 
// do stuff here
$redirectUrl = "./register";
// clear out the output buffer
while (ob_get_status()) 
{
    ob_end_clean();
}

// no redirect
header( "Location: $redirectUrl" );
}