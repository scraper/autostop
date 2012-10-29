$(function() {
		$('#submit').click(function(e) {
			e.preventDefault();
			if ($('#search').val() != "") {
				console.log("not null");
				$.ajax({
					url: './search/index.php',
					type: 'post',
					data: {query: $('#search').val()},
					dataType: "JSON",
					success: function(data) {
						console.log(data);
						$('.result').html('');
						$.each(data.objB, function(column, value) {
							$('.result').append('<p><a href="./route.php?q='+ value['route_id'] + '">' + value['s_city_id'] + ' - ' + value['e_city_id'] + '</a>');
							console.log(value['s_city_id']);
						});
						console.log(data);
					}
				});
			};
		});

		$('#search').typeahead({
			source: function(query, process) {
				var arr = [];
				return $.ajax({
					url: './search/index.php',
					type: 'post',
					data: {query: $('#search').val()},
					dataType: "JSON",
					success: function(data) {
						//bootstrap typeahead does not know how to read JSON, so we push JSON items to JavaScript array
							
						$.each(data.objA, function(column, value){
							arr.push(value['s_city_id']);
								
						});
						console.log(arr);
						return process(arr);
					}
				});
			}
		});
	});