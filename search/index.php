<?php header('content-type: application/json; charset=utf-8');

require '../functions2.php';
connect();
if (isset($_POST['query']) && empty($_POST['s_date'])) {
	$q = $_POST['query'];
	$res = array('objA'=>typeahead_search($q), 'objB'=>search($q), 'objB'=>search($q));
	echo json_encode($res);
}
elseif ($_GET['q'] != null) {
	$q = $_GET['q'];
	$res = array('objA'=>typeahead_search($q), 'objB'=>search($q), 'objB'=>search($q));
	echo json_encode($res);
}
elseif (isset($_POST['query']) && isset($_POST['s_date'])) {
	$q = $_POST['query'];
	$s_date = $_POST['s_date'];
	$e_date = $_POST['e_date'];
	$type = $_POST['type'];
	$res = array('objB'=>advanced_search($q, $s_date, $e_date, $type));
	echo json_encode($res);
};