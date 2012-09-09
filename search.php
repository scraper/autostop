<?php header('content-type: application/json; charset=utf-8');

require 'functions.php';
connect();
if (isset($_POST['query'])) {
	$res = search($_POST['query']);
	echo json_encode($res);
};
// $res = search("l");
// $result[] = $res;
// echo json_encode(array("name"=>"John","time"=>"2pm"));
// echo json_encode($result);