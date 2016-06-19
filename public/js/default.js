/**
 * Created by Hafiz on 4/30/2016.
 */

//Material stuff


//Date formating stuff
$('#test').bootstrapMaterialDatePicker({
    format : 'DD-MM-YYYY',
    lang : 'nl',
    weekStart : 1,
    cancelText : 'Annuleren',
    time : false
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


// Return original width of table - No modification
var fixWidth = function(e, ui) {
    ui.children().each(function() {
        $(this).width($(this).width());
    });
    return ui;
};

$("#tablesortable tbody").sortable({
    helper: fixWidth,
    stop: function(e, ui)
    {
        var data = $(this).sortable('serialize');
        var table = $(this).parent().attr('id');
        alert(ui);
    }
}).disableSelection();




// Search user
$('#search_user').on('keyup', function (e) {


    var keyWord = $('#search_user').val();
    var input = $('#search_user');

    var tb = $('table[name="searchuser_table"]').attr('id', 'user_table');


    if (e.keyCode == 13 && keyWord != '') {


        $('#user_table tr').not('.tr_head').remove();

        $.ajax({
            url: 'http://suproject.dev/user/search/' + keyWord,
            type: "GET",
            cache: false,
            data: keyWord,
            dataType: "json",
            success: function (response) {

                var data = jQuery.map(Object.keys(response), function (k) {
                    return response[k]
                });
                var items_count = Object.keys(response).length;

                if (items_count > 1) {
                    $('#div_user_table').show(200);
                    $(function () {
                        $.each(response, function (i, item) {

                            $('<tr id="user_table_tr" onclick="getUserRow(this)">').append(
                                $('<td style="padding: 2px !important;">').text(item.id),
                                $('<td style="padding: 2px !important;">').text(item.name),
                                $('<td style="padding: 2px !important;">').text(item.username),
                                $('<td style="padding: 2px !important;">').text(item.email),
                                $('<td style="padding: 2px !important;">').text(item.created_at)
                            ).appendTo(tb);
                        });
                    });
                    input.css('background-color', 'lime');

                }
                else if (items_count == 1) {
                    $('#div_user_table').hide(300);
                    document.getElementById('user_id').value = data[0].id;
                    document.getElementById('user_name').value = data[0].name;
                    document.getElementById('user_username').value = data[0].username;
                    document.getElementById('user_email').value = data[0].email;
                    input.css('background-color', 'green');
                }
                else if (items_count == 0) {
                    document.getElementById('user_id').value = '';
                    input.next('span').remove();
                    $('#div_user_table').hide(300);
                    input.css('background-color', '#FE5C50');
                    alert('The user is not found');
                    input.val('')
                }

            }
        });
    }
});


function getUserRow(sender) {
    // jQuery.map(Object.keys(response), function(k){return response[k]});
    var data = $(sender).children('td').map(function (index, val) {
        return $(this).text();
    }).toArray();

    document.getElementById('user_id').value = data[0];
    document.getElementById('user_name').value = data[1];
    document.getElementById('user_username').value = data[2];
    document.getElementById('user_email').value = data[3];
    $('#div_user_table').hide();

}


var selectedBedrijven = [];
var rolBedrijf;


function saveUserData() {

    var user_id = $('#user_id').val();
    var company_id = $('#company_id').val();


    var errorCount = 0;

    if (user_id === '') {
        $('#er_user_id').text('You must search for a user');
        errorCount += 1;
    } else {
        $('#er_user_id').val('');
    }


    if (errorCount <= 0) {


        $.ajax({
            url: 'http://suproject.dev/bisuser/' + company_id + '/' + user_id + '/link',
            type: "POST",
            cache: false,
            dataType: "json",
            data: $('#userSearchForm').serializeAll(),
            success: function (response) {
                window.location.reload();
            }
        });


        $('#search_userModal').modal('hide');


    }


}