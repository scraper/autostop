var ui = {
	init: function(config){
		this.config = config;
		// this.writeConsole();
		this.styleIt();
		this.whoIam();
	},

	styleIt: function() {
		this.config.date_input.datepicker({dateFormat:"yy-mm-dd"});
		this.config.date_input.datepicker("option","showAnim","slideDown");
		this.config.buttons.button();
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
	date_input: $('#date'),
	buttons: $('button'),
	buttons_c: $('#build_route')
});