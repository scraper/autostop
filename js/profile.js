var profile = {
	init: function(config) {
		this.config = config;
		this.btn();
		// this.showUserDetailes();
		this.get_fb_id();
		this.vehicleInfo();
		this.initFB();
		this.ifAuthorized();
	},
	//prevent button from submit
	btn: function() {
		this.config.save_btn.click(function(e) {
			e.preventDefault();
		})
	},
	//show or hide vehicle_info div
	vehicleInfo: function() {
		var vehicle_info = this.config.vehicle_info;
		vehicle_info.hide();
		this.config.driver_1.click(function() {
			vehicle_info.show('slow');
		});
		this.config.driver_0.click(function() {
			vehicle_info.hide('slow');
		});
	},
	//initialize FB
	initFB: function() {
		FB.init({
			appId      : '430939383625961', // App ID from the App Dashboard
			channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File for x-domain communication
			status     : true, // check the login status upon init?
			cookie     : true, // set sessions cookies to allow your server to access the session?
			xfbml      : true  // parse XFBML tags on this page?
		});
	},

	get_fb_id: function() {
			//set FB.id cookie value
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

					}
					else {
						profile.showUserDetailes(c_id_value);
						profile.ifAuthorized(c_id_value);
					}
				};
	},
	//if user is authorized in FB enable or disable editing data
	ifAuthorized: function(fb_id) {
		var user_id = this.config.user_id.val();
		var save_btn = this.config.save_btn;
		var canDisable = this.config.canDisable;
		profile.showUserDetailes(fb_id);
		FB.getLoginStatus(function(response) {
			if(response.status === 'connected') {	
				console.log("connected");
				FB.api('/me', function(response) {
					console.log(response.id, user_id);
					if (response.id != user_id) {
						canDisable.prop('disabled', true);
						save_btn.hide();
					}
				});
			}
			else if(response.status === 'not_authorized') {
				console.log("FB not authorized");
				FB.api('/me', function(response) {
					console.log(response.id, user_id);
					if (response.id != user_id) {
						canDisable.prop('disabled', true);
						save_btn.hide();
					}
				});
			}
			else {
				console.log("FB please login");
				FB.api('/me', function(response) {
					console.log(response.id, user_id);
					if (response.id != user_id) {
						canDisable.prop('disabled', true);
						save_btn.hide();
					}
				});				
			};
		});
	},	
	//show user detailes
	showUserDetailes: function(fb_id) {
		//user_id hidden input new2.tmpl.php
		var user_id = this.config.user_id.val();
		//global FB.id variable
		var id = "";
		//if user logged in then fb_id will not be blank, else it is null and value is taken from url param
		if (fb_id == null || fb_id == "") {
			id = user_id;
		}
		else {
			id = fb_id;
		};
		var profile_legend = this.config.profile_legend;
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
		var vehicle_info = this.config.vehicle_info;
		$.ajax({
				url: './login.php',
				dataType: 'json',
				type: 'get',
				data: {id:id},
				success: function (data) {
					console.log(data);
					profile_legend.text(data.objA.name);
					if (data.objA.is_driver == "1") {
						driver_1.attr('checked', true);
						vehicle_info.show('slow');
					}
					else if (data.objA.is_driver == "0") {
						driver_0.attr('checked', true);
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
	},
	//save user detailes
	setUserDetailes: function(id,isDriver,vehicle,v_color,climat,experience,smoking,email,phone) {
		$.ajax({
				url: './profile.php',
				type: 'post',
				data: {
					id:id,
					isDriver:isDriver,
					vehicle:vehicle,
					v_color:v_color,
					climat:climat,
					experience:experience,
					smoking:smoking,
					email:email,
					phone:phone
				},
				success: function (data) {
					$('#myModal').modal({
						keyboard: true
					});
				}
			});
	}
};

profile.init({
	save_btn: $('#save_btn'),
	user_id: $('#user_id'),
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
	phone: $('#phone'),
	vehicle_info: $('#vehicle_info'),
	canDisable: $('.profile-page')
});
function saveUserDetailes() {
	FB.api('/me', function(response) {
		//profile.setUserDetailes(response.id);
		var id = response.id;
		var isDriver = $('input[name=isDriver]:checked', '#form').val();
		var vehicle = $('#vehicle').val();
		var v_color = $('#v_color').val();
		var climat = $('input[name=climat]:checked', '#form').val();
		var experience = $('#experience').val();
		var smoking = $('input[name=smoking]:checked', '#form').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		profile.setUserDetailes(id,isDriver,vehicle,v_color,climat,experience,smoking,email,phone);
	});
};
function getUserDetailes() {
	FB.api('/me', function(response) {
		profile.showUserDetailes(response.id);
	});
};