/**
 * Created by Hafiz on 12/23/2015.
 */
var languageOpt = {
    "emptyTable": "",
    "infoEmpty": " ",
    "zeroRecords": " ",
    "sProcessing": " ",
    "sSearch": "Zoek",
    "searchPlaceholder": "Zoek in de hele tabel",
    "info": "_START_ tot _END_ van _TOTAL_ records",
    "lengthMenu": "Toon _MENU_ records per pagina",

    "oPaginate": {
        "sPrevious": "Vorige",
        "sNext": "Volgende",


    }
};

var languageOpt_meer = {
    "emptyTable": " ",
    "infoEmpty": "Geen data gevonden",
    "zeroRecords": " ",
    "sProcessing": "<img src='/images/loaddata.gif' height='220'>",
    "sSearch": "Zoek",
    "searchPlaceholder": "Zoek in de hele tabel",
    "info": "_START_ tot _END_ van _TOTAL_ records",
    "lengthMenu": "Toon _MENU_ records per pagina",

    "oPaginate": {
        "sPrevious": "Vorige",
        "sNext": "Volgende",


    }
};


function showData(value) {

    var showThis;
    if (value == 'showAll') {
        showThis = 'showAll';
        $('#showAllContracs').hide(30);
        $('#hideContracs').show(30);

    }
    else if (value == 'limit') {
        showThis = 'limit';
        $('#hideContracs').hide(30);
        $('#showAllContracs').show(30);

    }

    $("#clients_table").dataTable().fnDestroy();

    var $table = $('#clients_table').DataTable({
        processing: true,
        responsive: true,
        serverSide: false,
        "paging": false,
        "info": false,
        "bFilter": false,
        "bSort": true,
        "language": languageOpt_meer,
        "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
        "iDisplayLength": 5,

        ajax: 'getNietAkkoordContracts/' + showThis,

        "columnDefs": [{className: 'data-right', "targets": [2]},
            {
                "targets": [3],
                "data": function (row) {
                    rowCount = parseInt(row.countResult) - 5;
                    $('#showAllContracs').html('Meer weergeven <span class="badge">' + rowCount + '</span>');
                    if (row.countResult <= 5) {
                        // $('#showAllContracs').hide();
                    }
                },
                "defaultContent": ""
            }],
        columns: [
            {data: 'contractName', name: 'Contractnaam'},
            {data: 'laatst_gewijzigd', name: 'Laatst gewijzigd'},
            {data: 'verwijdering', name: ' '},
            // { data: 'countResult', name: 'rows' }
        ]
    });

}

//--REGIE CONTRACT DATA --------
function showRegieData(value) {

    var showThis;
    var filter;
    if (value == 'showAll') {
        showThis = 'showAll';
        $('#showAllRegie').hide(30);
        $('#hideRegie').show(30);
        filter = true;

    }
    else if (value == 'limit') {
        showThis = 'limit';
        $('#hideRegie').hide(30);
        $('#showAllRegie').show(30);
        filter = false;

    }

    $("#regie_contracten").dataTable().fnDestroy();

    var $table = $('#regie_contracten').DataTable({
        processing: true,
        responsive: true,
        serverSide: false,
        "paging": false,
        "info": false,
        "bFilter": filter,
        "bSort": true,
        "language": languageOpt_meer,
        "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
        "iDisplayLength": 20,

        ajax: 'getRegieContracts/' + showThis,

        "columnDefs": [{className: 'data-center', orderable: false, "targets": [4], 'padding': '20px !important'},
            {
                "targets": [5],
                "data": function (row) {
                    rowCount = parseInt(row.countResult) - 5;
                    $('#showAllRegie').html('Meer weergeven <span class="badge">' + rowCount + '</span>');
                    if (row.countResult > 5) {
                        // $('#showAllRegie').show();
                    }
                },
                "defaultContent": ""
            }],
        columns: [
            {data: 'contractNaam', name: 'Contractnaam'},
            {data: 'indien_datum', name: 'Indiendatum'},
            {data: 'indiener', name: 'Indiener'},
            {data: 'uitvoer', name: 'Uitvoerende'},
            {data: 'in_behandeling', name: 'In behandeling'}

        ]
    });

}


//--AANVRAAG CONTRACT DATA --------
function showAllAanvraag(value) {
    var showThis;
    var filter;
    if (value == 'showAll') {
        showThis = 'showAll';
        $('#showAllAanvraag').hide(30);
        $('#hideAanvraag').show(30);
        filter = true;

    }
    else if (value == 'limit') {
        showThis = 'limit';
        $('#hideAanvraag').hide(30);
        $('#showAllAanvraag').show(30);
        filter = false;

    }

    $("#contract_aanvraag").dataTable().fnDestroy();


    var $table = $('#contract_aanvraag').DataTable({
        processing: true,
        responsive: true,
        serverSide: false,
        "paging": false,
        "info": false,
        "bFilter": filter,
        "bSort": true,
        "language": languageOpt_meer,
        "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
        "iDisplayLength": 5,

        ajax: 'getVerstuurContract/' + showThis,

        "columnDefs": [{
            className: 'data-center',
            orderable: false,
            "targets": [5, 6, 7, 8, 9, 10],
            'padding': '20px !important'
        },
            {
                "targets": [12],
                "data": function (row) {
                    rowCount = parseInt(row.countResult) - 5;
                    $('#showAllAanvraag').html('Meer weergeven <span class="badge">' + rowCount + '</span>');
                    if (row.countResult > 5) {
                        // $('#showAllAanvraag').show();
                    }
                },
                "defaultContent": ""
            }],
        columns: [
            {data: 'contractNaam', name: 'Contractnaam'},
            {data: 'indien_datum', name: 'Indiendatum'},
            {data: 'indiener', name: 'Indiener'},
            {data: 'uitvoer', name: 'Uitvoerende'},
            {data: 'inrichten_statusen', name: 'Status'},
            {data: 'tariefcode_stat', name: 'Tariefcode'},
            {data: 'contactpersonen_stat', name: 'Contactpersonen'},
            {data: 'installaties_stat', name: 'Installaties'},
            {data: 'ppo_stat', name: 'PPO'},
            {data: 'uitvoer_stat', name: 'Uitvoerlocaties'},
            {data: 'overig_stat', name: 'Overig'},
            {data: 'actie_vereist', name: 'Actie vereist'}


        ]
    });
}


//------------ MUTATIE CONTRACTEN -----------
function showMutatieData(val) {

    var showMutaties;
    var filter;

    if (val == 'showAll') {
        showMutaties = 'showAll';
        $('#showAllMutaties').hide(30);
        $('#hideMutaties').show(30);
        filter = true;

    }
    else if (val == 'limit') {
        showMutaties = 'limit';
        $('#hideMutaties').hide(30);
        $('#showAllMutaties').show(30);
        filter = false;

    }

    $("#mutaties_table").dataTable().fnDestroy();

    var $table = $('#mutaties_table').DataTable({
        processing: true,
        responsive: true,
        serverSide: false,
        "bSort": true,
        "paging": false,
        "info": false,
        "bFilter": filter,
        "language": languageOpt_meer,

        ajax: 'getMutatiesContracts/' + showMutaties,
        "columnDefs": [{className: 'data-center', orderable: false, "targets": [4], 'padding': '20px !important'},
            {
                "targets": [5],
                "data": function (row) {
                    rowCount = parseInt(row.countResult) - 5;
                    $('#showAllMutaties').html('Meer weergeven <span class="badge">' + rowCount + '</span>');
                    if (row.countResult > 5) {
                        // $('#showAllMutaties').show();
                    }
                },
                "defaultContent": ""
            }],
        columns: [
            {data: 'naamContract', name: 'Contractnummer'},
            {data: 'aangemaakt', name: 'Indiendatum'},
            {data: 'indiener', name: 'Indiener'},
            {data: 'uitvoer', name: 'Uitvoerende'},
            {data: 'in_behandeling', name: 'In behandeling'}
        ]
    });

}


$(document).ready(function () {


    //Default pagina Niet verstuurde contracten ------------------
    var $table = $('#clients_table').DataTable({
        processing: true,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        // var data = row.data();                        
                        return 'Details';
                    }
                }),
                renderer: function (api, rowIdx, columns) {

                    var data = $.map(columns, function (col, i) {
                        return '<tr>' +
                            '<td style="font-weight: bolder;">' + col.title + ':' + '</td> ' +
                            '<td>' + col.data + '</td>' +
                            '</tr>';
                    }).join('');

                    return $('<table class="table"/>').append(data);
                }
            }
        },
        serverSide: false,
        "paging": false,
        "info": false,
        "bFilter": false,
        "bSort": false,
        "language": languageOpt,
        "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
        "iDisplayLength": 5,

        ajax: '/getClients',

        "columnDefs": [
            {className: 'data-right', "targets": [2], 'padding': '20px !important'},
            {
                "targets": [6],
                "data": function (row) {
                    rowCount = parseInt(row.countResult) - 5;
                    $('#showAllContracs').html('Meer weergeven <span class="badge">' + rowCount + '</span>');
                    if (row.countResult > 5) {
                        $('#showAllContracs').show();
                    }
                },
                "defaultContent": ""
            }],
        columns: [
            {data: 'id', name: 'Client ID'},
            {data: 'c_kvk', name: 'KVK'},
            {data: 'c_name', name: 'Name'},
            {data: 'c_type', name: 'Type'},
            {data: 'c_postcode', name: 'Postcode'},
            {data: 'c_street', name: 'Street'},
            {data: 'c_city', name: 'City'},
            {data: 'manage', name: ''}
        ]
    });


//Default pagina regie contracten ------------------
    var $table = $('#regie_contracten').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();

                        // return 'Details for '+data[0]+' '+data[1];
                        return 'Details';
                    }
                }),
                renderer: function (api, rowIdx, columns) {

                    var data = $.map(columns, function (col, i) {
                        return '<tr>' +
                            '<td style="font-weight: bolder;">' + col.title + ':' + '</td> ' +
                            '<td>' + col.data + '</td>' +
                            '</tr>';
                    }).join('');

                    return $('<table class="table"/>').append(data);
                }
            }
        },

        serverSide: false,
        processing: true,
        "paging": false,
        "info": false,
        "bFilter": false,
        "bSort": false,
        "searchHighlight": true,
        "language": languageOpt,
        "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
        "iDisplayLength": 5,

        ajax: '/getUsers',

        // "columnDefs": [{className: 'data-center', "targets": [2], 'padding': '20px !important'}],

        columns: [
            {data: 'first_name', name: 'First Name'},
            {data: 'last_name', name: 'Last Name'},
            {data: 'email', name: 'Email'},
            {data: 'lastlogin', name: 'Last login'},
            {data: 'manage', name: ''}
        ]
    });


    //Assign Default to function for proposities ------------------
     var $pro_table = function() {
        $pro_table = $('#proposities_default').DataTable({
             processing: true,
             responsive: true,
             responsive: {
                 details: {
                     display: $.fn.dataTable.Responsive.display.modal({
                         header: function (row) {
                             var data = row.data();
                             // return 'Details for '+data[0]+' '+data[1];
                             return 'Details';
                         }
                     }),
                     renderer: function (api, rowIdx, columns) {

                         var data = $.map(columns, function (col, i) {
                             return '<tr>' +
                                 '<td style="font-weight: bolder;">' + col.title + ':' + '</td> ' +
                                 '<td>' + col.data + '</td>' +
                                 '</tr>';
                         }).join('');

                         return $('<table class="table"/>').append(data);
                     }
                 }
             },
             serverSide: false,
             "paging": true,
             "info": false,
             "bFilter": true,
             "bSort": true,
             "language": languageOpt,
             "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
             "iDisplayLength": 10,
             "order": [[1, 'desc']],
             "drawCallback": function (settings) {
                 $('#proposities_default td').removeHighlight();
                 if ($('.dataTables_filter input').val() != "") {
                     $('#proposities_default td').highlight($('.dataTables_filter input').val());
                 }
             },
             ajax: '/getProposities',

             "columnDefs": [{className: 'data-center', "targets": [1, 2], 'padding': '20px !important'}],
             columns: [
                 //{ data: 'pro_avatar', name: 'Avatar' },
                 {data: 'pro_name', name: 'Naam'},
                 {data: 'contactpersoon', name: 'Contactpersoon'},
                 {data: 'pro_status', name: 'Status'},
                 {data: 'created_at', name: 'Aangemaakt op'},
                 {data: 'actie', name: 'Actie'}

             ]
         });
     }

    // Initialize the proposities tabale
    $pro_table();

    //Mouse enter effects for this table
    $('#proposities_default tbody')
        .on('mouseenter', 'td', function () {

            var colIdx = $pro_table.cell(this).index().column;

            $($pro_table.cells().nodes()).removeClass('highlight');
            $($pro_table.column(colIdx).nodes()).addClass('highlight');
        });

    //Refreshing this table
    $('#refresh_proposities').click(function(){
        $("#proposities_default").dataTable().fnDestroy();
        $pro_table();
    });
    // End default prepositie table

});


// ----------VOLTOIDE REGIE CONTRACT AANVRAGEN -------------
$('#showVoltooidRegie').on('click', function () {

    // $('a.go-to-bottom').toggle('slow');

    $("#voltooid_regie_contracten").dataTable().fnDestroy();

    var $table = $('#voltooid_regie_contracten').DataTable({
        processing: true,
        responsive: true,
        serverSide: false,
        "paging": false,
        "info": false,
        "bFilter": false,
        "bSort": false,
        "language": languageOpt,
        "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
        "iDisplayLength": 5,

        ajax: 'getRegieContracts/voltooid',

        "columnDefs": [{className: 'data-center', "targets": [4], 'padding': '20px !important'},
            {
                "targets": [5],
                "data": function (row) {
                    rowCount = parseInt(row.countResult) - 5;
                    // $('#showAllRegie').html('Meer weergeven <span class="badge">'+ rowCount +'</span>');
                    // if(row.countResult > 5)
                    // {
                    // $('#showAllRegie').show();
                    // }
                },
                "defaultContent": ""
            }],
        columns: [
            {data: 'contractNaam', name: 'Contractnaam'},
            {data: 'indien_datum', name: 'Indiendatum'},
            {data: 'indiener', name: 'Indiener'},
            {data: 'uitvoer', name: 'Uitvoerende'},
            {data: 'inrichten_statusen', name: 'Status'}

        ]
    });

    $('#div_voltoid_regie').toggle(600);

    $(this).text(function (i, text) {
        return text === "Voltooide contracten" ? "Verbergen" : "Voltooide contracten";
    })

    if ($(this).text == 'Voltooide contracten') {
        $("#voltooid_regie_contracten").dataTable().fnDestroy();
    }

});
