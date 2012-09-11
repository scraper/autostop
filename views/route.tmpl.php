<?php include '_partials/header.php'; ?>

<div class="span9">
	<div class="row-fluid">
		
		
		<div class="span4">
			<h3>Пошук</h3>
			<form class="well">
				
					<input id="search" class="input-large" type="text" data-provide="typeahead" placeholder="Введіть місто для пошуку...">
					<div class="btn-group">
						<button class="btn btn-success" type="submit">Go!</button>
						<button class="btn btn-info">Розширений</button>
					</div>
				
			</form>
			<h3>Карта</h3>
			<div id="map" style="width:100%;height:400px;"></div>
		</div>

		<div class="span5">
			<h3>Results</h3>
			<?php
						foreach ($res as $a) {
							echo "<li><a href='route.php?id={$a->id}'>Starting from: {$a->start} - Going to: {$a->end}</a></li>";
						};
					?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function() {

			$('#search').typeahead({
				source: function(query, process) {
					var arr = [];
					return $.ajax({
						url: 'search.php',
						type: 'post',
						data: {query: $('#search').val()},
						dataType: "JSON",
						success: function(data) {
							//bootstrap typeahead does not know how to read JSON, so we push JSON items to JavaScript array
							
							$.each(data, function(column, value){
								arr.push(value['start'] + ' - ' + value['end']);
								
							});
							console.log(arr);
							return process(arr);
						}
					});
				}
			});
			// $('#search').data('typeahead').select = function() {
			// 	$.ajax({
			// 			url: 'search.php',
			// 			type: 'post',
			// 			data: {query: $('#search').val()},
			// 			dataType: "JSON",
			// 			success: function(data) {
			// 				$.each(data, function(column, value) {
			// 					$('.span5').append('A:' + value['start'] + ' - B:' + value['end']);
			// 					console.log(value['start']);
			// 				});
			// 				console.log(data);
			// 			}
			// 		});
			// };
	});
</script>

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