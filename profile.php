<?php header('content-type: application/json; charset=utf-8');
session_start();
require 'functions2.php';

// include 'views/profile.tmpl.php';

connect();
$res = array('objA'=>user_profile($_POST['id']));
echo json_encode($res);