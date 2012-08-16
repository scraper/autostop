<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Autostop UA</title>
	
	<!-- google maps api cdn -->
	<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDN8CZL6PryCYP8ZnXUnPu3CzgR1lOjMho&sensor=false&libraries=places">
    </script>
	<!-- jquery min cdn -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!-- jquery ui cdn -->
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<!-- uniform local script -->
	<script src="uniform/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		window.onload = function () {
       	initialize();
    	}
	</script>
 	
	<link rel="stylesheet" type="text/css" href="./bootstrap/assets/css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="./bootstrap/assets/css/bootstrap-responsive.css">

	<link rel="shortcut icon" href="./bootstrap/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<!-- handlebars cdn -->
<!-- <script src="http://cloud.github.com/downloads/wycats/handlebars.js/handlebars-1.0.0.beta.6.js"></script> -->
<!-- google maps initialization -->
<body>
