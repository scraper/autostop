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
            }
            else {
                $(this).css({'border':'1px solid #CCC'});
                $('form').submit();
            }
        })
    }

    // validated.each(function(i) {
    //     if ($(this).val() == null || $(this).val() == "") {
    //         validated.removeClass('validate').addClass('validated');
    //         $('.validated').each(function() {
    //             $(this).css({'border':'1px solid red'});
    //         })
    //         // $('.validated').each(function(i) {
    //         //     $(this).css({'border':'1px solid red'});
    //         // })
    //         return false;
    //     }
    //     else {
    //         $('.validated').css({'border':'1px solid #CCC'});
    //         console.log("not null");
    //         return false;            
    //     }
    // })
    // return false;
    // // if (validated.val() == null || validated.val() == "") {
    //     console.log(validated);
    //     $('#submit').popover('show');
    //     $('.popover-inner').css({'width':'auto'});

    //     }
};