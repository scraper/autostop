<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
	<title>Autostop UA</title>
	<link rel="icon" type="image/ico" href="/imgs/favicon_green.ico"/>
<!-- google maps api cdn -->
	<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDN8CZL6PryCYP8ZnXUnPu3CzgR1lOjMho&sensor=false&libraries=places">
    </script>
	<!-- jquery min cdn -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <!-- facebook -->
    <script src="//connect.facebook.net/en_US/all.js"></script>
<!-- local scripts -->
    <script type="text/javascript" src="/js/facebook.js"></script>
    <!-- script for serch from top menu -->
    <script type="text/javascript" src="/js/search_header.js"></script>
    <!-- search -->
    <script type="text/javascript" src="/js/search_pagination.js"></script>
    <!-- getUrlParam script -->
    <script type="text/javascript" src="/js/getUrlParam.js"></script>
    <script type="text/javascript" src="/js/profile_backend.js"></script>
    <!-- Google Fonts -->
 	<link href='http://fonts.googleapis.com/css?family=Lobster|Raleway|Audiowide' rel='stylesheet' type='text/css'>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/bootstrap-3.2.0/css/bootstrap.css">
    <!-- floating labels -->
    <link rel="stylesheet" type="text/css" href="/floating-labels/floating-labels.css">
    <script type="text/javascript" src="/floating-labels/floating-labels.js"></script>
	<style type="text/css">
      body {
        padding-top: 15px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      #main {
        float: none; margin-left: auto; margin-right: auto;
      }
      .nav:hover {
        color: #0088cc;
      }
    </style>
	<link rel="stylesheet" type="text/css" href="/bootstrap-3.2.0/css/datepicker.css">
	
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<div class="container-fluid">
    <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" style="font-family:'Lobster', cursive; color: green;" href="/">drivefull</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Маршрути
                            <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a id="auth_new_route" href="/new.php">Новий</a></li>
                                <li><a href="/search.php">Пошук</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Контакти</a></li>
                        <li class="divider-vertical"></li>
                        <li><a href="#" onclick="user_init()" id="is_auth_user">Увійти з Facebook</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="is_auth_user_link"><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a id="user_profile_href" href="/profile.php">Мій профіль</a></li>        
                                <li>
                                    <a href="" onclick="fb_logout()">Вийти</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a id="loader" style="display:none"><img class="img" src="/imgs/ajax-loader4.gif"></a>
                        </li>
                    </ul>
                    <ul class="nav pull-right">
                        <form id="top_menu_search" class="navbar-form navbar-left" role="search" action="search.php" method="get">
                            <div class="form-group">
                                <input id="search_h" name="q" type="text" class="form-control" style="width:350px" placeholder="Пошук" autocomplete="off">
                                <span id="search_ico" class="glyphicon glyphicon-search"></span>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
    </nav>