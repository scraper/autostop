$(function() {
  $("body").on("input propertychange", ".floating-label-form-group", function(e) {
    $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
  }).on("focus", ".floating-label-form-group", function() {
    $(this).addClass("floating-label-form-group-with-focus");
  }).on("blur", ".floating-label-form-group", function() {
    $(this).removeClass("floating-label-form-group-with-focus");
  });
});
  $(document).ajaxComplete(function() {
	  $('.validate').each(function(index) {
			console.log(index+":"+$(this).val());
		  if($(this).val() != "" && $(this).val() != null) {
			$(this).closest('div').addClass("floating-label-form-group-with-value");
		  }
	  });
  });
