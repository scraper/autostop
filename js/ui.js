var ui = {
	init: function(config){
		this.config = config;
		this.styleIt();
		this.whoIam();
	},

	styleIt: function() {
		//initializing current date, datepicker and it's default value
		var today = new Date();
		var day = ('0' + today.getDate()).slice(-2);
		var month = (('0' + (today.getMonth()+1)).slice(-2));
		var year = today.getFullYear();
		var date = (year + '-' + month + '-' + day);
		this.config.date_input.attr('Value', date);
		this.config.date_input.datepicker({
				format: 'yyyy-mm-dd'});
		//works for advanced search dp2
		this.config.date_input2.attr('Value', date);
		this.config.date_input2.datepicker({
				format: 'yyyy-mm-dd'});
	},

	whoIam: function() {
		var seats = this.config.seats;
		var type = this.config.type;
		
		this.config.seats.hide();
		this.config.nopost_buttons_2.click(function(e){
			e.preventDefault();
			seats.show('slow');
			type.val("Водій");
		});
		this.config.nopost_buttons_3.click(function(e){
			e.preventDefault();
			seats.hide('slow');
			type.val("Пасажир");
		});
	}
};
//html elements initialization
ui.init({
	seats: $('#seats'),
	date_input: $('#dp1'),
	date_input2: $('#dp2'),
	nopost_buttons_2:$('#idriver'),
	nopost_buttons_3:$('#ipassngr'),
	type: $('#type')
});