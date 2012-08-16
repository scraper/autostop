<?php

require 'functions.php';

if (isset($_POST['search'])) {
	connect();

	$search_result = search($_POST['search']);
	echo json_encode($search_result);return;
}

include 'views/main.tmpl.php';