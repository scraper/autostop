<?php 

require 'functions2.php';
require 'conf.php';

connect();
if (isset($_POST['origin'], $_POST['destination']) && $_POST['fb_id'] != null && $_POST['fb_id'] != "" ) {
	get_json($_POST['origin'], $_POST['destination'], $_POST['seats'], $_POST['price'], $_POST['type'], $_POST['date'], $_POST['fb_id']);
	new_route();
}
else if (isset($_POST['origin'], $_POST['destination']) && empty($_POST['fb_id'])) {
	get_json($_POST['origin'], $_POST['destination'], $_POST['seats'], $_POST['price'], $_POST['type'], $_POST['date'], null);
	new_route_unregistered($_POST['vehicle'], $_POST['v_color'], $_POST['climat'], $_POST['smoking'], $_POST['email'], $_POST['phone'], $_POST['experience']);
};
include 'views/new2.tmpl.php';