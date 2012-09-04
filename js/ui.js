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

		this.config.nopost_buttons_1.click(function(e){e.preventDefault();});
		this.config.nopost_buttons_2.click(function(e){e.preventDefault();});
		this.config.nopost_buttons_3.click(function(e){e.preventDefault();});
	},

	whoIam: function() {
		var seats = this.config.seats;
		
		this.config.seats.hide();
		this.config.nopost_buttons_2.click(function(){
			seats.show('slow');
		});
		this.config.nopost_buttons_3.click(function(){
			seats.hide('slow');
		});
		$('#build_route').click(function(){if ('#seats_i'=='') {console.log("ERROR");}; });
	},

	validations: function() {
		var start = this.config.starts;
		var end = this.config.end;
		var date = this.config.date_input;
		var seats = this.config.seats;
		var prices = this.config.prices;

		var submit_btn = this.config.submit;
		this.config.submit.click(function(e){
			if (start==null || end==null || prices==null) {e.preventDefault();}
		});
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
	submit: $('#submit'),
	starts: $('#start'),
	end: $('#end'),
	prices: $('#prices'),
	seats: $('#seats'),
	date_input: $('#dp1'),
	buttons: $('button'),
	nopost_buttons_1: $('#build_route'),
	nopost_buttons_2:$('#idriver'),
	nopost_buttons_3:$('#ipassngr'),
	seats_lbl:$('#seats_l')
});