<?php

require 'functions2.php';
require 'conf.php';

if (isset($_GET['q'])) {
	connect();
	$id = render_route($_GET['q']);
	json_encode($id);
}
include 'views/route.tmpl.php';