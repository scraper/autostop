var ui = {
	init: function(config){
		this.config = config;
		this.createTabs();
		// this.writeConsole();
		this.styleIt();
		this.whoIam();
	},

	createTabs: function() {
		this.config.tab.tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				}
			}
		});
	},

	styleIt: function() {
		this.config.date_input.datepicker({dateFormat:"yy-mm-dd"});
		this.config.date_input.datepicker("option","showAnim","slideDown");
		this.config.buttons.button();
		this.config.radio_inputs.uniform();
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
	radio_inputs: $('.radio_input'),
	radio_driver: $('#driver'),
	radio_passenger: $('#passenger'),
	seats: $('#seats'),
	date_input: $('#date'),
	buttons: $('button'),
	buttons_c: $('#build_route')
});