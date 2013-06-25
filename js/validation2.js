(function() {
    $('#submit_btn').click(function(e) {
        e.preventDefault();
        validation();
    })
})();
function validation() {
    var validated = $('.validate');

    if (validated.val() == null || validated.val() == "") {
        validated.each(function() {
            if ($(this).val() == null || $(this).val() == "") {
                $(this).css({'border':'1px solid red'});
                $('#submit_btn').popover('show');
                $('.popover-inner').css({'width':'auto'});
            }
            else {
                $(this).css({'border':'1px solid #CCC'});
            }
            
        });
    }
    else {
        validated.each(function() {
            if ($(this).val() == null || $(this).val() == "") {
                $(this).css({'border':'1px solid red'});
                $('#submit_btn').popover('show');
                $('.popover-inner').css({'width':'auto'});
            }
            else {
                $(this).css({'border':'1px solid #CCC'});
                $('form').submit();
            }
        })
    }
};