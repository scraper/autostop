<?php include '_partials/header.php'; ?>
<!--map initialization-->
<script type="text/javascript">
	window.onload = function () {
		initialize();
	}
</script>


<style type="text/css">
.span7 {
	-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
}
</style>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span7">
			<legend>Карта</legend>
			<div id="map" style="width:100%;height:400px;"></div>
		</div>
		<div class="span5">
			<legend>Маршрут:</legend>
			<table class="table table-hover">
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
					<tr>
						<td>user_id:</td>
						<td><?php echo ($id->user_id);?></td>
					</tr>
					<tr>
						<td>name:</td>
						<td><?php echo ($id->name);?></td>
					</tr>
				</tbody>	
			</table>
		</div>
	</div>
	<br>
	<input id="start_val" type="hidden" value="<?php echo ($id->s_city_id);?>">
	<input id="end_val" type="hidden" value="<?php echo ($id->e_city_id);?>">
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
	<a class="addthis_button_preferred_1"></a>
	<a class="addthis_button_preferred_2"></a>
	<a class="addthis_button_preferred_3"></a>
	<a class="addthis_button_preferred_4"></a>
	<a class="addthis_button_compact"></a>
	<a class="addthis_counter addthis_bubble_style"></a>
	</div>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50b545cd607bfd66"></script>
	<!-- AddThis Button END -->
</div>

    </div><!--/row-->

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

    </div><!--/.fluid-container-->

</div>

<script type="text/javascript">

		var directionsDisplay = new google.maps.DirectionsRenderer();
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
		  var start = $('#start_val').val();
		  var end = $('#end_val').val();
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
		setTimeout(
			function(){
				calcRoute();
				console.log("timer");
			}, 1700)

		// console.log(document.getElementById("start").innerText);
</script>

<script type="text/javascript" src="./js/search.js"></script>
<?php include '_partials/footer.php'; ?>