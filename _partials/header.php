<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Autostop UA</title>
	
	<!-- google maps api cdn -->
	<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDN8CZL6PryCYP8ZnXUnPu3CzgR1lOjMho&sensor=false&libraries=places">
    </script>
	<!-- jquery min cdn -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">
		window.onload = function () {
       	initialize();
    	}
	</script>
 	
	<link rel="stylesheet" type="text/css" href="./bootstrap/assets/css/bootstrap.css">
	<style type="text/css">
      body {
        padding-top: 41px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
	<link rel="stylesheet" type="text/css" href="./bootstrap/assets/css/datepicker.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap/assets/css/bootstrap-responsive.css">

	<link rel="shortcut icon" href="./bootstrap/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

	<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="./">autostop</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="./">Home</a></li>
              <li><a href="#about">Про проект</a></li>
              <li><a href="#contact">Контакти</a></li>
            </ul>
            <p class="navbar-text pull-right">Logged in as <a href="#">username</a></p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Маршрути</li>
              <!-- <li class="active"><a href="#">Link</a></li> -->
              <li><a href="new.php">Новий</a></li>
              <li><a href="search.php">Пошук</a></li>
              <li><a href="route.php">TOP</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->