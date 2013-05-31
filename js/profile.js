(function () {
	$('#btn').click(function(e) {
			e.preventDefault();
		});
})();

function showUserDetailes(id) {
	$.ajax({
			url: './login.php',
			dataType: 'json',
			type: 'get',
			data: {id:id},
			success: function (data) {
				console.log(data);
			}
	});
}
function getUserDetailes() {
	FB.api('/me', function(response) {
		showUserDetailes(response.id);
	});
}