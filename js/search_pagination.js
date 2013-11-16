var pagination = {
	init: function(config) {
		this.config = config;
		this.hide();
	},

	hide: function() {
		var pages = this.config.pages;
		pages.hide();
	},
	pages_count: function(rows) {
		var pages = this.config.pages;
		var prev_page = this.config.prev_page;
		var limit = 10;
		var pagesRem;
		var pagesTotal;
		var rowsPerPage;

		if (rows > limit) {
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
			if (getUrlParam.init('q') != "" && getUrlParam.init('q') != "") {
				for (i = 1; i <= pagesTotal; i++) {
					pages.append("<li id='" + i + "'><a href='/search.php?q=" + getUrlParam.init('q') + "&start=" + (i-1)*10 +" '>" + i + "</a></li>");
				};
			}
			else if (getUrlParam.init('uid') != "" && getUrlParam.init('uid') != null) {
				for (i = 1; i <= pagesTotal; i++) {
					pages.append("<li id='" + i + "'><a href='/search.php?uid=" + getUrlParam.init('uid') + "&start=" + (i-1)*10 +" '>" + i + "</a></li>");
				};	
			};
			$('#1').addClass("active");
		}
		else {
			pages.hide();
		};
	},

	search: function(searchQuery,start,uid) {
		var loader = this.config.loader;
		var tableBody = this.config.tableBody;
		var notfound = this.config.notfound;
		var results = this.config.results;
		var paging;
		var request;

				if (searchQuery != "" && searchQuery != null && (start == "" || start == null)) {
					request = {"query":searchQuery,"paging":false,"start":null};
					// console.log(request);
					window.history.pushState("q","search","search.php?q="+encodeURI(searchQuery));
				}
				else if (searchQuery != "" && searchQuery != null && start != "" && start != null) {
					request = {"query":searchQuery,"paging":true,"start":start};
					// console.log(request);
				}
				else if ((start == "" || start == null) && (uid != "" && uid != null)) {
					request = {"uid":uid,"start":null};
					// console.log(request);
				}
				else if (start != "" && start != null && uid != "" && uid != null) {
					request = {"uid":uid,"start":start};
					// console.log(request);
				};
				console.log(request);
			if (request != null) {
				$.ajax({
					url: '/search/index.php',
					type: 'post',
					data: request,
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
						pagination.pages_count(data.objD);
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