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
		this.config.span4_img.hide();
		$.ajax({
				url: '/search/index.php',
				type: 'post',
				data: {},
				dataType: "JSON",
				success: function (data) {
					$('.tbody').html('');
					$.each(data.objC, function(column,value) {
						s_city_id = value['s_city_id'];
						e_city_id = value['e_city_id'];
						s_city_id = s_city_id.substring(0, s_city_id.indexOf(','));
						e_city_id = e_city_id.substring(0, e_city_id.indexOf(','));
						if (value['type'] === "0") {
							$('.tbody').append('<tr class="tr" id="' + value['route_id'] + '"><td>' + s_city_id + '</td><td>' + e_city_id + '</td><td><img title="Пасажир" src="/glyphicons_free/glyphicons/png/glyphicons_003_user.png"></td></tr>');	
						}
						else if (value['type'] === "1") {
							$('.tbody').append('<tr class="tr" id="' + value['route_id'] + '"><td>' + s_city_id + '</td><td>' + e_city_id + '</td><td><img title="Водій" src="/glyphicons_free/glyphicons/png/glyphicons_005_car.png"></td></tr>');
						};
						//click function on the table row
						$('#'+value['route_id']+'.tr').click(function() {
							window.location = './route.php?q=' + $('#'+value['route_id']+'.tr').attr('id'); 
						});
					});
				}
			});
	}
};
tops.init({
	start: $('#start'),
	end: $('#end'),
	type: $('#type'),
	span4_img: $('#span4_img')
});