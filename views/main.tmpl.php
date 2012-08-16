<?php include '_partials/header.php'; ?>

<div>
	<form id="search_form" action="index.php" method="POST">
		<input id="search" name="search">
		<button type="submit">Search</button>
	</form>
</div>

<ul class="search">
	<script id="search_result" type="text/x">
		{{#each this}}
		<li data-route_id="{{id}}">
			<a href="route.php?id={{id}}">Start: {{start this}}, End: {{end this}}</a>
		</li>
		{{/each}}
	</script>
</ul>

<script src="js/script.js"></script>
<script src="js/get_route.js"></script>
<?php include '_partials/footer.php'; ?>