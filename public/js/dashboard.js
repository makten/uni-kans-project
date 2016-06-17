/**
 * Created by Hafiz on 4/26/2016.
 */

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


$(document).ready(function(){

    var $table = $('#clients_table').DataTable({
        processing: true,
        "bAutoWidth": false,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        // var data = row.data();
                        return 'Details';
                    }
                } ),
                renderer: function ( api, rowIdx, columns ) {

                    var data = $.map( columns, function ( col, i ) {
                        return '<tr>'+
                            '<td style="font-weight: bolder;">'+col.title+':'+'</td> '+
                            '<td>'+col.data+'</td>'+
                            '</tr>';
                    } ).join('');

                    return $('<table class="table"/>').append( data );
                }
            }
        },
        serverSide: false,
        "paging": false,
        "info": false,
        "bFilter": false,
        "bSort": true,
        "language": languageOpt,
        "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
        "iDisplayLength": 5,
        "columnDefs": [{className: 'data-center', "targets": [2], 'padding': '20px !important'}],
        "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull ){
            nRow.setAttribute('data-label', 'Name');
            $('td:eq(0)', nRow).attr('data-label', 'Name');
            $('td:eq(1)', nRow).attr('data-label', 'KvK');
            $('td:eq(2)', nRow).attr('data-label', 'Type');
            $('td:eq(3)', nRow).attr('data-label', 'Postcode');
            $('td:eq(4)', nRow).attr('data-label', 'Street');
            $('td:eq(5)', nRow).attr('data-label', 'City');
            $('td:eq(6)', nRow).attr('data-label', 'Phone');
            //$('td:eq(7)', nRow).attr('data-label', 'Website');
        },
        ajax: '/companies',
         "columnDefs": [{className: 'data-center', "targets": [4]}],
        columns: [
            { data: 'name', name: 'Name' },
            { data: 'kvk', name: 'KVK' },
            { data: 'type', name: 'Type' },
            { data: 'postcode', name: 'Postcode' },
            { data: 'street_nr', name: 'Street' },
            { data: 'city', name: 'City' },
            { data: 'telephone', name: 'Phone' },
            { data: 'action', name: 'Actions' }
            //{ data: 'description', name: 'Description' },
        ]
    });



//Default pagina regie contracten ------------------
//    var $table = $('#users_table').DataTable({
//        responsive: {
//            details: {
//                display: $.fn.dataTable.Responsive.display.modal( {
//                    header: function ( row ) {
//                        var data = row.data();
//                        // return 'Details for '+data[0]+' '+data[1];
//                        return 'Details';
//                    }
//                } ),
//                renderer: function ( api, rowIdx, columns ) {
//
//                    var data = $.map( columns, function ( col, i ) {
//                        return '<tr>'+
//                            '<td style="font-weight: bolder;">'+col.title+':'+'</td> '+
//                            '<td>'+col.data+'</td>'+
//                            '</tr>';
//                    } ).join('');
//
//                    return $('<table class="table"/>').append( data );
//                }
//            }
//        },
//
//        serverSide: false,
//        processing: true,
//        "paging": false,
//        "info": false,
//        "bFilter": false,
//        "bSort": false,
//        "language": languageOpt,
//        "aLengthMenu": [[5, 10, 20, 100, 500, 1000, 5000, -1], [5, 10, 20, 100, 500, 1000]],
//        "iDisplayLength": 5,
//
//        ajax: '/getUsers',
//
//        // "columnDefs": [{className: 'data-center', "targets": [2], 'padding': '20px !important'}],
//
//        columns: [
//            { data: 'first_name', name: 'First Name' },
//            { data: 'last_name', name: 'Last Name' },
//            { data: 'email', name: 'Email' },
//            { data: 'lastlogin', name: 'Last login' },
//            {data: 'confirmed', name: 'Confirmed'},
//            {data: 'manage', name: ''}
//        ]
//    });
//
////Default pagina mutaties contracten ------------------
//    var $table = $('#products_table').DataTable({
//        processing: true,
//        responsive: true,
//        serverSide: false,
//        "bSort": false,
//        "paging": false,
//        "info": false,
//        "bFilter": false,
//        "language": languageOpt,
//
//        ajax: 'getMutatiesContracts/limit',
//        "columnDefs": [{className: 'data-center', "targets": [4], 'padding': '20px !important'},
//            {"targets": [5],
//                "data": function(row){
//                    rowCount = parseInt(row.countResult) - 5;
//                    $('#showAllMutaties').html('Meer weergeven <span class="badge">'+ rowCount +'</span>');
//                    if(row.countResult > 5)
//                    {
//                        $('#showAllMutaties').show();
//                    }
//                },
//                "defaultContent": ""
//            }],
//        columns: [
//            { data: 'naamContract', name: 'Contractnummer' },
//            { data: 'aangemaakt', name: 'Indiendatum' },
//            { data: 'indiener', name: 'Indiener' },
//            { data: 'uitvoer', name: 'Uitvoerende'},
//            { data: 'in_behandeling', name: 'In behandeling'}
//        ]
//    });


});