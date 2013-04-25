<?php include '_partials/header.php'; ?>

<style type="text/css">
.tr {cursor: pointer;}
</style>

<div class="span12">
	<div class="row-fluid">
		
		<div class="span4">
			<legend>Пошук</legend>
			<form id="form" class="well" method="post" onsubmit="return search_results_show()">
				<fieldset>
					<input id="search" class="span12" type="text" data-provide="typeahead" placeholder="Введіть місто для пошуку..." autocomplete="off">
					<div class="btn-group">
						<button id="search_btn" class="btn btn-success">Go!</button>
						<button id="advanced_btn" class="btn btn-info" data-toggle="button">Розширений</button>
					</div>
					<p></p>
					<div id="advanced" class="span12">
						<input class="span12" type="text" id="dp1" name="from_date">
						<br>
						<input class="span12" type="text" id="dp2" name="to_date">
						<br>
						<label class="radio">
							<input type="radio" name="type" value="Водій">Водій
						</label>
						<label class="radio">
							<input type="radio" name="type" value="Пасажир">Пасажир
						</label>
					</div>
				</fieldset>	
			</form>
			
		</div>

	</div>
	
	<div id="notfound">
		<p>За вашим запитом нічого не знайдено...</p>
	</div>
	<div id="results" class="row-fluid">
		<div class="span12">
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

	<br>
	<!-- AddThis Button BEGIN -->
	<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
	<a class="addthis_button_preferred_1"></a>
	<a class="addthis_button_preferred_2"></a>
	<a class="addthis_button_preferred_3"></a>
	<a class="addthis_button_preferred_4"></a>
	<a class="addthis_button_compact"></a>
	<a class="addthis_counter addthis_bubble_style"></a>
	</div>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50b545cd607bfd66"></script>
	<!-- AddThis Button END -->
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

<?php include '_partials/footer.php'; ?>