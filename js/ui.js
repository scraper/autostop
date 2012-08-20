var ui = {
	init: function(config){
		this.config = config;
		// this.writeConsole();
		this.styleIt();
		this.whoIam();
	},

	styleIt: function() {
		var today = new Date();
		var day = today.getDate();
		var month = today.getMonth()+1;
		var year = today.getFullYear();
		var date = (day + '-0' + month + '-' + year);
		this.config.date_input.attr('Value', date);
		this.config.date_input.datepicker({
				format: 'dd-mm-yyyy'});
		
		// this.config.text_inputs.uniform();
		this.config.buttons_c.click(function(e){e.preventDefault();});
	},

	whoIam: function() {
		var seats = this.config.seats;
		
		this.config.seats.hide();
		this.config.radio_passenger.click(function() {
			seats.hide('slow');
		});
		this.config.radio_driver.click(function() {
			seats.show('slow');
		});
		$('#build_route').click(function(){if ('#seats_i'=='') {console.log("ERROR");}; });
	},

	ifDriver: function() {

	},

	// writeConsole: function() {
	// 	this.config.ul.on('click', function(e){
	// 		// e.preventDefault();
	// 		console.log("OK");
	// 		calcRouteFromDB();
	// 	});	
	// }
};

ui.init({
	tab: $('#tabs'),
	// ul: $('a'),
	text_inputs: $('.text_input'),
	seats: $('#seats'),
	date_input: $('#dp1'),
	buttons: $('button'),
	buttons_c: $('#build_route')
});