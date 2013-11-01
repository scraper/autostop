<?php include '_partials/header.php'; ?>
<!--map initialization-->


<style type="text/css">
.tr {cursor: pointer;}
/*#search {
	background: white url(/glyphicons_free/glyphicons/png/glyphicons_197_remove.png) right no-repeat;
	padding-right: 17px;
}*/
/*.search {
	position: relative;
}*/
#search {
	border-radius: 4px 4px 4px 4px;
};
</style>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span5">
			<legend>Пошук</legend>
			<form id="form" class="" method="post" onsubmit="return search_results_show()">
				<div class="input-append">
					<input id="search" class="span12" type="text" data-provide="typeahead" placeholder="Введіть місто для пошуку..." autocomplete="off" onchange="">
					<img id="appendedInput" title="Очистити" class="add-on" src="/glyphicons_free/glyphicons/png/glyphicons_197_remove.png">
					<!-- <i id="appendedInput" class="icon-remove-circle add-on"></i> -->
				</div>

				<div class="btn-group">
					<button id="search_btn" class="btn btn-success">Go!</button>
					<button id="advanced_btn" class="btn btn-info" data-toggle="button">Розширений</button>
				</div>
				<p></p>
				<div id="advanced" class="container-fluid">
					<input class="span12" type="text" id="s_city" placeholder="Введіть місце відправлення" autocomplete="off">
					<input class="span12" type="text" id="e_city" placeholder="Введіть місце призначення" autocomplete="off">
					<input class="span12" type="text" id="dp1" name="from_date" autocomplete="off">
					<br>
					<input class="span12" type="text" id="dp2" name="to_date" autocomplete="off">
					<br>
					<label class="radio inline">
						<input type="radio" name="type" value="1">Водій
					</label>
					<label class="radio inline">
						<input type="radio" name="type" value="0">Пасажир
					</label>
				</div>
					
			</form>
			
		</div>
		<div class="span7">
    		<div class="container-fluid" id="notfound">
				<legend>Результати</legend>
				<div>
					<p>За вашим запитом нічого не знайдено...</p>
				</div>
			</div>
			<div id="results" class="container-fluid">
				<div>
					<legend>Результати</legend>
					<table class="table table-hover">
						<thead>
							<tr>
								<th>A</th>
								<th>B</th>
								<th>Дата</th>
							</tr>
						</thead>
						<tbody class="tbody">

						</tbody>
					</table>

					<div class="result"></div>
				</div>
				<div class="pagination pagination-centered">
					<ul id="pages">
						<!-- <li id="prev_page"><a href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">Next</a></li> -->
					</ul>
				</div>
			</div>
		</div><!--/span-->

	</div>
</div>

    </div><!--/row-->

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

    </div><!--/.fluid-container-->

</div>
<!-- <input id="q" type="" value="<?php echo ($q=$_GET['q']);?>"> -->
<script type="text/javascript" src="/js/search.js"></script>
<script type="text/javascript" src="/js/search_pagination.js"></script>
<script src="/js/get_route.js"></script>
<script type="text/javascript">
// $(document).on('propertychange keyup input paste', 'input.search', function(){
//     var io = $(this).val().length ? 1 : 0 ;
//     $(this).next('.icon-clear').stop().fadeTo(300,io);
// }).on('click', '.icon-clear', function() {
//     $(this).delay(300).fadeTo(300,0).prev('input').val('');
// });

</script>
<?php include '_partials/footer.php'; ?>