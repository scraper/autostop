var ui = {
	init: function(config){
		this.config = config;
		this.date();
		this.whoIam();
		// this.initFB();
		// this.login();
		this.get_fb_id();
		// this.showUserDetailes();
	},

	date: function() {
		//initializing current date, datepicker and it's default value
		var today = new Date();
		var day = ('0' + today.getDate()).slice(-2);
		var month = (('0' + (today.getMonth()+1)).slice(-2));
		var year = today.getFullYear();
		var date = (year + '-' + month + '-' + day);
		this.config.date_input.attr('Value', date);
		this.config.date_input.datepicker({
				format: 'yyyy-mm-dd'});
	},

	whoIam: function() {
		var seats = this.config.seats;
		var seats_i = this.config.seats_i;
		var type = this.config.type;
		var driver_info = this.config.driver_info;
		var driver_info_inputs = this.config.driver_info_inputs;
		
		this.config.driver_info.hide();
		this.config.seats.hide();
		this.config.nopost_buttons_2.click(function(e){
			e.preventDefault();
			seats.show('slow');
			seats_i.removeClass('validate-hidden').addClass('validate');
			type.val("1");
			driver_info.show('slow');
			driver_info_inputs.addClass('validate');
		});
		this.config.nopost_buttons_3.click(function(e){
			e.preventDefault();
			seats.hide('slow');
			seats_i.removeClass('validate').addClass('validate-hidden');
			type.val("0");
			driver_info.hide('slow');
			driver_info_inputs.removeClass('validate');
		});
	},

	get_fb_id: function() {
			//set FB.id cookie value
				var user_id = this.config.user_id;
				var c_id = "fb_id";
				var c_id_value = document.cookie;
				//calculating chars to the c_name in cookie
				var c_id_start = c_id_value.indexOf(" " + c_id + "=");
				//check if cookie user_id exists
				if (c_id_start == -1) {
					c_id_start = c_id_value.indexOf(c_id + "=");
					//if c_name cookie does not exist then create it with parameters 
					document.cookie = "fb_id=" + ";domain=.gokit.tk;path=/";
				}
				if (c_id_start == -1) {
					c_id_value = null;
					//if c_name cookie does not exist then create it with parameters
					document.cookie = "fb_id=" + ";domain=.gokit.tk;path=/";
				}
				//if c_name cookie exists
				else {
					//calculate length of the value of the c_name cookie
					c_id_start = c_id_value.indexOf("=", c_id_start) + 1;
					var c_id_end = c_id_value.indexOf(";", c_id_start);
					if (c_id_end == -1) {
						c_id_end = c_id_value.length;
					}
					//get the c_name cookie value
					c_id_value = unescape(c_id_value.substring(c_id_start,c_id_end));
					//if c_name cookie value equals 0 get user name from FB.api
					if (c_id_value.length == 0) {
						// FB.api('/me', function(response) {
						// 	document.cookie = "fb_id=" + response.id + ";domain=.gokit.tk;path=/";
						// });
					}
					else {
						window.location.hash = c_id_value;
						ui.showUserDetailes(c_id_value, './login.php');
						user_id.val(c_id_value);
					}
				};
	},

	showUserDetailes: function(fb_id, url) {
		// var user_id = this.config.user_id.val();
		var driver_info = this.config.driver_info;
		var driver_1 = this.config.driver_1;
		var driver_0 = this.config.driver_0;
		var vehicle = this.config.vehicle;
		var v_color = this.config.v_color;
		var has_climat = this.config.has_climat;
		var no_climat = this.config.no_climat;
		var experience = this.config.experience;
		var is_smoking = this.config.is_smoking;
		var no_smoking = this.config.no_smoking;
		var email = this.config.email;
		var phone = this.config.phone;
		$.ajax({
				url: url,
				dataType: 'json',
				type: 'get',
				data: {id:fb_id},
				success: function (data) {
					console.log(data);
					
					if (data.objA.is_driver == "1") {
						// driver_1.attr('checked', true);
						driver_info.show('slow');
					}
					else if (data.objA.is_driver == "0") {
						// driver_0.attr('checked', true);
					};
					vehicle.val(data.objA.vehicle);
					v_color.val(data.objA.v_color);
					if (data.objA.climat == "1") {
						has_climat.attr('checked', true);
					}
					else if (data.objA.climat == "0") {
						no_climat.attr('checked', true);
					};
					experience.val(data.objA.experience);
					if (data.objA.smoking == "0") {
						no_smoking.attr('checked', true);
					}
					else if (data.objA.smoking == "1") {
						is_smoking.attr('checked', true);
					};
					email.val(data.objA.email);
					phone.val(data.objA.phone);
				}
		});		
	}
};
//html elements initialization
ui.init({
	seats: $('#seats'),
	seats_i: $('#seats_i'),
	date_input: $('#dp1'),
	nopost_buttons_2:$('#idriver'),
	nopost_buttons_3:$('#ipassngr'),
	type: $('#type'),
	driver_info: $('.driver_info'),
	driver_info_inputs: $('.driver-info'),

	user_id: $('#route_user_id'),
	profile_legend: $('#profile_legend'),
	driver_1: $('#driver_1'),
	driver_0: $('#driver_0'),
	vehicle: $('#vehicle'),
	v_color: $('#v_color'),
	has_climat: $('#climat_1'),
	no_climat: $('#climat_0'),
	experience: $('#experience'),
	is_smoking: $('#smoking_1'),
	no_smoking: $('#smoking_0'),
	email: $('#email'),
	phone: $('#phone')
});