(function() {
    $('#submit_btn').click(function(e) {
        e.preventDefault();
        validation();
    })
})();
function validation() {
	var validated = $('.validate');
	var arr = [];
	var arr2 = [];
	for (var i = 0; i <= validated.length - 1; i++) {
		console.log(i);
		arr2.push(i);
	};
	validated.each(function(index, elem) {
		$(this).css({'border':'1px solid red'});
		$('#submit_btn').popover('show');
		$('.popover-inner').css({'width':'auto'});
		if ($(this).val() != null && $(this).val() != "") {
			$(elem).css({'border':'0px solid #CCC'});
			arr.push(index);
			
		}
	});
	console.log(arr, arr2);
	if (arr.length === arr2.length) {
		console.log("done!");
		$('#submit_btn').popover('hide');
		$('form').submit();
	}
};