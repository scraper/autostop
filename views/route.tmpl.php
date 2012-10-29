<?php include '_partials/header.php'; ?>

<script type="text/javascript">

$(function() {
	$.ajax({
			url: 'r.php',
			data:{query:'q'},
			dataType: "JSON",
			success: function(data) {
				console.log(data);
			}
		});
	});

</script>

<?php include '_partials/footer.php'; ?>