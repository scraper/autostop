function validation() {
        var start = $('#start').val();
        var end = $('#end').val();
        var date = $('#dp1').val();
        var seats = $('#seats_i').val();
        var price = $('#prices').val();

        // validation of the new route form
        if (start==null || start=="" || end==null || end=="" || date==null || date=="" || price==null || price=="")
        {
            $('#submit').popover('show');
            $('.popover-inner').css({'width':'auto'});
            if (start==null || start=="") {
                $('#start').css({'border':'1px solid red'});
                if (end==null || end=="") {
                    $('#end').css({'border':'1px solid red'})
                }
                else {
                    $('#end').css({'border':'1px solid #CCC'})
                };
                if (date==null || date=="") {
                    $('#dp1').css({'border':'1px solid red'});
                }
                else {
                    $('#dp1').css({'border':'1px solid #CCC'});   
                };
                if (price==null || price=="") {
                    $('#prices').css({'border':'1px solid red'});
                }
                else {
                    $('#prices').css({'border':'1px solid #CCC'});   
                };
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
                return false;
            }
            else if (end==null || end=="") {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid red'});
                if (date==null || date=="") {
                    $('#dp1').css({'border':'1px solid red'});
                }
                else {
                    $('#dp1').css({'border':'1px solid #CCC'});   
                };
                if (price==null || price=="") {
                    $('#prices').css({'border':'1px solid red'});
                }
                else {
                    $('#prices').css({'border':'1px solid #CCC'});   
                };
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
                return false;
            }
            else if (date==null || date=="") {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid #CCC'});
                $('dp1').css({'border':'1px solid red'});
                if (price==null || price=="") {
                    $('#prices').css({'border':'1px solid red'});
                }
                else {
                    $('#prices').css({'border':'1px solid #CCC'});   
                };
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
                return false;
            }
            else if (price==null || price=="") {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid #CCC'});
                $('dp1').css({'border':'1px solid #CCC'});
                $('#prices').css({'border':'1px solid red'});
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
            }
            else if (seats==null || seats=="") {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid #CCC'});
                $('dp1').css({'border':'1px solid #CCC'});
                $('#prices').css({'border':'1px solid #CCC'});
                if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                }
                else {
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
            }
            else {
                $('#start').css({'border':'1px solid #CCC'});
                $('#end').css({'border':'1px solid #CCC'});
                $('dp1').css({'border':'1px solid #CCC'});
                $('#prices').css({'border':'1px solid #CCC'});
                $('#seats').css({'border':'1px solid #CCC'});
            };
                
            return false;
        }
        else if (seats==null || seats=="") {
            $('#start').css({'border':'1px solid #CCC'});
            $('#end').css({'border':'1px solid #CCC'});
            $('dp1').css({'border':'1px solid #CCC'});
            $('#prices').css({'border':'1px solid #CCC'});
            if (($('#idriver').attr('class')=='btn btn-info active') && (seats=='null' || seats=="")) {
                    $('#seats_i').css({'border':'1px solid red'});
                    return false;
                }
                else {
                    $('#start').css({'border':'1px solid #CCC'});
                    $('#end').css({'border':'1px solid #CCC'});
                    $('dp1').css({'border':'1px solid #CCC'});
                    $('#prices').css({'border':'1px solid #CCC'});
                    $('#seats_i').css({'border':'1px solid #CCC'});
                };
        }
};