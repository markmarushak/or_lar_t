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
    $('#rule_id').dblclick( function(e){
        $('#rule_text').text($('#rule_id').text());
        $('#overlay').fadeIn(400,
            function(){
                $('#modal_form')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '50%'}, 200);
            });
    })
    $('#save_btn').click( function(){
        $('#rule_id').append($('#rule_text').val());
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#overlay').fadeOut(400);
                }
            );
        $('#rule_id').text($('#rule_text').text());
    })

    $('#m_hide').change(function() {
        if ($('#m_hide').is(":checked") === true) {
            $('#div_hide').removeAttr("hidden");
        }
        else {
            $('#div_hide').attr("hidden", true);
        }
    })


    $('.la-scissors').click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            type:'POST',

            url:'affiliates-partners',

            data:{data: $(this).attr("name")},


        });
        window.location.href = window.location;
    })


});



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


