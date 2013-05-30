<?php header('content-type: application/json; charset=utf-8');

require 'functions2.php';

connect();
if (isset($_POST['id'], $_POST['name'], $_POST['username'])) {
	new_user($_POST['id'],$_POST['name'],$_POST['username']);
	$usr = array($_POST['id'],$_POST['name'],$_POST['username']);

	echo json_encode($usr);
}
else if (isset($_POST['id']) && empty($_POST['name']) && empty($_POST['username'])) {
	$res = array('objA'=>user_profile($_POST['id']));
	echo json_encode($res);
}
else if (isset($_GET['id'])) {
	$res = array('objA'=>user_profile($_GET['id']));
	echo json_encode($res);
}