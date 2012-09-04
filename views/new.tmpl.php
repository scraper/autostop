<?php include '_partials/header.php'; ?>
<script type="text/javascript">
function validation() {
        var start = $('#start').val();
        var end = $('#end').val();
        var date = $('#dp1').val();
        var seats = $('#seats_i').val();
        var price = $('#prices').val();

        // validation of the new route form
        if (start==null || start=="" || end==null || end=="" || date==null || date=="" || price==null || price=="")
        {
            $('#submit').popover('show');
            $('.popover-inner').css({'width':'auto'});
            if (start==null || start=="") {
                $('#start').css({'border':'1px solid red'});
                $('#end').css({'border':'1px solid red'});             
                $('#prices').css({'border':'1px solid red'});
                return false;
            }
            else {
                if (end==null || end=="") {
                    $('#start').css({'border':'1px solid #CCC'});
                    $('#end').css({'border':'1px solid red'});
                    return false;
                }
                else {
                    if (date==null || date=="") {
                        $('#start').css({'border':'1px solid #CCC'});
                        $('#end').css({'border':'1px solid #CCC'});
                        $('dp1').css({'border':'1px solid red'});
                        return false;
                    }
                    else {
                        if (price==null || price=="") {
                            $('#start').css({'border':'1px solid #CCC'});
                            $('#end').css({'border':'1px solid #CCC'});
                            $('dp1').css({'border':'1px solid #CCC'});
                            $('#prices').css({'border':'1px solid red'});
                        }
                        else {
                            $('#start').css({'border':'1px solid #CCC'});
                            $('#end').css({'border':'1px solid #CCC'});
                            $('dp1').css({'border':'1px solid #CCC'});
                            $('#prices').css({'border':'1px solid #CCC'});
                        };
                    };
                };
            };
            return false;
        };
};
</script>
    	<div class="span9">
    		<div class="row-fluid">
    			<div class="span7">
    				<h3>Карта</h3>
    				<div id="map" style="width:100%;height:400px;"></div>
    			</div><!--/span-->
    			<div class="span4">
    				<h3>Маршрут</h3>
    				<div id="controls">
						<form class="well" action="index.php" method="post" onsubmit="return validation();">
							<div class="directions">
								
								<label id="a" for="start">Відправляюсь з міста:</label>
								<input class="text-input" type="text" id="start" name="origin"/>
								<label id="b" for="end">Їду в місто:</label>
								<input class="text-input" type="text" id="end" name="destination"/>
								<li id="seats" style="list-style-type:none;">
                                    <label>Вільних місць: <input id="seats_i" class="text-input" placeholder="Введіть кількість місць..." type="text" name="seats"></label>
    							</li>
                                <label>Відправлення</label><input type="text" class="text-input" id="dp1">
								<label>Ціна за місце: <input type="text" id="prices" class="text-input" placeholder="Введіть ціну..." name="price"></label>

								<div class="btn-group" data-toggle="buttons-radio">
                                    <button class="btn btn-info" id="idriver">Я-Водій</button>
                                    <button class="btn btn-success" id="ipassngr">Я-Пасажир</button>
                                </div>
                                <br>
								<div class="btn-group">
									<button class="btn btn-warning" id="build_route">Прокласти маршрут</button>
									<button class="btn btn-primary" id="submit" type="submit"  rel="popover" data-content="Ведіть обов'язкові поля">Додати маршрут</button>
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