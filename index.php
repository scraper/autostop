<?php

require 'functions.php';

if (isset($_POST['origin'], $_POST['destination'] ) ) {
	connect();
	get_json($_POST['origin'], $_POST['destination'], $_POST['seats'], $_POST['price'], $_POST['date']);
	new_route();
};

connect();
$route_details = show_routes();
$route_id = render_route($_GET['id']);

include 'views/index.tmpl.php';