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
    			</div><!--/span-->
    			<div class="span5">
    				<legend>Маршрут</legend>
    				<div id="controls">
						<form class="well" action="new.php" id="route_form" method="post">
							<div class="directions">
								<div class="btn-group" data-toggle="buttons-radio">
                                    <button class="btn btn-info" id="idriver">Я-Водій</button>
                                    <button class="btn btn-success" id="ipassngr">Я-Пасажир</button>
                                </div>
								<label id="a" for="start">Відправляюсь з міста:</label>
								<input class="span12 validate" type="text" id="start" name="origin" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
								<label id="b" for="end">Їду в місто:</label>
								<input class="span12 validate" type="text" id="end" name="destination" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
							    <label for="date">Відправлення</label>
                                <input class="span12 validate" type="text" id="dp1" name="date" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();">
								<label for="prices">Ціна за місце:</label>
                                <input class="span12 validate" type="text" id="prices" placeholder="Введіть ціну..." name="price" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();">
                                <li id="seats" style="list-style-type:none;">
                                <label for="seats_i">Вільних місць:</label>
                                <input class="span12 validate-hidden" id="seats_i" placeholder="Введіть кількість місць..." type="text" name="seats">
                                </li>

                                <input type="hidden" id="type" name="type" value="">

							</div>
                            <div class="driver_info">
                                <label id="label_vehicle" for="vehicle">Авто (марка, модель):</label>
                                <input class="span12" type="text" id="vehicle" name="vehicle"/>
                                    
                                <label id="label_v_color" for="v_color">Колір:</label>
                                <input class="span12" type="text" id="v_color" name="v_color"/>
                                    
                                <label class="radio inline">
                                    <input id="climat_1" type="radio" name="climat" value="1">Клімат контроль/кондиціонер
                                </label>
                                
                                <label class="radio inline">
                                    <input id="climat_0" type="radio" name="climat" value="0">Немає кондиціонеру
                                </label>

                                <label id="label_experience" for="experience">Стаж водіння:</label>
                                <!-- <input class="span5" type="text" id="experience" name="experience"/> -->
                                <select class="span12" id="experience">
                                    <option value="менше 1 року">менше 1 року</option>
                                    <option value="1 рік">1 рік</option>
                                    <option value="2 роки">2 роки</option>
                                    <option value="3 роки">3 роки</option>
                                    <option value="4 роки">4 роки</option>
                                    <option value="5 років">5 років</option>
                                    <option value="більше 5 років">більше 5 років</option>
                                </select>
                            </div>
                            <div class="general_info">
                                <label class="radio inline">
                                    <input id="smoking_0" type="radio" name="smoking" value="0">Не курю
                                </label>

                                <label class="radio inline">
                                    <input id="smoking_1" type="radio" name="smoking" value="1">Курю
                                </label>
                                <label id="label_email" for="email">E-mail:</label>
                                <input class="span12" type="text" id="email" name="email"/>
                                <label id="label_phone" for="phone">Телефон:</label>
                                <input class="span12 validate" type="text" id="phone" name="phone"/>
                                <label id="label_languages" for="languages">Володіння мовами:</label>
                                <input class="span12" type="text" id="languages" name="languages"/>
                            </div>
                            <div class="buttons">
                                <div class="btn-group">
                                    <button class="btn btn-primary" id="submit_btn" rel="popover" data-placement="bottom" data-content="Ведіть обов'язкові поля">Додати маршрут</button>
                                </div>
                            </div>
						</form>
					</div>
                    <input id="user_id" type="" value="<?php echo ($id=$_GET['id']);?>">
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
<script type="text/javascript" src="js/validation2.js"></script>
<script type="text/javascript" src="./js/profile.js"></script>
<script type="text/javascript" src="./js/search.js"></script>

<?php include '_partials/footer.php'; ?>