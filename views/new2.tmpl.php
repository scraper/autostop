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
<div class="container">
    <!-- <div class="row-fluid"> -->
    <form role="form">
		<div class="row">
			<div class="form-group col-xs-6 floating-label-form-group">
				<label for="origin">From</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="From" id="start" name="origin">
			</div>
			<div class="form-group col-xs-6 floating-label-form-group">
				<label for="dest">To</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="To" id="end" name="destiantion">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="date">Date</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Date" id="dp1" name="date">
			</div>
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="price">Price</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Price" id="prices" name="price">
			</div>
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="date">Seats</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Seats" id="seats_i" name="seats">
			</div>
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="date">Phone</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Phone" id="phone" name="phone">
			</div>
		</div>
		<div class="row driver_info">
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="vehicle">Vehicle</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Vehicle" id="vehicle" name="vehicle">
			</div>
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="v_color">Color</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Color" id="v_color" name="v_color">
			</div>
			<!-- <div class="form-group col-xs-3 floating-label-form-group">
				<label for="climat">Climat</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Climat" id="climat" name="climat">
			</div> -->
<!-- 			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="experience">Experience</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Experience" id="experience" name="experience">
			</div> -->
			<div class="form-group col-xs-3">
				<label class="checkbox-inline">
					<input type="checkbox" id="inlineCheckbox1" value="option1">Smoking
				</label>
				<label class="checkbox-inline">
					<input type="checkbox" id="inlineCheckbox1" value="option1">Climat
				</label>
			</div>
		</div>
		<div class="row general_info">	
			<!-- <div class="form-group col-xs-3 floating-label-form-group">
				<label for="smoking">Smoking</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Smoking" id="smoking" name="smoking">
			</div> -->
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="email">E-mail</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="E-mail" id="email" name="email">
			</div>
			
			<select class="col-xs-3 driver-info" id="experience" name="experience">
				<option value="менше 1 року">менше 1 року</option>
				<option value="1 рік">1 рік</option>
				<option value="2 роки">2 роки</option>
				<option value="3 роки">3 роки</option>
				<option value="4 роки">4 роки</option>
				<option value="5 років">5 років</option>
				<option value="більше 5 років">більше 5 років</option>
			</select>
<!-- 			<label class="radio-inline">
				<input id="smoking_0" type="radio" name="smoking" value="0">Не курю
				</label>
				<label class="radio inline">
				<input id="smoking_1" type="radio" name="smoking" value="1">Курю
			</label> -->
		</div>
	</form>
	<!-- </div> -->
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

        </div>

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

<script src="js/get_route.js"></script>
<script src="./bootstrap-3.2.0/js/bootstrap-datepicker.js"></script>
<script src="./js/ui.js"></script>
<script type="text/javascript" src="./js/validation2.js"></script>
<script type="text/javascript" src="./js/new_route.js"></script>
<!-- <script type="text/javascript" src="./js/profile.js"></script> -->
<script type="text/javascript" src="./js/search.js"></script>

<?php include '_partials/footer.php'; ?>