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
                if (end==null || end=="") {
                    $('#end').css({'border':'1px solid red'})
                }
                else {
                    $('#end').css({'border':'1px solid #CCC'})
                };
                if (date==null || date=="") {
                    $('#dp1').css({'border':'1px solid red'});
                }
                else {
                    $('#dp1').css({'border':'1px solid #CCC'});   
                };
                if (price==null || price=="") {
                    $('#prices').css({'border':'1px solid red'});
                }
                else {
                    $('#prices').css({'border':'1px solid #CCC'});   
                };
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
                return false;
            }
            else if (end==null || end=="") {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid red'});
                if (date==null || date=="") {
                    $('#dp1').css({'border':'1px solid red'});
                }
                else {
                    $('#dp1').css({'border':'1px solid #CCC'});   
                };
                if (price==null || price=="") {
                    $('#prices').css({'border':'1px solid red'});
                }
                else {
                    $('#prices').css({'border':'1px solid #CCC'});   
                };
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
                return false;
            }
            else if (date==null || date=="") {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid #CCC'});
                $('dp1').css({'border':'1px solid red'});
                if (price==null || price=="") {
                    $('#prices').css({'border':'1px solid red'});
                }
                else {
                    $('#prices').css({'border':'1px solid #CCC'});   
                };
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
                return false;
            }
            else if (price==null || price=="") {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid #CCC'});
                $('dp1').css({'border':'1px solid #CCC'});
                $('#prices').css({'border':'1px solid red'});
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
            }
            else if (seats==null || seats=="") {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid #CCC'});
                $('dp1').css({'border':'1px solid #CCC'});
                $('#prices').css({'border':'1px solid #CCC'});
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
            }
            else {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid #CCC'});
                $('dp1').css({'border':'1px solid #CCC'});
                $('#prices').css({'border':'1px solid #CCC'});
                $('#seats').css({'border':'1px solid #CCC'});
            };
                
            return false;
        }
        else if (seats==null || seats=="") {
            $('#start').css({'border':'1px solid #CCC'});
            $('#end').css({'border':'1px solid #CCC'});
            $('dp1').css({'border':'1px solid #CCC'});
            $('#prices').css({'border':'1px solid #CCC'});
            if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                    return false;
                }
                else {
                    $('#start').css({'border':'1px solid #CCC'});
                    $('#end').css({'border':'1px solid #CCC'});
                    $('dp1').css({'border':'1px solid #CCC'});
                    $('#prices').css({'border':'1px solid #CCC'});
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
        }
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
						<form class="well" action="new.php" method="post" onsubmit="return validation();">
							<div class="directions">
								
								<label id="a" for="start">Відправляюсь з міста:</label>
								<input class="text-input" type="text" id="start" name="origin"/>
								<label id="b" for="end">Їду в місто:</label>
								<input class="text-input" type="text" id="end" name="destination"/>
							    <label>Відправлення</label><input type="text" class="text-input" id="dp1" name="date">
								<label>Ціна за місце: <input type="text" id="prices" class="text-input" placeholder="Введіть ціну..." name="price"></label>
                                <li id="seats" style="list-style-type:none;">
                                    <label>Вільних місць: <input id="seats_i" class="text-input" placeholder="Введіть кількість місць..." type="text" name="seats"></label>
                                </li>
								<div class="btn-group" data-toggle="buttons-radio">
                                    <button class="btn btn-info" id="idriver">Я-Водій</button>
                                    <button class="btn btn-success" id="ipassngr">Я-Пасажир</button>
                                </div>
                                <br>
								<div class="btn-group">
									<button class="btn btn-warning" id="build_route">Показати маршрут</button>
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