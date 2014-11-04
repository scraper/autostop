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

.clearable.onX{ cursor: pointer; }
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
<!-- 		</div>

		<div class="row"> -->
			<div class="waypoints">
				<!-- div float goup is added to fix the border-left issue -->
				<div class="first-float-group">
					<div class="form-group col-xs-6 floating-label-form-group input-append waypoint" id="waypoint_0" style="margin-left:0">
						<label id="0" for="waypoint0">Через 1:</label>
						<input class="form-control col-xs-12 clearable" type="text" id="waypoint0" name="waypoint_0" placeholder="Waypoint 1" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
						<span class="clearer glyphicon glyphicon-remove-circle form-control-feedback" style="top:15px"></span>
					</div>
					<div class="form-group col-xs-6 floating-label-form-group input-append waypoint" id="waypoint_1" style="margin-left:0">
						<label id="1" for="waypoint1">Через 2:</label>
						<input class="form-control col-xs-12 clearable" type="text" id="waypoint1" name="waypoint_1" placeholder="Waypoint 2" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
						<span class="clearer glyphicon glyphicon-remove-circle form-control-feedback" style="top:15px"></span>
					</div>
				</div>
				<div class="second-float-group">
					<div class="form-group col-xs-6 floating-label-form-group input-append waypoint" id="waypoint_2" style="margin-left:0">
						<label id="2" for="waypoint2">Через 3:</label>
						<input class="form-control col-xs-12 clearable" type="text" id="waypoint2" name="waypoint_2" placeholder="Waypoint 3" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
						<span class="clearer glyphicon glyphicon-remove-circle form-control-feedback" style="top:15px"></span>
					</div>
					<div class="form-group col-xs-6 floating-label-form-group input-append waypoint" id="waypoint_3" style="margin-left:0">
						<label id="3" for="waypoint3">Через 4:</label>
						<input class="form-control col-xs-12 clearable" type="text" id="waypoint3" name="waypoint_3" placeholder="Waypoint 4" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
						<span class="clearer glyphicon glyphicon-remove-circle form-control-feedback" style="top:15px"></span>
					</div>
				</div>
				<div class="third-float-group">
					<div class="form-group col-xs-6 floating-label-form-group input-append waypoint" id="waypoint_4" style="margin-left:0">
						<label id="4" for="waypoint4">Через 5:</label>
						<input class="form-control col-xs-12 clearable" type="text" id="waypoint4" name="waypoint_4" placeholder="Waypoint 5" onkeypress="calcRoute();" onchange="calcRoute();" onblur="calcRoute();" onfocus="calcRoute();"/>
						<span class="clearer glyphicon glyphicon-remove-circle form-control-feedback" style="top:15px"></span>
					</div>
				</div>
			</div>
			
			
		</div>
		

		<div class="row">
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="date">Date</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Date" id="dp1" name="date">
			</div>
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="price">Price</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="Price" id="prices" name="price" autocomplete="off">
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
			<div class="form-group col-xs-3 floating-label-form-group">
				<label for="email">E-mail</label>
				<input class="form-control col-xs-12 validate" type="text" placeholder="E-mail" id="email" name="email">
			</div>
			<div class="form-group col-xs-3 floating-label-form-group">
				<select id="experience" name="experience" style="width:100%;height:3.1em;border:none">
					<option value="" disabled selected>Experience...</option>
					<option value="менше 1 року">менше 1 року</option>
					<option value="1 рік">1 рік</option>
					<option value="2 роки">2 роки</option>
					<option value="3 роки">3 роки</option>
					<option value="4 роки">4 роки</option>
					<option value="5 років">5 років</option>
					<option value="більше 5 років">більше 5 років</option>
				</select>
			</div>
		</div>
		<div class="row general_info">	
			<div class="form-group col-xs-3">
				<br>
				<label>Smoking</label>
				<div class="btn-group btn-group-justified-sm">
					<div class="btn-group">
						<button type="button" id="yes_smoking" class="btn btn-default">Yes</button>
					</div>
					<div class="btn-group">
						<button type="button" id="no_smoking" class="btn btn-default">No</button>
					</div>
				</div>
			</div>

			<div class="form-group col-xs-3">
				<br>
				<label>Climat</label>
				<div class="btn-group btn-group-justified-sm">
					<div class="btn-group">
						<button type="button" id="yes_climat" class="btn btn-default">Yes</button>
					</div>
					<div class="btn-group">
						<button type="button" id="no_climat" class="btn btn-default">No</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<button class="btn btn-default btn-sm" id="add_waypts" title="Додати проміжний пункт">
		<span class="glyphicon glyphicon-plus"></span> Add Waypoint
	</button>
	<button class="btn btn-primary" id="submit_btn" rel="popover" data-placement="bottom" data-content="Ведіть обов'язкові поля">Додати маршрут</button>
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

							<div class="buttons">
								<div class="btn-group">
									<button class="btn btn-primary" id="submit_btn" rel="popover" data-placement="bottom" data-content="Ведіть обов'язкові поля">Додати маршрут</button>
								</div>
								<!-- <button class="btn" id="add_waypts" title="Додати проміжний пункт"><i class="icon-plus"></i></button> -->
							</div>
							<input id="route_user_id" name="fb_id" type="">
							<input id="type" name="type" type="" value="">
						</form>
					</div>
    			</div><!--/span-->
    		</div><!--/row-->

        </div>

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>
<script type="text/javascript">
	$(function() {
		//smoking toggle
		$('#yes_smoking').click(function(){
			$('#yes_smoking').removeClass('btn btn-default').addClass('btn btn-warning');
			$('#no_smoking').removeClass('btn btn-success').addClass('btn btn-default');
		});
		$('#no_smoking').click(function(){
			$('#no_smoking').removeClass('btn btn-default').addClass('btn btn-success');
			$('#yes_smoking').removeClass('btn btn-warning').addClass('btn btn-default');
		});

		//climat toggle
		$('#yes_climat').click(function(){
			$('#yes_climat').removeClass('btn btn-default').addClass('btn btn-primary');
			$('#no_climat').removeClass('btn btn-warning').addClass('btn btn-default');
		});
		$('#no_climat').click(function(){
			$('#no_climat').removeClass('btn btn-default').addClass('btn btn-warning');
			$('#yes_climat').removeClass('btn btn-primary').addClass('btn btn-default');
		});
	});


$('.clearable').keyup(function () {
  var t = $(this);
  t.next('span').toggle(Boolean(t.val()));
});

// $('.clearer').hide($(this).prev('input').val());

$('.clearer').click(function () {
  $(this).prev('input').val('').focus();
  $(this).hide();
  $(this).closest('div').hide();
});

</script>
<script src="js/get_route.js"></script>
<script src="./bootstrap-3.2.0/js/bootstrap-datepicker.js"></script>
<script src="./js/ui.js"></script>
<script type="text/javascript" src="./js/validation2.js"></script>
<script type="text/javascript" src="./js/new_route.js"></script>
<!-- <script type="text/javascript" src="./js/profile.js"></script> -->
<script type="text/javascript" src="./js/search.js"></script>

<?php include '_partials/footer.php'; ?>

<!-- <input type="text" class="span3" style="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;]"> -->