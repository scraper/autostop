<?php include '_partials/header.php'; ?>

    	<div class="span9">
    		<div class="row-fluid">
    			<div class="span4">
    				<h2>Карта</h2>
    				<div id="map" style="width:100%;height:400px;"></div>
    			</div><!--/span-->
    			<div class="span4">
    				<h2>Маршрут</h2>
    				<div id="controls">
						<form class="well" action="index.php" method="post">
							<div class="directions">
								
									<label id="a" for="start">З:</label>
									<input class="text_input" type="text" id="start" name="origin"/>
									<label id="b" for="end">До:</label>
									<input class="text_input" type="text" id="end" name="destination"/>
								
								<li id="seats">
									<label>Вільних місць: <input id="seats_i" class="text_input" type="text" name="seats"></label>
								</li>
									
									
                  <input type="text" class="span2" value="" id="dp1">

                  <label>Дата: <input type="text" id="date" name="date"></label>
									<label>Ціна за місце: <input type="text" id="date" name="price"></label>
								
								
									<label><input type="radio" id="driver" name="whoiam">Я - Водій</label>
									<label><input type="radio" id="passenger" name="whoiam">Я - Пасажир</label>
								
								<div class="btn-group">
									<button class="btn btn-info" id="build_route">Прокласти маршрут</button>
									<button class="btn btn-success" id="submit" type="submit">Додати маршрут</button>
								</div>
							</div>
						</form>
					</div>
    			</div><!--/span-->
    		</div><!--/row-->
   		</div><!--/span-->

    </div><!--/row-->

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

</div><!--/.fluid-container-->

<script src="js/get_route.js"></script>

<?php include '_partials/footer.php'; ?>