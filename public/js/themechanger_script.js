/**
 * Created by Hafiz on 2/18/2016.
 */


$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    $(this).toggleClass('collapsed');
});

$('#theme1').click(function () {
    $("#sidebar-wrapper").removeClass('theme_color2 theme_color3 theme_color4');
    $("#sidebar-wrapper").addClass('theme_color1');
    $("#dropdownMenu1").removeClass('theme_color2 theme_color3 theme_color4');
    $("#dropdownMenu1").addClass('theme_color1');

});

$('#theme2').click(function () {
    $("#sidebar-wrapper").removeClass('theme_color1 theme_color3 theme_color4');
    $("#sidebar-wrapper").addClass('theme_color2');
    $("#dropdownMenu1").removeClass('theme_color1 theme_color3 theme_color4');
    $("#dropdownMenu1").addClass('theme_color2');
});

$('#theme3').click(function () {
    $("#sidebar-wrapper").removeClass('theme_color1 theme_color2 theme_color4');
    $("#sidebar-wrapper").addClass('theme_color3');
    $("#dropdownMenu1").removeClass('theme_color1 theme_color2 theme_color4');
    $("#dropdownMenu1").addClass('theme_color3');
});

$('#theme4').click(function () {
    $("#sidebar-wrapper").removeClass('theme_color1 theme_color2 theme_color3');
    $("#sidebar-wrapper").addClass('theme_color4');
    $("#dropdownMenu1").removeClass('theme_color1 theme_color2 theme_color3');
    $("#dropdownMenu1").addClass('theme_color4');
});