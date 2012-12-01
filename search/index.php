<?php header('content-type: application/json; charset=utf-8');

require '../functions.php';
connect();
if (isset($_POST['query'])) {
	$q = $_POST['query'];
	$res = array('objA'=>typeahead_search($q), 'objB'=>search($q), 'objB'=>search($q));
	echo json_encode($res);
}
elseif ($_GET['q'] != null) {
	$q = $_GET['q'];
	$res = array('objA'=>typeahead_search($q), 'objB'=>search($q), 'objB'=>search($q));
	echo json_encode($res);
};