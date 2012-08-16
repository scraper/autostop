<?php

require 'functions.php';
connect();
$route_details = show_routes();
include 'views/view.tmpl.php';