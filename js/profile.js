(function getUserDetailes() {
	$('#btn').click(function(e) {
			e.preventDefault();
		});
	var id = '100000152656098';
	$.ajax({
			url: './login.php',
			dataType: 'json',
			type: 'get',
			data: {id:id},
			success: function (data) {
				console.log(data);
			}
		});
})();