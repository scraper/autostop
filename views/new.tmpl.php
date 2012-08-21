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
								
								<label id="a" for="start">Відправляюсь з міста:</label>
								<input class="text_input" type="text" id="start" name="origin"/>
								<label id="b" for="end">Їду в місто:</label>
								<input class="text_input" type="text" id="end" name="destination"/>
								<li id="seats" style="list-style-type:none;">
                                    <label>Вільних місць: <input id="seats_i" class="text_input" type="text" name="seats"></label>
    							</li>
                                <label>Відправлення</label><input type="text" class="text_input" value="20-08-2012" id="dp1">
								<label>Ціна за місце: <input type="text" id="date" name="price"></label>

								<div class="btn-group" data-toggle="buttons-radio">
                                    <button class="btn btn-info" id="idriver">Я-Водій</button>
                                    <button class="btn btn-success" id="ipassngr">Я-Пасажир</button>
                                </div>
                                <br>
								<div class="btn-group">
									<button class="btn btn-warning" id="build_route">Прокласти маршрут</button>
									<button class="btn btn-primary" id="submit" type="submit">Додати маршрут</button>
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