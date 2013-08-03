<?php header('content-type: application/json; charset=utf-8');

require "../functions2.php";
require "../conf.php";

if (isset($_GET['q'])) {
	connect();
	$result = array('objA'=>render_route($_GET['q']));
	echo json_encode($result);
}