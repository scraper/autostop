<?php include '_partials/header.php'; ?>

<style type="text/css">
.span7 {
	-webkit-box-shadow: 0 8px 6px -6px black;
	   -moz-box-shadow: 0 8px 6px -6px black;
	        box-shadow: 0 8px 6px -6px black;
}
</style>

<div class="span12">
	<div class="row-fluid">
		
		<div class="span4">
			<legend>Пошук</legend>
			<form class="well" action="route.php" method="post" onsubmit="show_results()">
				
					<input id="search" class="span12" type="text" data-provide="typeahead" placeholder="Введіть місто для пошуку..." autocomplete="off">
					<div class="btn-group">
						<button id="submit" class="btn btn-success" type="submit">Go!</button>
						<button class="btn btn-info">Розширений</button>
					</div>
				
			</form>
			
		</div>

	</div>

	<div class="row-fluid">
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