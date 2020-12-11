
$(function(){

    var name_1 = $('#full_name').val();
    if(name_1 !=""){
        $("#name_error").css("visibility","hidden");
    }

    var nic_1 = $('#nic').val();
    if(nic_1 !=""){
        $("#nic_error").css("visibility","hidden");
    }

    var address_1 = $('#address').val();
    if(address_1 !=""){
        $("#address_error").css("visibility","hidden");
    }

    var telephone_1 = $('#telephone').val();
    if(telephone_1 !=""){
        $("#telephone_error").css("visibility","hidden");
    }

    $("#full_name").focusout(function(){
        check_name();
    });

    $("#nic").focusout(function(){
        check_nic();
    });

    $("#address").focusout(function(){
        check_address();
    });

    $("#telephone").focusout(function(){
        check_telephone();
    });

    function check_name(){
        var name = $('#full_name').val();
        if(name!=""){
            $("#name_error").css("visibility","hidden");
           // $("#submit").css("visibility","visible");
        }else{
            $("#name_error").css("visibility","visible");
            //$("#submit").css("visibility","hidden");
        }
    }

    function check_nic(){
        var nic = $('#nic').val();
        if(nic!=""){
            $("#nic_error").css("visibility","hidden");
        }else{
            $("#nic_error").css("visibility","visible");
            //$("#submit").css("visibility","hidden");
        }
    }

    function check_address(){
        var address = $('#address').val();
        if(address!=""){
            $("#address_error").css("visibility","hidden");
        }else{
            $("#address_error").css("visibility","visible");
           // $("#submit").css("visibility","hidden");
        }
    }

    function check_telephone(){
        var telephone = $('#telephone').val();
        if(telephone!=""){
            $("#telephone_error").css("visibility","hidden");
        }else{
            $("#telephone_error").css("visibility","visible");
            //$("#submit").css("visibility","hidden");
        }
    }

});



$(function(){

    var name_1 = $('#full_name').val();
    if(name_1 !=""){
        $("#name_error").css("visibility","hidden");
    }

    var nic_1 = $('#nic').val();
    if(nic_1 !=""){
        $("#nic_error").css("visibility","hidden");
    }

    var address_1 = $('#address').val();
    if(address_1 !=""){
        $("#address_error").css("visibility","hidden");
    }

    var telephone_1 = $('#telephone').val();
    if(telephone_1 !=""){
        $("#telephone_error").css("visibility","hidden");
    }

    $("#full_name").focusout(function(){
        check_name();
    });

    $("#nic").focusout(function(){
        check_nic();
    });

    $("#address").focusout(function(){
        check_address();
    });

    $("#telephone").focusout(function(){
        check_telephone();
    });

    function check_name(){
        var name = $('#full_name').val();
        if(name!=""){
            $("#name_error").css("visibility","hidden");
           // $("#submit").css("visibility","visible");
        }else{
            $("#name_error").css("visibility","visible");
            //$("#submit").css("visibility","hidden");
        }
    }

    function check_nic(){
        var nic = $('#nic').val();
        if(nic!=""){
            $("#nic_error").css("visibility","hidden");
        }else{
            $("#nic_error").css("visibility","visible");
            //$("#submit").css("visibility","hidden");
        }
    }

    function check_address(){
        var address = $('#address').val();
        if(address!=""){
            $("#address_error").css("visibility","hidden");
        }else{
            $("#address_error").css("visibility","visible");
           // $("#submit").css("visibility","hidden");
        }
    }

    function check_telephone(){
        var telephone = $('#telephone').val();
        if(telephone!=""){
            $("#telephone_error").css("visibility","hidden");
        }else{
            $("#telephone_error").css("visibility","visible");
            //$("#submit").css("visibility","hidden");
        }
    }

});


