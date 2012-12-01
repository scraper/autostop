<?php include '_partials/header.php'; ?>

<script type="text/javascript" src="./js/search.js"></script>
<style type="text/css">
.span7 {
    -webkit-box-shadow: 0 8px 6px -6px black;
       -moz-box-shadow: 0 8px 6px -6px black;
            box-shadow: 0 8px 6px -6px black;
}
</style>

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
    	<div class="span12">
    		<div class="row-fluid">
    			<div class="span7">
    				<legend>Карта</legend>
    				<div id="map" style="width:100%;height:400px;"></div>
    			</div><!--/span-->
    			<div class="span4">
    				<legend>Маршрут</legend>
    				<div id="controls">
						<form class="well" action="new.php" method="post" onsubmit="return validation();">
							<div class="directions">
								
								<label id="a" for="start">Відправляюсь з міста:</label>
								<input class="span12" type="text" id="start" name="origin" onblur="calcRoute();"/>
								<label id="b" for="end">Їду в місто:</label>
								<input class="span12" type="text" id="end" name="destination" onblur="calcRoute();"/>
							    <label for="date">Відправлення</label>
                                <input class="span12" type="text" id="dp1" name="date">
								<label for="prices">Ціна за місце:</label>
                                <input class="span12" type="text" id="prices" placeholder="Введіть ціну..." name="price">
                                <li id="seats" style="list-style-type:none;">
                                <label for="seats_i">Вільних місць:</label>
                                <input class="span12" id="seats_i" placeholder="Введіть кількість місць..." type="text" name="seats">
                                </li>
								<div class="btn-group" data-toggle="buttons-radio">
                                    <button class="btn btn-info" id="idriver">Я-Водій</button>
                                    <button class="btn btn-success" id="ipassngr">Я-Пасажир</button>
                                </div>
                                <p></p>
								<div class="btn-group">
									<!-- <button class="btn btn-warning" id="build_route">Показати маршрут</button> -->
									<button class="btn btn-primary" id="submit" type="submit"  rel="popover" data-placement="bottom" data-content="Ведіть обов'язкові поля">Додати маршрут</button>
								</div>
							</div>
						</form>
					</div>
    			</div><!--/span-->
    		</div><!--/row-->
       		<br>
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
        </div><!--/span-->

    </div><!--/row-->

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

</div><!--/.fluid-container-->

<script src="js/get_route.js"></script>

<?php include '_partials/footer.php'; ?>