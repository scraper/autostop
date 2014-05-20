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
                                <button class="btn" id="add_waypts" title="Додати проміжний пункт"><i class="icon-plus"></i></button>
								<label id="a" for="start">Відправляюсь з міста:</label>
								<input class="span12 validate" type="text" id="start" name="origin" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
                                <div class="waypoints">
                                    <div class="span12 input-append waypoint" id="waypoint_0" style="margin-left:0">
                                        <label id="0" for="waypoint0">Через 1:</label>
                                        <input class="span12" type="text" id="waypoint0" name="waypoint_0" style="width:376px;" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
                                        <button id="rem0" class="btn remove" type="button"><i class="icon-minus"></i></button>
                                    </div>
                                    <div class="span12 input-append waypoint" id="waypoint_1" style="margin-left:0">
                                        <label id="1" for="waypoint1">Через 2:</label>
                                        <input class="span12" type="text" id="waypoint1" name="waypoint_1" style="width:376px;" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
                                        <button id="rem1" class="btn remove" type="button"><i class="icon-minus"></i></button>
                                    </div>
                                    <div class="span12 input-append waypoint" id="waypoint_2" style="margin-left:0">
                                        <label id="2" for="waypoint2">Через 3:</label>
                                        <input class="span12" type="text" id="waypoint2" name="waypoint_2" style="width:376px;" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
                                        <button id="rem2" class="btn remove" type="button"><i class="icon-minus"></i></button>
                                    </div>
                                    <div class="span12 input-append waypoint" id="waypoint_3" style="margin-left:0">
                                        <label id="3" for="waypoint3">Через 4:</label>
                                        <input class="span12" type="text" id="waypoint3" name="waypoint_3" style="width:376px;" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
                                        <button id="rem3" class="btn remove" type="button"><i class="icon-minus"></i></button>
                                    </div>
                                    <div class="span12 input-append waypoint" id="waypoint_4" style="margin-left:0">
                                        <label id="4" for="waypoint4">Через 5:</label>
                                        <input class="span12" type="text" id="waypoint4" name="waypoint_4" style="width:376px;" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
                                        <button id="rem4" class="btn remove" type="button"><i class="icon-minus"></i></button>
                                    </div>
                                </div>
                                <label id="b" for="end">Їду в місто:</label>
								<input class="span12 validate" type="text" id="end" name="destination" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
							    <label for="date">Відправлення</label>
                                <input class="span12 validate" type="text" id="dp1" name="date" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();">
								<label for="prices">Ціна за місце:</label>
                                <input class="span12 validate" type="text" id="prices" placeholder="Введіть ціну..." name="price" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();">
                                <li id="seats" style="list-style-type:none;">
                                <label id="seats_label" for="seats_i">Вільних місць:</label>
                                <input class="span12 validate" id="seats_i" placeholder="Введіть кількість місць..." type="text" name="seats">
                                </li>

							</div>
                            <div class="driver_info">
                                <label id="label_vehicle" for="vehicle">Авто (марка, модель):</label>
                                <input class="span12 driver-info" type="text" id="vehicle" name="vehicle"/>
                                    
                                <label id="label_v_color" for="v_color">Колір:</label>
                                <input class="span12  driver-info" type="text" id="v_color" name="v_color"/>
                                    
                                <label class="radio inline">
                                    <input id="climat_1" type="radio" name="climat" value="1">Клімат контроль/кондиціонер
                                </label>
                                
                                <label class="radio inline">
                                    <input id="climat_0" type="radio" name="climat" value="0">Немає кондиціонеру
                                </label>

                                <label id="label_experience" for="experience">Стаж водіння:</label>
                                <!-- <input class="span5" type="text" id="experience" name="experience"/> -->
                                <select class="span12  driver-info" id="experience" name="experience">
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
                                <!-- <label id="label_languages" for="languages">Володіння мовами:</label>
                                <input class="span12" type="text" id="languages" name="languages"/> -->
                            </div>
                            <div class="buttons">
                                <div class="btn-group">
                                    <button class="btn btn-primary" id="submit_btn" rel="popover" data-placement="bottom" data-content="Ведіть обов'язкові поля">Додати маршрут</button>
                                </div>
                            </div>
                            <input id="route_user_id" name="fb_id" type="hidden">
                            <input id="type" name="type" type="hidden" value="">
						</form>
					</div>
    			</div><!--/span-->
    		</div><!--/row-->
       		<br>

        </div><!--/span-->

    </div><!--/row-->

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

</div><!--/.fluid-container-->

<script src="js/get_route.js"></script>
<script src="./bootstrap/assets/js/bootstrap-datepicker.js"></script>
<script src="./js/ui.js"></script>
<script type="text/javascript" src="./js/validation2.js"></script>
<script type="text/javascript" src="./js/new_route.js"></script>
<!-- <script type="text/javascript" src="./js/profile.js"></script> -->
<script type="text/javascript" src="./js/search.js"></script>

<?php include '_partials/footer.php'; ?>