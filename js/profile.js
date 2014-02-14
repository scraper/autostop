var profile = {
	init: function(config) {
		this.config = config;
		this.btn();
		this.redirect();
		this.showUserDetailes();
		this.vehicleInfo();
	},
	//prevent button from submit
	btn: function() {
		this.config.save_btn.click(function(e) {
			e.preventDefault();
		});
		this.config.showUserRoutes.click(function(e) {
			window.location.href = '/search.php?uid=' + getUrlParam.init('id');
		});
	},
	//redirect to register if there is no id in url
	redirect: function() {
		if (getUrlParam.init('id') == "" || getUrlParam.init('id') == null) {
			window.location.href = '/register';
		}
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
	//build url for facebook picture of the user
	showUserPicture: function(fb_id) {
		var pictureUrl = "https://graph.facebook.com/" + fb_id + "/picture?width=200&height=200";
		$('#picture').attr('src', pictureUrl);
	},
	//show user detailes
	showUserDetailes: function(fb_id) {
		//user_id hidden input new2.tmpl.php
		var user_id = getUrlParam.init('id');
		//global FB.id variable
		var id = "";
		//if user logged in then fb_id will not be blank, else it is null and value is taken from url param
		if (fb_id == null || fb_id == "" || fb_id != getUrlParam.init('id')) {
			id = user_id;
		}
		else {
			id = fb_id;
		};
		console.log(id);
		var profile_legend = this.config.profile_legend;
		var driver = this.config.driver;
		var vehicle = this.config.vehicle;
		var v_color = this.config.v_color;
		var climat = this.config.climat;
		var experience = this.config.experience;
		var smoking = this.config.smoking;
		var email = this.config.email;
		var phone = this.config.phone;
		var vehicle_info = this.config.vehicle_info;
		var loader = this.config.loader;
		$.ajax({
				url: '/login.php',
				dataType: 'json',
				type: 'get',
				data: {id:id},
				beforeSend: function() {
					loader.show();
				},
				complete: function() {
					loader.hide();
				},				
				success: function (data) {
					console.log(data);
					profile.showUserPicture(getUrlParam.init('id'));
					profile_legend.text(data.objA.name);
					if (data.objA.is_driver == "1") {
						driver.text('Водій');
						vehicle_info.show('slow');
					}
					else if (data.objA.is_driver == "0") {
						driver.text('Пасажир');
					};
					vehicle.text(data.objA.vehicle);
					v_color.text(data.objA.v_color);
					if (data.objA.climat == "1") {
						climat.text('Так');
					}
					else if (data.objA.climat == "0") {
						climat.text('Ні');
					};
					experience.text(data.objA.experience);
					if (data.objA.smoking == "0") {
						smoking.text('Ні');
					}
					else if (data.objA.smoking == "1") {
						smoking.text('Так');
					};
					email.text(data.objA.email);
					phone.text(data.objA.phone);
				}
		});		
	}
};

profile.init({
	save_btn: $('#save_btn'),
	showUserRoutes: $('#showUserRoutes'),
	profile_legend: $('#profile_legend'),
	driver: $('#driver'),
	vehicle: $('#vehicle'),
	v_color: $('#v_color'),
	climat: $('#climat'),
	experience: $('#experience'),
	smoking: $('#smoking'),
	email: $('#email'),
	phone: $('#phone'),
	vehicle_info: $('#vehicle_info'),
	loader: $('#loader')
});