<?php

require 'functions2.php';
require 'conf.php';

if (isset($_GET['q'])) {
	connect();
	$id = render_route($_GET['q']);
}
include 'views/route.tmpl.php';