<?php include '_partials/header.php'; ?>

	<script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDN8CZL6PryCYP8ZnXUnPu3CzgR1lOjMho&sensor=false&libraries=places">
    </script>

<div>
	<h2>Autostop UA</h2>
</div>

<div>
	<?php
		foreach ($route_details as $a) {
			echo "<li><a href='route.php?id={$a->id}'>Starting from: {$a->start} - Going to: {$a->end}</a></li>";
		};
	?>
</div>

<script type="text/javascript">

// var directionsDisplay;
// 		var directionsService = new google.maps.DirectionsService();
// 		var map;

// 		function initialize() {
// 		  directionsDisplay = new google.maps.DirectionsRenderer();
// 		  var kyiv = new google.maps.LatLng(50.450099,30.52341);
// 		  var myOptions = {
// 		    zoom:5,
// 		    mapTypeId: google.maps.MapTypeId.ROADMAP,
// 		    center: kyiv
// 		  }
// 		  map = new google.maps.Map(document.getElementById("map"), myOptions);
// 		  directionsDisplay.setMap(map);
// 		}

// 		function calcRoute() {
// 		  var start = "<?php foreach ($route_details as $a) {echo ($a->start); }?>";
// 		  var end = "<?php foreach ($route_details as $a) {echo ($a->end); }?>";
// 		  var request = {
// 		    origin:start,
// 		    destination:end,
// 		    travelMode: google.maps.TravelMode.DRIVING
// 		  };
// 		  directionsService.route(request, function(result, status) {
// 		    if (status == google.maps.DirectionsStatus.OK) {
// 		      directionsDisplay.setDirections(result);
// 		    }
// 		  });
// 		}
// 		show.onclick = calcRoute;
</script>

<?php include '_partials/footer.php'; ?>