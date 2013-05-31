<?php header('content-type: application/json; charset=utf-8');

require '../functions2.php';
require '../conf.php';
connect();
if (isset($_POST['query']) && empty($_POST['s_date'])) {
	$q = $_POST['query'];
	$res = array('objA'=>typeahead_search($q), 'objB'=>search($q), 'objB'=>search($q));
	echo json_encode($res);
}
elseif (isset($_GET['q'])) {
	$q = $_GET['q'];
	$res = array('objA'=>typeahead_search($q), 'objB'=>search($q), 'objB'=>search($q));
	echo json_encode($res);
}
elseif (isset($_POST['s_city'], $_POST['s_date'])) {
	$s_city = $_POST['s_city'];
	$e_city = $_POST['e_city'];
	$s_date = $_POST['s_date'];
	$e_date = $_POST['e_date'];
	$type = $_POST['type'];
	$res = array('objB'=>advanced_search($s_city, $e_city, $s_date, $e_date, $type));
	echo json_encode($res);
};