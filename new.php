<?php

require 'functions.php';


if (isset($_POST['origin'], $_POST['destination'] ) ) {
	get_json($_POST['origin'], $_POST['destination'] );
	connect();
	new_route();
};

include 'views/new.tmpl.php';
