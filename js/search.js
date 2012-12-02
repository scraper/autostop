//Pushing results to the page
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
							$('.result').append('<p><a href="./route.php?q='+ value['route_id'] + '">' + value['s_city_id'] + ' - ' + value['e_city_id'] + ', ' + value['date'] + '</a>');
							console.log(value['s_city_id']);
						});
						console.log(data);
					}
				});
			};
		});
//Pushing results to typeahead (search input)
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

//Push results to search_h (search input in header)
		$('#search_h').typeahead({
			source: function(query, process) {
				var arr = [];
				return $.ajax({
					url: './search/index.php',
					type: 'post',
					data: {query: $('#search_h').val()},
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

//Pushing results to the page from search_h (search input in header)
$(function() {
				var q = $('#q').val();
				if (q != "") { 
					$.ajax({
						url: './search/index.php',
						type: 'post',
						data: {query: q},
						dataType: "JSON",
						success: function(data) {
							console.log(data);
							$('.result').html('');
							$.each(data.objB, function(column, value) {
								$('.tbody').append('<tr class="tr">' + '<td>' + value['s_city_id'] + '</td>' + '<td>' + value['e_city_id'] + '</td>' + '<td>' + value['date'] + '</td>' + '</tr>');
								//click function on the table row
								$('.tr').click(function() {
									window.location = './route.php?q='+ value['route_id'];
								});
							});
							console.log(data);
						}
					});
				};
				return false;	
			});