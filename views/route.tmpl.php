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
						<td id="start"></td>
					</tr>
					<tr>
						<td>До:</td>
						<td id="end"></td>
					</tr>
					<tr>
						<td>Дата виїзду:</td>
						<td id="date"></td>
					</tr>
					<tr>
						<td>Ціна за місце:</td>
						<td id="price"></td>
					</tr>
					<tr class="driver">
						<td>Вільних місць:</td>
						<td id="seats"></td>
					</tr>					
					<tr>
						<td>Водій/пасажир:</td>
						<td id="type"></td>
					</tr>
					<tr class="name">
						<td>Ім'я:</td>
						<td id="name"></td>
					</tr>
					<tr>
						<td>Телефон:</td>
						<td id="phone"></td>
					</tr>					
					<tr class="driver">
						<td>E-mail:</td>
						<td id="email"></td>
					</tr>								
					<tr class="driver">
						<td>Авто:</td>
						<td id="vehicle"></td>
					</tr>
					<tr class="driver">
						<td>Колір:</td>
						<td id="v_color"></td>
					</tr>
					<tr class="driver">
						<td>Клімат контроль/кондиціонер:</td>
						<td id="climat"></td>
					</tr>
					<tr class="driver">
						<td>Стаж водіння:</td>
						<td id="experience"></td>
					</tr>
					<tr>
						<td>Палю:</td>
						<td id="smoking"></td>
					</tr>
					
					<tr class="driver">
						<td>user_id:</td>
						<td id="user_id"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<br>
	<input id="start_val" type="hidden" value="<?php echo ($id->s_city_id);?>">
	<input id="end_val" type="hidden" value="<?php echo ($id->e_city_id);?>">
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
			}, 1700)

		// console.log(document.getElementById("start").innerText);
</script>
<script type="text/javascript" src="./js/route.js"></script>
<script type="text/javascript" src="./js/search.js"></script>
<?php include '_partials/footer.php'; ?>