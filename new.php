<?php

require 'functions2.php';


if (isset($_POST['origin'], $_POST['destination'] ) ) {
	get_json($_POST['origin'], $_POST['destination'], $_POST['seats'], $_POST['price'], $_POST['date']);
	connect();
	new_route();
};

include 'views/new.tmpl.php';
