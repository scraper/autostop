<?php header('content-type: application/json; charset=utf-8');

require 'functions.php';
connect();
if (isset($_POST['query'])) {
	$res = search($_POST['query']);
	echo json_encode($res);
};