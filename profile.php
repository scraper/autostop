<?php
session_start();
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