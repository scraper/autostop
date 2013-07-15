var ui = {
	init: function(config){
		this.config = config;
		this.date();
		this.whoIam();
		// this.initFB();
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
		
		this.config.driver_info.hide();
		this.config.seats.hide();
		this.config.nopost_buttons_2.click(function(e){
			e.preventDefault();
			seats.show('slow');
			seats_i.removeClass('validate-hidden').addClass('validate');
			type.val("Водій");
			driver_info.show('slow');
		});
		this.config.nopost_buttons_3.click(function(e){
			e.preventDefault();
			seats.hide('slow');
			seats_i.removeClass('validate').addClass('validate-hidden');
			type.val("Пасажир");
			driver_info.hide('slow');
		});
	},
	initFB: function() {
		FB.init({
			appId      : '430939383625961', // App ID from the App Dashboard
			channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File for x-domain communication
			status     : true, // check the login status upon init?
			cookie     : true, // set sessions cookies to allow your server to access the session?
			xfbml      : true  // parse XFBML tags on this page?
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
});