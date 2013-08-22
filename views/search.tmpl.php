<?php include '_partials/header.php'; ?>
<!--map initialization-->
<script type="text/javascript">
	window.onload = function () {
		initialize();
	}
</script>

<style type="text/css">
.tr {cursor: pointer;}
.span7 {
    -webkit-box-shadow: 0 8px 6px -6px black;
       -moz-box-shadow: 0 8px 6px -6px black;
            box-shadow: 0 8px 6px -6px black;
}
</style>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span7">
    				<legend>Карта</legend>
    				<div id="map" style="width:100%;height:400px;"></div>
    			</div><!--/span-->
		<div class="span5">
			<legend>Пошук</legend>
			<form id="form" class="well" method="post" onsubmit="return search_results_show()">
				<input id="search" class="span12" type="text" data-provide="typeahead" placeholder="Введіть місто для пошуку..." autocomplete="off" onchange="codeAddress();">
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
						<input type="radio" name="type" value="Водій">Водій
					</label>
					<label class="radio inline">
						<input type="radio" name="type" value="Пасажир">Пасажир
					</label>
				</div>
					
			</form>
			
		</div>

	</div>
	<div class="container-fluid" id="notfound">
		<legend>Results</legend>
		<div>
			<p>За вашим запитом нічого не знайдено...</p>
		</div>
	</div>
	<div id="results" class="container-fluid">
		<div>
			<legend>Results</legend>
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
	</div>

</div>

    </div><!--/row-->

    <hr>

    <footer>
    	<p>&copy; Company 2012</p>
    </footer>

    </div><!--/.fluid-container-->

</div>
<input id="q" type="hidden" value="<?php echo ($q=$_POST['q']);?>">
<script type="text/javascript" src="./js/search.js"></script>
<script src="js/get_route.js"></script>

<?php include '_partials/footer.php'; ?>