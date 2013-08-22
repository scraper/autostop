var route = {
	//initialization of the functions
	init: function(config) {
		this.config = config;
		this.get_route_detailes();
		this.hide_driver_info();
	},
	//
	hide_driver_info: function() {
		this.config.driverClass.hide();
	},

	//get and show route detailes
	get_route_detailes: function() {
		var user_id = this.config.user_id;
		var start = this.config.start;
		var end = this.config.end;
		var date = this.config.date;
		var price = this.config.price;
		var seats = this.config.seats;
		var type = this.config.type;
		var name = this.config.name;
		var phone = this.config.phone;
		var email = this.config.email;
		var vehicle = this.config.vehicle;
		var v_color = this.config.v_color;
		var climat = this.config.climat;
		var experience = this.config.experience;
		var smoking = this.config.smoking;
		var loader = this.config.loader;
		
		var driverClass = this.config.driverClass;
		var nameClass = this.config.nameClass;
		var q = getUrlParam.init("q");

		$.ajax({
				url: '/route/index.php',
				type: 'get',
				data: {q:q},
				beforeSend: function() {
					loader.show();
				},
				complete: function() {
					loader.hide();
				},
				success: function (data) {
					console.log(data);

					start.text(data.objA.s_city_id);
					end.text(data.objA.e_city_id);
					price.text(data.objA.price);
					date.text(data.objA.date);
					// type.text(data.objA.type);
					phone.text(data.objA.phone);
					// email.text(data.objA.email);
					//if route is driver
					if (data.objA.type == "1" || data.objA.type == "Водій") {
						type.text('Водій');
						//if user is registered show #name
						if (data.objA.user_id != null && data.objA.user_id != "") {
							name.text(data.objA.name);
						}
						//if user is unregistered hide #name
						else if (data.objA.user_id == null || data.objA.user_id == "") {
							nameClass.hide();
						};
						driverClass.show();
						seats.text(data.objA.seats);
						if (data.objA.email != null && data.objA.email != "") {
							email.text(data.objA.email);
						}
						else {
							email.text("н/д");
						};
						vehicle.text(data.objA.vehicle);
						v_color.text(data.objA.v_color);
						if (data.objA.climat == "1") {
							climat.text("Так");
						}
						else if (data.objA.climat == "0") {
							climat.text("Ні");
						};
						experience.text(data.objA.experience);
						if (data.objA.smoking == "1") {
							smoking.text("Так");
						}
						else if (data.objA.smoking == "0") {
							smoking.text("Ні");
						};
						user_id.text(data.objA.user_id);
					}
					//if user is passenger
					else if (data.objA.type == "0" || data.objA.type == "Пасажир") {
						type.text('Пасажир');
						//if user is registered show #name
						if (data.objA.user_id != null && data.objA.user_id != "") {
							name.text(data.objA.name);
						}
						//if user is unregistered hide #name
						else if (data.objA.user_id == null || data.objA.user_id == "") {
							nameClass.hide();
						};
						if (data.objA.smoking == "1") {
							smoking.text("Так");
						}
						else if (data.objA.smoking == "0") {
							smoking.text("Ні");
						};
						if (data.objA.email != null && data.objA.email != "") {
							email.text(data.objA.email);
						}
						else {
							email.text("н/д");
						};
					}
				}
			});
	}
};
route.init({
//dom elements declaration
start: $('#start'),
end: $('#end'),
date: $('#date'),
price: $('#price'),
seats: $('#seats'),
type: $('#type'),
name: $('#name'),
phone: $('#phone'),
email: $('#email'),
vehicle: $('#vehicle'),
v_color: $('#v_color'),
climat: $('#climat'),
experience: $('#experience'),
smoking: $('#smoking'),
loader: $('#loader'),

user_id: $('#user_id'),
//driver class for hiding if route is passenger
driverClass: $('.driver'),
nameClass: $('.name')
});