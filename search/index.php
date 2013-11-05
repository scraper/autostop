<?php header('content-type: application/json; charset=utf-8');

require '../functions2.php';
require '../conf.php';
connect();
if (isset($_POST['query']) && isset($_POST['typeahead'])) {
	$q = $_POST['query'];
	$start = null;
	$res = array('objA'=>typeahead_search($q));
	echo json_encode($res);
}
elseif (isset($_POST['query']) && $_POST['paging'] == false) {
	$q = $_POST['query'];
	$start = null;
	$res = array('objA'=>typeahead_search($q), 'objB'=>search($q,$start), 'objD'=>row_count($q));
	echo json_encode($res);
}
elseif (isset($_POST['query']) && empty($_POST['s_date']) && $_POST['paging'] == true) {
	$q = $_POST['query'];
	$start = $_POST['start'];
	$res = array('objB'=>search($q,$start), 'objD'=>row_count($q));
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
}
elseif (isset($_POST['uid'])) {
	$uid = $_POST['uid'];
	$res = array('objB'=>showUserRoute($uid));
	echo json_encode($res);
}
elseif (empty($_GET['q']) && $_POST['isTop'] == true) {
	$top = array('objB'=>[],'objC'=>top_routes());
	echo json_encode($top);
};