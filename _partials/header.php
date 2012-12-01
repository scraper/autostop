<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
	<title>Autostop UA</title>
	
	<!-- google maps api cdn -->
	<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDN8CZL6PryCYP8ZnXUnPu3CzgR1lOjMho&sensor=false&libraries=places">
    </script>
	<!-- jquery min cdn -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript">
		window.onload = function () {
       	initialize();
    	}
	</script>
    
 	
	<link rel="stylesheet" type="text/css" href="./bootstrap/assets/css/bootstrap.css">
	<style type="text/css">
      body {
        padding-top: 15px;
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
<div class="container">
	<div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">

                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <a class="brand" href="./">gogo!</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Маршрути
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="new.php">Новий</a></li>
                                <li><a href="search.php">Пошук</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Контакти</a></li>
                        <li class="divider-vertical"></li>
                        
                    </ul>
                    <ul class="nav pull-right">
                        <form class="navbar-search" action="search.php" method="post">
                            <input id="search_h" name="q" type="text" class="search-query" placeholder="Пошук" autocomplete="off">
                            <a href="./search.php"><i class="icon-search"></i></a>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<div class="container">
    <div class="container">