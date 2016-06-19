/**
 * Created by Hafiz on 2/17/2016.
 */
$.material.init()
$.material.input()
$.material.checkbox()
$.material.radio()
$.material.ripples()

//$('#testselect').selectize(options);

//$('#input-tags3').selectize({
//    plugins: ['remove_button'],
//    delimiter: ',',
//    persist: false,
//    create: function(input) {
//        return {
//            value: input,
//            text: input
//        }
//    }
//});

//$('#input-tags3').selectize({
//    plugins: ['restore_on_backspace'],
//    delimiter: ',',
//    persist: false,
//    create: function(input) {
//        return {
//            value: input,
//            text: input
//        }
//    }
//});


$("#pro_status").dropdown({ "autoinit" : "#pro_status" });




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
