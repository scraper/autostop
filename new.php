<?php 

require 'functions2.php';
require 'conf.php';

connect();
if (isset($_POST['origin'], $_POST['destination']) ) {
	get_json($_POST['origin'], $_POST['destination'], $_POST['seats'], $_POST['price'], $_POST['type'], $_POST['date'], $_POST['fb_id']);
	new_route();
};
include 'views/new2.tmpl.php';