$(function() {
	$('#results').hide();
	$('#notfound').hide();
	if ($('#search').val() == null || $('#search').val() == "") {
		$('#appendedInput').hide();
	};
	$('#search_btn').click(function(e) {
		if ($('#advanced_btn').attr('class') == 'btn btn-info active') {
			e.preventDefault();
			advanced_results_show();
			// console.log("advanced_results_show");
		}
		else{
			e.preventDefault();
			search_results_show();
			// console.log("search_results_show");
		}
	});
	$('#appendedInput').click(function() {
		$('#search').val("");
		$('#search').css({"border-radius":"4px 4px 4px 4px"});
		$('#appendedInput').hide();
		$('#results').hide();
		$('#notfound').hide();
		window.history.pushState("q","search","search.php");
	});

//Pushing results to typeahead (search input), search.php
		$('#search').typeahead({
			source: function(query, process) {
				$('#appendedInput').fadeIn(function() {
					$('#search').css({"border-radius":"4px 0px 0px 4px"});
				});
				var arr = [];
				var typeahead = true;

				return $.ajax({
					url: '/search/index.php',
					type: 'post',
					data: {query: $('#search').val(), typeahead: typeahead},
					dataType: "JSON",
					beforeSend: function() {
						$('#loader').show();
					},
					complete: function() {
						$('#loader').hide();
					},
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
		});
	});
};

//Pushing results to the page
function search_results_show() {
	pagination.search($('#search').val());
};

//Pushing advanced search results to the page
function advanced_results_show() {
	$('#q').val("");
	console.log("not null");
	var s_city = $('#s_city').val();
	var e_city = $('#e_city').val();
	var s_date = $('#dp1').val();
	var e_date = $('#dp2').val();
	var type = $('input[name=type]:checked', '#form').val();
	$.ajax({
		url: './search/index.php',
		type: 'post',
		data: {s_city: s_city, e_city: e_city, s_date: s_date, e_date: e_date, type: type},
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
			console.log(data, s_city, e_city, s_date, e_date, type);
		}
	});
};