<?php include '_partials/header.php'; ?>

<!-- <a href="new.php">New route</a>
<a href="view.php">View existing routes</a> -->

        <div class="span9">
          <div class="span9">
              <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="./bootstrap/assets/img/bootstrap-mdo-sfmoma-01.jpg" alt="">
                    <div class="carousel-caption">
                      <h4>Hello hitchhikers!</h4>
                      <p>Створюйте маршрути. Шукайте маршрути. Подорожуйте без проблем!</p>
                    </div>
                  </div>
                  <div class="item">
                    <img src="./bootstrap/assets/img/bootstrap-mdo-sfmoma-02.jpg" alt="">
                    <div class="carousel-caption">
                      <h4>Діліться витратами на паливо і бережіть екологію</h4>
                      <p>Ви можете знайти пасажирів, якщо ви подорожуєте і маєте вільні місця у вашому авто.</p>
                    </div>
                  </div>
                  <div class="item">
                    <img src="./bootstrap/assets/img/bootstrap-mdo-sfmoma-03.jpg" alt="">
                    <div class="carousel-caption">
                      <h4>Не хвилюйтесь за квитки</h4>
                      <p>Немає квитків на потяг? Без проблем! Шукайте тих хто подорожує на авто і має вільні місця.</p>
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
              </div>
            </div>
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
          <div class="row-fluid">
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
            <div class="span4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn" href="#">View details &raquo;</a></p>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div><!--/.fluid-container-->
		
			<ul id="route">
			<?php
				foreach ($route_details as $a) {
					echo "<li><a href='route.php?id={$a->route_id}'>Starting from: {$a->start} - Going to: {$a->end}</a></li>";
				};
			?>
			</ul>

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