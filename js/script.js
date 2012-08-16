var routes = {
	init: function( config ) {
		this.config = config;
		this.bindEvents();
	},
	
	bindEvents: function() {
		this.config.searchInput.on('keyup', this.fetchResult );
	},

	fetchResult: function() {
		var self = routes;
		
		$.ajax({
			url: 'index.php',
			type: 'POST',
			data: self.config.form.serialize(),
			dataType: 'json',
			success: function(results) {
				console.log(results);
			}
		});
	},
};

routes.init({
	searchInput: $('#search'),
	form: $('#search_form'),
	searchResultTemplate: $('#search_result').html(),
	searchResultList: $('ul.search')
});