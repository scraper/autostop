var tops = {
	//initialization of the functions
	init: function(config) {
		this.config = config;
		this.show_top_routes();
	},
	//show top 10 last routes
	show_top_routes: function() {
		var start = this.config.start;
		var end = this.config.end;
		var type = this.config.type;
		$.ajax({
				url: '/search/index.php',
				type: 'post',
				data: {},
				dataType: "JSON",
				success: function (data) {
					console.log(data);
					$.each(data.objC, function(column,value) {
						s_city_id = value['s_city_id'];
						e_city_id = value['e_city_id'];
						s_city_id = s_city_id.substring(0, s_city_id.indexOf(','));
						e_city_id = e_city_id.substring(0, e_city_id.indexOf(','));
						$('.tbody').append('<tr class="tr" id="' + value['route_id'] + '"><td>' + s_city_id + '</td><td>' + e_city_id + '</td><td>' + value['type'] + '</td></tr>');
					});
				}
			});
	}
};
tops.init({
	start: $('#start'),
	end: $('#end'),
	type: $('#type')
});