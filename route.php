<?php

require 'functions.php';
connect();
$route_id = render_route($_GET['id']);

include 'views/route.tmpl.php';