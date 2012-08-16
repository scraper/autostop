<?php include '_partials/header.php'; ?>
<div>
	<h2 id="logo"><a href="http://212.22.205.143/google maps/">Autostop UA</a></h2>
</div>

<div id="map" style="width:100%;height:400px;"></div>

<div id="tabs">
	<ul>
		<li><a href="#tab1">Маршрут</a></li>
		<li><a href="#tab2">Пошук</a></li>
		<li><a href="#tab3">Tab 2</a></li>
	</ul>
	<div id="tab1">
		
		Інформація про маршрут:

	</div>
	<div id="tab2">
		
		<div>
			<ul id="route">
			<?php
				foreach ($route_details as $a) {
					echo "<li><a href='route.php?id={$a->id}'>Starting from: {$a->start} - Going to: {$a->end}</a></li>";
				};
			?>
			</ul>
		</div>

	</div>
	<div id="tab3">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	</div>

</div>

<script type="text/javascript">

var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;

		function initialize() {
		  directionsDisplay = new google.maps.DirectionsRenderer();
		  var kyiv = new google.maps.LatLng(50.450099,30.52341);
		  var myOptions = {
		    zoom:5,
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    center: kyiv
		  }
		  map = new google.maps.Map(document.getElementById("map"), myOptions);
		  directionsDisplay.setMap(map);
		}

		function calcRoute() {
		  var start = "<?php echo ($route_id->start);?>";
		  var end = "<?php echo ($route_id->end);?>";
		  var request = {
		    origin:start,
		    destination:end,
		    travelMode: google.maps.TravelMode.DRIVING
		  };
		  directionsService.route(request, function(result, status) {
		    if (status == google.maps.DirectionsStatus.OK) {
		      directionsDisplay.setDirections(result);
		    }
		  });
		}
		calcRoute();
</script>
<script src="js/ui.js"></script>
<?php include '_partials/footer.php'; ?>