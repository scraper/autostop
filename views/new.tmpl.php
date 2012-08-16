<?php include '_partials/header.php'; ?>
   <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, textarea, select, button").uniform();
      });
    </script>
<div id="map" style="width:100%;height:400px;"></div>

<div id="controls">
	<div class="directions">
		<li>
			<label for="start">Start:</label>
			<input type="text" id="start"/>
		</li>
		<li>
			<label for="end">End:</label>
			<input type="text" id="end"/>

		</li>
		<li id="build_route">Get Directions</li>
	</div>
</div>

<form action="new.php" method="post">
	<input type="text" name="origin"/>
	<input type="text" name="destination"/>
	<button type="submit">Add route</button>
</form>

<script src="js/get_route.js"></script>

<?php include '_partials/footer.php'; ?>