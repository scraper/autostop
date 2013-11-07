$(function() {
//search_h submit on item selected, all pages	
	$(document).ready(function() {
		$('ul.typeahead').first().attr('id','top');	
	});
	$('#search_h').change(function() {
		$('#top li.active').click(function() {
			$('#search_h').val($('#top li.active').attr('data-value'));
			$('#top_menu_search').submit();
		});
	});
//Push results to typeahead search_h (search input in header), any page
		$('#search_h').typeahead({
			source: function(query, process) {
				var arr = [];
				var typeahead = true;
				return $.ajax({
					url: './search/index.php',
					type: 'post',
					data: {query: $('#search_h').val(), typeahead: typeahead},
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
	var query;
		
	if (getUrlParam.init('q') != "" && getUrlParam.init('q') != null) {
		query = getUrlParam.init('q');
		query = query.replace(/\+/g,'%20');
		query = query.replace(/%2C/g,',');
		query = decodeURI(query);

		$('#search').val(query);
		$('#appendedInput').fadeIn(function() {
			$('#search').css({"border-radius":"4px 0px 0px 4px"});
		});
		pagination.search(query,getUrlParam.init('start'));
	}
	else if (getUrlParam.init('uid') != "" && getUrlParam.init('uid') != null) {
		pagination.search(null,getUrlParam.init('start'),getUrlParam.init('uid'));				
	};

});

//search icon submit function, every page
$('#search_ico').click(function() {
	$('#top_menu_search').submit();
	console.log('search click');
});