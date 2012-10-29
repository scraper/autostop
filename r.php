<?php header('content-type: application/json; charset=utf-8');

require 'functions.php';

if (isset($_GET['q'])) {
	connect();
	$id = render_route($_GET['q']);
	echo json_encode($id);
}