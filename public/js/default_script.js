/**
 * Created by Hafiz on 2/17/2016.
 */

$.material.init();


$(document).ready(function () {
    $('.manageClient').click(function () {
        alert('he');
    });

});

function getData(sender) {
    var ids = $(sender).prop('id').split('_');

    var kvk = ids[0];
    var id = ids[1];

//            $.ajax({
//                type: "GET",
//                url: 'http://yallaBezorgd.dev/client.edit/' + id,
//                beforeSend: function(xhr){
//                    var token = $('meta[name="csrf_token"]').attr('content');
//
//                    if(token){
//                        return xhr.setRequestHeader('X-XSRF-TOKEN', token);
//                    }
//                },
//                data: {
//                    'search_keyword' : value
//                },
//                dataType: "json",
//                success: function(response){
//                    var data = jQuery.map(Object.keys(response), function(k){return response[k]});
//
//                    if(data.length == 0)
//                    {
//                        alert('Geen data gevonden')
//
//                    }
//                    else
//                    {
//                        //console.log(data);
//                        document.getElementById('p_debiteurnr').value = data[0].debnr;
//                        document.getElementById('p_debiteurnaam').value = data[0].naam;
//                        document.getElementById('p_kvk_nummer').value = data[0].kvk;
//                        document.getElementById('adres_debiteur').value = data[0].adres;
//                        document.getElementById('postcode_debiteur').value = data[0].postcode;
//                        document.getElementById('plaats_debiteur').value = data[0].plaats;
//                        //document.getElementById('kvk_nummer').value = data[0].kvk;
//                        //document.getElementById('p_contactA').value = data[0].email;
//                    }
//                }
//            });


    $.ajax({
        url: 'http://yallaBezorgd.dev/client.edit/' + id,
        type: "GET",
        cache: false,
        success: function (response) {
            var data = jQuery.map(Object.keys(response), function (k) {
                return response[k]
            });


//                    $("#geslacht_contactpersoon option").each(function (a, b) {
//                        if ($(this).html() ==  data[0].geslacht_contactpersoon) $(this).attr("selected", "selected");
//                    });

            $('#manageClient, #c_kvk').val(response.c_kvk).prop('readonly', true);
            $('#manageClient, #c_name').val(response.c_name);
            $('#manageClient, #c_type').val(response.c_type);
            $('#manageClient, #c_postcode').val(response.c_postcode);
            $('#manageClient, #c_street').val(response.c_street);
            $('#manageClient, #c_city').val(response.c_city);

            $('#manageClient ,#hiddenClientId').val(response.id);

//                    $('#contactpersoonModal #saveContactClose').hide();
//                    $('#sendForUpdate_con').show();
//
            $('#manageClientModal').modal('show');
        }
    });


}


var amountScrolled = 300;

$(window).scroll(function () {
    if ($(window).scrollTop() > amountScrolled) {
        $('a.back-to-top').fadeIn('slow');
    } else {
        $('a.back-to-top').fadeOut('slow');
    }
});

$('a.back-to-top').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 700);
    return false;
});

$('a.go-to-bottom').click(function () {
    $("html, body").animate({scrollTop: $(document).height()}, "slow");
    return false;
});





//@if (count($errors) > 0)
//    $('#addUserModal').modal('show');
//@endif

$("#user_role").chosen({
    disable_search_threshold: 5,
    no_results_text: "Oops, niets gevonden!",
    width: "95%"
});



//Tooltip popups
$(".top").tooltip({
    placement: "top"
});
$(".right").tooltip({
    placement: "right"
});
$(".bottom").tooltip({
    placement: "bottom"
});
$(".left").tooltip({
    placement: "left"
});

//{{--My ripple function--}}
$(function () {
    var ink, d, x, y;
    $(".ripplelink").click(function (e) {
        if ($(this).find(".ink").length === 0) {
            $(this).prepend("<span class='ink'></span>");
        }

        ink = $(this).find(".ink");
        ink.removeClass("animate");

        if (!ink.height() && !ink.width()) {
            d = Math.max($(this).outerWidth(), $(this).outerHeight());
            ink.css({height: d, width: d});
        }

        x = e.pageX - $(this).offset().left - ink.width() / 2;
        y = e.pageY - $(this).offset().top - ink.height() / 2;

        ink.css({top: y + 'px', left: x + 'px'}).addClass("animate");
    });
});
