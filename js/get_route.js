var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;
		var geocoder;
		var markersArray = [];

		function initialize() {
		  directionsDisplay = new google.maps.DirectionsRenderer();
		  geocoder = new google.maps.Geocoder();
		  var kyiv = new google.maps.LatLng(50.450099,30.52341);
		  var myOptions = {
		    zoom:5,
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    center: kyiv
		  }
		  map = new google.maps.Map($("#map")[0], myOptions);
		  directionsDisplay.setMap(map);
		}

		function loadScript() {
			var script = document.createElement("script");
			script.type = "text/javascript";
			script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyDN8CZL6PryCYP8ZnXUnPu3CzgR1lOjMho&sensor=false&libraries=places&callback=initialize";
			document.body.appendChild(script);
		}

		function calcRoute() {
		  var start = document.getElementById("start").value;
		  var end = document.getElementById("end").value;
		  var waypts = [];

		  for (var i=0;i<=4;i++) {
		  	if (document.getElementById("waypoint"+i).value != "") {
			  	waypts.push({
			  		location:document.getElementById("waypoint"+i).value,
			  		stopover:true
			  	});
			  	console.log(waypts);
		  	}
		  	else if (document.getElementById("waypoint"+i) == "") {
		  		waypts.splice(i-1,1);
		  	}
		  };
		  
		  var request = {
		    origin:start,
		    destination:end,
		    waypoints: waypts,
		    optimizeWaypoints: true,
		    travelMode: google.maps.TravelMode.DRIVING
		  };
		  directionsService.route(request, function(result, status) {
		    if (status == google.maps.DirectionsStatus.OK) {
		      directionsDisplay.setDirections(result);
		    }
		  });
		}

		function codeAddress() {
			deleteOverlays();
    		var address = document.getElementById("search").value;
    		geocoder.geocode( { 'address': address, 'region': 'uk' }, function(results, status) {
	     		if (status == google.maps.GeocoderStatus.OK) {
	        		map.setCenter(results[0].geometry.location);
	        		var marker = new google.maps.Marker({
	            	map: map,
	            	position: results[0].geometry.location
	        	});
	        		markersArray.push(marker);
	      		} else {
	        		console.log("Geocode was not successful for the following reason: " + status);
	      		}
    		});
		}

		function deleteOverlays() {
  			if (markersArray) {
    			for (i in markersArray) {
      				markersArray[i].setMap(null);
    			}
    			markersArray.length = 0;
  			}
		}
		
		var input = document.getElementById("start");
			var options = {
				types: ['(cities)']
			};

			autocomplete = new google.maps.places.Autocomplete(input, options);

		var input = document.getElementById("end");
			var options = {
				types: ['(cities)']
			};

			autocomplete = new google.maps.places.Autocomplete(input, options);
		
		var input = document.getElementById("waypoint0");
			var options = {
				types: ['(cities)']
			};
			autocomplete = new google.maps.places.Autocomplete(input, options);

		var input = document.getElementById("waypoint1");
			var options = {
				types: ['(cities)']
			};
			autocomplete = new google.maps.places.Autocomplete(input, options);

		var input = document.getElementById("waypoint2");
			var options = {
				types: ['(cities)']
			};
			autocomplete = new google.maps.places.Autocomplete(input, options);

		var input = document.getElementById("waypoint3");
			var options = {
				types: ['(cities)']
			};
			autocomplete = new google.maps.places.Autocomplete(input, options);

		var input = document.getElementById("waypoint4");
			var options = {
				types: ['(cities)']
			};
			autocomplete = new google.maps.places.Autocomplete(input, options);
		
// build_route.onclick = calcRoute;
// $('#start').on('change', calcRoute);
// $('#end').on('change', calcRoute);