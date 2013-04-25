$(function() {
	$('#results').hide();
	$('#notfound').hide();
	$('#search_btn').click(function(e) {
		if ($('#advanced_btn').attr('class') == 'btn btn-info active') {
			e.preventDefault();
			isAdvanced();
			advanced_results_show();
			console.log("advanced_results_show");
		}
		else{
			e.preventDefault();
			search_results_show();
			console.log("search_results_show");
		}
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
}); //end of anonymous function

//Pushing results to the page by selecting search.typeahead item, search.php
$('.active').click(item_clicked());
function item_clicked() {
	$('#search').change(function(){
		$('#notfound').hide();
		$('.active').click(function() {
			$('#search').val($('ul.typeahead.dropdown-menu li.active').attr('data-value'));
			search_results_show();
			console.log("click");
		});
	});
};

//Pushing results to the page
function search_results_show() {
			if ($('#search').val() != "") {
				$('#q').val("");
				console.log("not null");
				$.ajax({
					url: './search/index.php',
					type: 'post',
					data: {query: $('#search').val()},
					dataType: "JSON",
					success: function(data) {
						
						$('.tbody').html('');
						if (data.objB.length > 0) {
							$('#notfound').hide();
							$.each(data.objB, function(column, value) {
								$('.tbody').append('<tr class="tr" id="' + value['route_id'] + '"><td>' + value['s_city_id'] + '</td><td>' + value['e_city_id'] + '</td><td>' + value['date'] + '</td></tr>');
								//click function on the table row
								$('#'+value['route_id']+'.tr').click(function() {
									window.location = './route.php?q=' + $('#'+value['route_id']+'.tr').attr('id'); 
								});
								$('#results').slideDown();
							});
						}
						else {
							$('#results').hide();
							$('#notfound').slideDown();
						};
						console.log(data);
					}
				});
			};
			
};

//isAdvanced parameter
function isAdvanced() {
	if ($('#advanced_btn').attr('class') == 'btn btn-info active') {
		$.post("./search/index.php", {isAdvanced: "true"});
	}
};

//Pushing advanced search results to the page
function advanced_results_show() {

};