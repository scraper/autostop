<?php include '_partials/header.php'; ?>
<div id="main">

<!-- <a href="new.php">New route</a>
<a href="view.php">View existing routes</a> -->

<div id="map"></div>

<div id="tabs">
	<ul>
		<li><a href="#tab1">Додати маршрут</a></li>
		<li><a href="#tab2">Пошук</a></li>
		<li><a href="#tab3">Tab 2</a></li>
	</ul>
	<div id="tab1">
		
		<div id="controls">
			<form action="index.php" method="post">
				<div class="directions">
					<li>
						<label id="a" for="start">А:</label>
						<input class="text_input" type="text" id="start" name="origin"/>
						<label id="b" for="end">Б:</label>
						<input class="text_input" type="text" id="end" name="destination"/>
					</li>
					<li id="seats">
						<label>Вільних місць: <input id="seats_i" class="text_input" type="text" name="seats"></label>
					</li>
					<li>	
						<label>Дата: <input type="text" id="date" name="date"></label>
						<label>Ціна за місце: <input type="text" id="date" name="price"></label>
					</li>
					<li>
						<label><input class="radio_input" type="radio" id="driver" name="whoiam">Я - Водій</label>
						<label><input class="radio_input" type="radio" id="passenger" name="whoiam">Я - Пасажир</label>
					</li>
					<button id="build_route">Прокласти маршрут</button>
					<button id="submit" type="submit">Додати маршрут</button>
				</div>
			</form>
		</div>

	</div>
	<div id="tab2">
		
		<div>
			<ul id="route">
			<?php
				foreach ($route_details as $a) {
					echo "<li><a href='route.php?id={$a->route_id}'>Starting from: {$a->start} - Going to: {$a->end}</a></li>";
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
	
		function calcRouteFromDB() {
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
		calcRouteFromDB();		

</script>

<script src="js/ui.js">
 
</script>
<script src="js/get_route.js"></script>

</div>
<?php include '_partials/footer.php'; ?>