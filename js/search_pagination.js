var pagination = {
	init: function(config) {
		this.config = config;
		this.hide();
	},

	hide: function() {
		var pages = this.config.pages;
		pages.hide();
	},
	count: function(rows,limit,searchQuery) {
		var pages = this.config.pages;
		var prev_page = this.config.prev_page;
		var pagesRem;
		var pagesTotal;
		var rowsPerPage;

		rowsPerPage = limit;
		pages.show();
		pagesRem=rows%rowsPerPage;
		if (pagesRem>0) {
			pagesTotal=Math.floor(rows/rowsPerPage)+1;
		}
		else if (pagesRem==0) {
			pagesTotal=Math.floor(rows/rowsPerPage);
		};
		pages.html('');
		for (i = 1; i <= pagesTotal; i++) {
			pages.append("<li id='" + i + "'><a href='/search.php?q=" + getUrlParam.init('q') + "&start=" + (i-1)*10 +" '>" + i + "</a></li>");
		};
		$('#1').addClass("active");
	},

	row_count: function(searchQuery) {
		var limit = 5;

		window.history.pushState("q","search","search.php?q="+encodeURI(searchQuery));
		$.ajax({
				url: '/search/index.php',
				type: 'post',
				data: {query: searchQuery},
				dataType: "JSON",
				success: function (data) {
					console.log(data.objD);
					if (data.objD > limit) {
						pagination.count(data.objD,limit,searchQuery);
						pagination.search(searchQuery);
					}
					else if (data.objD <= limit) {
						pagination.search(searchQuery);
					};
				}
			});
	},
	search: function(searchQuery) {
		var loader = this.config.loader;
		var tableBody = this.config.tableBody;
		var notfound = this.config.notfound;
		var results = this.config.results;

			if (searchQuery != "") {
				
				$.ajax({
					url: '/search/index.php',
					type: 'post',
					data: {query: searchQuery},
					dataType: "JSON",
					beforeSend: function() {
						loader.show();
					},
					complete: function() {
						loader.hide();
					},
					success: function(data) {
						
						tableBody.html('');
						if (data.objB.length > 0) {
							notfound.hide();
							$.each(data.objB, function(column, value) {
								tableBody.append('<tr class="tr" id="' + value['route_id'] + '"><td>' + value['s_city_id'] + '</td><td>' + value['e_city_id'] + '</td><td>' + value['date'] + '</td></tr>');
								//click function on the table row
								$('#'+value['route_id']+'.tr').click(function() {
									window.location = '/route.php?q=' + $('#'+value['route_id']+'.tr').attr('id'); 
								});
								results.slideDown();
							});
						}
						else {
							results.hide();
							notfound.slideDown();
						};
						console.log(data);
					}
				});
			};
	}
};
pagination.init({
	pages: $('#pages'),
	prev_page: $('#prev_page'),
	searchQuery: $('#search'),
	loader: $('#loader'),
	tableBody: $('.tbody'),
	notfound: $('#notfound'),
	results: $('#results')
});