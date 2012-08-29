<?php include '_partials/header.php'; ?>

<div class="span9">
	<div class="row-fluid">
		<div class="span7">
			<h3>Карта</h3>
			<div id="map" style="width:100%;height:400px;"></div>
		</div>
		
		<div class="span4">
			<h3>Пошук</h3>
			<form class="well">
				
					<input id="search" class="input-large" type="text" placeholder="Введіть місто для пошуку...">
					<div class="btn-group">
						<button class="btn btn-success" type="submit">Go!</button>
						<button class="btn btn-info">Розширений</button>
					</div>
				
			</form>
		</div>
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