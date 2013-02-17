$(function() {
	$('#results').hide();
	$('#submit').click(function(e) {
		e.preventDefault();
		search_results_show();
	});
	
//Pushing results to typeahead (search input), search.php
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

//Push results to search_h (search input in header), any page
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

//Pushing results to the page from search_h (search input in header)
				var q = $('#q').val();
				if (q != "") { 
					$.ajax({
						url: './search/index.php',
						type: 'post',
						data: {query: q},
						dataType: "JSON",
						success: function(data) {
							$('#results').slideDown();
							$('.tbody').html('');
							$.each(data.objB, function(column, value) {
								$('.tbody').append('<tr class="tr" id="' + value['route_id'] + '"><td>' + value['s_city_id'] + '</td>' + '<td>' + value['e_city_id'] + '</td>' + '<td>' + value['date'] + '</td>' + '</tr>');
								//click function on the table row
								$('#'+value['route_id']+'.tr').click(function() {
									window.location = './route.php?q='+ $('#'+value['route_id']+'.tr').attr('id');
								});
							});
							console.log(data);
						}
					});
				};
}); //end of anonymous function
$('#search_ico').click(function() {
	$('#top_menu_search').submit();
});
//Pushing results to the page by selecting typeahead.item
$('.active').click(item_clicked());
function item_clicked() {
	$('#search').change(function(){
		$('.active').click(function() {
			$('#search').val($('.active').attr('data-value'));
			search_results_show();
		});
	});
};
//Pushing results to the page
$('#submit').click(search_results_show());
function search_results_show() {
			if ($('#search').val() != "") {
				console.log("not null");
				$.ajax({
					url: './search/index.php',
					type: 'post',
					data: {query: $('#search').val()},
					dataType: "JSON",
					success: function(data) {
						$('#results').slideDown();
						$('.tbody').html('');
						$.each(data.objB, function(column, value) {
							$('.tbody').append('<tr class="tr" id="' + value['route_id'] + '"><td>' + value['s_city_id'] + '</td><td>' + value['e_city_id'] + '</td><td>' + value['date'] + '</td></tr>');
							//click function on the table row
							$('#'+value['route_id']+'.tr').click(function() {
								window.location = './route.php?q=' + $('#'+value['route_id']+'.tr').attr('id'); 
							});
						});
						
						console.log(data);
					}
				});
			};
			
};