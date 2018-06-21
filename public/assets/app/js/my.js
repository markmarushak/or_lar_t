"use strict";


$('#base_responsive_columns').mDatatable({
    type: 'remote',
    data: {
        serverPaging: false,
        serverFiltering: false,
        serverSorting: false,
        autoColumns: false
    },
    sortable:true,
    columns:[{field:"OrderID",
        sortable:true,
        title:"Descriptions"},
        {field:"ShipCity",
            sortable:true,
            title:"Category"},
        {field:"Website",
            sortable:true,
            title:"Source"},
        {field:"Website",
            sortable:true,
            title:"Source"},
        {field:"Department",
            sortable:true,
            title:"Type"},
        {field:"ShipDate",
            sortable:true,
            title:"Edit"},
        {field:"Actions",
            sortable:true,
            title:"Status"},
        {field:"Actions",
            sortable:true,
            title:"Country"}],

    sortCallback: function (data, sort, column) {
        var field = column['field'];
        return $(data).sort(function (a, b) {
            var aField = a[field];
            var bField = b[field];
            if (sort === 'asc') {
                return parseFloat(aField) > parseFloat(bField)
                    ? 1 : parseFloat(aField) < parseFloat(bField)
                        ? -1
                        : 0;
            } else {
                return parseFloat(aField) < parseFloat(bField)
                    ? 1 : parseFloat(aField) > parseFloat(bField)
                        ? -1
                        : 0;
            }
        });
    }

});

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Getting Affiliates and Partners from Database
    //--------------------------------------------------------------
    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: laroute.action('show-affiliates-partners'),
        data: "",

    }).done(function (data) {

        manageRow(data);


        //Hide and show additional rules logic
        //--------------------------------------------------------------
        $('#m_hide').change(function () {
            if ($('#m_hide').is(":checked") === true) {
                $('#div_hide').removeAttr("hidden");
            }
            else {
                $('#div_hide').attr("hidden", true);
            }
        })


        //Affiliate and Partners edit
        //--------------------------------------------------------------
        $('tr').dblclick(function () {
            var id = $(this).attr("id");
            $.ajax({
                method: 'POST',
                dataType: 'json',
                url: laroute.action('get-affiliate-partner'),
                data: {data: id},

            }).done(function (data) {
                $.each( data, function( key, value ) {

                    $('#n_description').val(value.description);
                    $('#n_country').val(value.country);
                    $('#n_type').val(value.type);
                    $('#n_rules').val(value.rules);
                    if(value.status == true){
                        $('#n_status').attr("checked", "checked");
                    }
                    else{
                        $('#n_status').removeAttr("checked");
                    }
                })
                $('#overlay').fadeIn(400,
                    function () {
                        $('#modal_form')
                            .css('display', 'block')
                            .animate({opacity: 1, top: '50%'}, 200);
                    });
                $('#save_btn').click(function () {
                    var status = true;
                    if($('#n_status').is(":checked")){
                        status = 1;
                    }
                    else{
                        status = 0;
                    }

                    $.ajax({

                        type: 'POST',
                        dataType: 'json',
                        url: laroute.action('edit-affiliate-partner'),

                        data: {id: id,
                                description: $('#n_description').val(),
                                country: $('#n_country').val(),
                                type: $('#n_type').val(),
                                rules: $('#n_rules').val(),
                        status: status},


                    }).done(function (data) {
                        manageRow(data);
                    });

                    $('#modal_form')
                        .animate({opacity: 0, top: '45%'}, 200,
                            function () {
                                $(this).css('display', 'none');
                                $('#overlay').fadeOut(400);
                            }
                        );
                })
            })

        })



        //Delete Affiliate Partner from Database
        $('.la-scissors').click(function (e) {

            $.ajax({

                type: 'POST',

                url: laroute.action('delete-affiliate-partner'),

                data: {data: $(this).attr("name")},


            }).done(function (data) {
                manageRow(data);
            });
        })
    });

     $('#add_rule').click(function() {
         if ($('#add_rule').is(":checked")) {
             $('#div_hide').removeAttr('hidden');
         }
         else {
             $('#div_hide').attr("hidden", true);
         }
     })

});

//Rendering table
//--------------------------------------------------------------
function manageRow(data) {
    var	rows = '';
    $.each( data, function( key, value ) {
        rows = rows + '<tr id="'+value.id+'">';
        rows = rows +'<td class="edit_data"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="" class="m-checkable"><span></span></label></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.id+'</span></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.description+'</span></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.country+'</span></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.type+'</span></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.rules+'</span></td>';
        if(value.status == true){
            rows = rows + '<td class="edit_data"><span style="overflow: visible; width: 70px;"><span class="m-badge m-badge--success"><span hidden="true" id="e_status">'+value.status+'</span></span></span></td>';
        }
        else{
            rows = rows + '<td class="edit_data"><span style="overflow: visible; width: 70px;"><span class="m-badge m-badge--danger"><span hidden="true" id="e_status">'+value.status+'</span></span></span></td>';
        }
        rows = rows + '<td><i class="la la-scissors" name="'+value.id+'"></i></td>';
        rows = rows + '</tr>';
    });
    $("tbody").html(rows);
}



/*var DatatableResponsiveColumnsDemo={
    init:function(){
        $("#base_responsive_columns").mDatatable({
            data:{type:"remote",
                source:{
                read:{
                    url:"https://keenthemes.com/metronic/preview/inc/api/datatables/demos/default.php"
                }
                },
                pageSize:10,
                serverPaging:!0,
                serverFiltering:!0,
                serverSorting:!0},
            layout:{
                theme:"default",
                class:"",
                scroll:!1,
                footer:!1},
            sortable:!0,
            pagination:!0,
            search:{
                input:$("#generalSearch")},
            columns:[{field:"RecordID",
                title:"#",
                sortable:!1,
                width:40,
                textAlign:"center",
                selector:{
                class:"m-checkbox--solid m-checkbox--brand"}},
                {field:"OrderID",
                    title:"Order ID",
                    filterable:!1,
                    width:150},
                {field:"ShipCity",
                    title:"Ship City",
                    responsive:{visible:"lg"}},
                {field:"Website",
                    title:"Website",width:200,responsive:{visible:"lg"}},{field:"Department",title:"Department",responsive:{visible:"lg"}},{field:"ShipDate",title:"Ship Date",responsive:{visible:"lg"}},{field:"Actions",width:110,title:"Actions",sortable:!1,overflow:"visible",template:function(t,e,i){return'\t\t\t\t\t\t<div class="dropdown '+(i.getPageSize()-e<=4?"dropup":"")+'">\t\t\t\t\t\t\t<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">                                <i class="la la-ellipsis-h"></i>                            </a>\t\t\t\t\t\t  \t<div class="dropdown-menu dropdown-menu-right">\t\t\t\t\t\t    \t<a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\t\t\t\t\t\t    \t<a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\t\t\t\t\t\t    \t<a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\t\t\t\t\t\t  \t</div>\t\t\t\t\t\t</div>\t\t\t\t\t\t<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>\t\t\t\t\t'}}]})}};jQuery(document).ready(function(){DatatableResponsiveColumnsDemo.init()});*/


