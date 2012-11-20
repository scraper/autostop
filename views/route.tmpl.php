<?php include '_partials/header.php'; ?>

<style type="text/css">
.span7 {
	-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
}
</style>

<div class="span12">
	<div class="row-fluid">
		<div class="span7">
			<legend>Карта</legend>
			<div id="map" style="width:100%;height:400px;"></div>
		</div>
		<div class="span4">
			<legend>Маршрут:</legend>
			<table class="table">
				<thead>
					<tr>
						<th>Деталі</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>З:</td>
						<td><?php echo ($id->s_city_id);?></td>
					</tr>
					<tr>
						<td>До:</td>
						<td><?php echo ($id->e_city_id);?></td>
					</tr>
					<tr>
						<td>Вільних місць:</td>
						<td><?php echo ($id->seats);?></td>
					</tr>
					<tr>
						<td>Ціна за місце:</td>
						<td><?php echo ($id->price);?></td>
					</tr>
					<tr>
						<td>Водій/пасажир:</td>
						<td><?php echo ($id->type);?></td>
					</tr>
					<tr>
						<td>Дата виїзду:</td>
						<td><?php echo ($id->date);?></td>
					</tr>
				</tbody>	
			</table>
		</div>
	</div>
</div>

    </div><!--/row-->

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

    </div><!--/.fluid-container-->

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
		  var start = "<?php echo ($id->s_city_id);?>";
		  var end = "<?php echo ($id->e_city_id);?>";
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

<?php include '_partials/footer.php'; ?>