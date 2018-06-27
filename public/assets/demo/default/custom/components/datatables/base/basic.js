var DatatablesBasicBasic = function () {
    var initTable1 = function () {
        var table = $('#m_table_3');
        // begin first table
        table.DataTable({
            retrieve: true,
            responsive: true,

            //== DOM Layout settings
            sDom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            lengthMenu: [5, 10, 25, 50],

            pageLength: 10,

            language: {
                'lengthMenu': 'Display _MENU_',
            },

            //== Order settings
            order: [[1, 'desc']],

            headerCallback: function (thead, data, start, end, display) {
                thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                        <input type="checkbox" value="" class="m-group-checkable">
                        <span></span>
                    </label>`;
            },

            columnDefs: [
                {
                    targets: 0,
                    width: '30px',
                    className: 'dt-right',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return `
                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                            <input type="checkbox" value="" class="m-checkable">
                            <span></span>
                        </label>`;
                    },
                },
                {
                    targets: 0,
                    title: 'Actions',
                    orderable: false,
                    render: function (data, type, full, meta) {
                        return `
                        <span class="dropdown">
                            <a href="#" class="btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                            </div>
                        </span>
                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="View">
                          <i class="la la-edit"></i>
                        </a>`;
                    },
                },
                {
                    targets: 6,
                    render: function (data, type, full, meta) {
                        var status = {
                            1: {'title': 'Pending', 'class': 'm-badge--brand'},
                            2: {'title': 'Delivered', 'class': ' m-badge--metal'},
                            3: {'title': 'Canceled', 'class': ' m-badge--primary'},
                            4: {'title': 'Success', 'class': ' m-badge--success'},
                            5: {'title': 'Info', 'class': ' m-badge--info'},
                            6: {'title': 'Danger', 'class': ' m-badge--danger'},
                            7: {'title': 'Warning', 'class': ' m-badge--warning'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="m-badge ' + status[data].class + ' m-badge--wide">' + status[data].title + '</span>';
                    },
                },
                {
                    targets: 7,
                    render: function (data, type, full, meta) {
                        var status = {
                            1: {'title': 'Online', 'state': 'danger'},
                            2: {'title': 'Retail', 'state': 'primary'},
                            3: {'title': 'Direct', 'state': 'accent'},
                        };
                        if (typeof status[data] === 'undefined') {
                            return data;
                        }
                        return '<span class="m-badge m-badge--' + status[data].state + ' m-badge--dot"></span>&nbsp;' +
                            '<span class="m--font-bold m--font-' + status[data].state + '">' + status[data].title + '</span>';
                    },
                },
            ],
        });

        table.on('change', '.m-group-checkable', function () {
            var set = $(this).closest('table').find('td:first-child .m-checkable');
            var checked = $(this).is(':checked');

            $(set).each(function () {
                if (checked) {
                    $(this).prop('checked', true);
                    $(this).closest('tr').addClass('active');
                }
                else {
                    $(this).prop('checked', false);
                    $(this).closest('tr').removeClass('active');
                }
            });
        });

        table.on('change', 'tbody tr .m-checkbox', function () {
            $(this).parents('tr').toggleClass('active');
        });
    };



    /*====================================================*/



    /*====================================================*/




    return {

        //main function to initiate the module
        init: function () {
            initTable1();
        },
    };

}();

// $(document).ready(function () {
//     $('#m_table_1').DataTable({
//         paging: false,
//         searching: false,
//         ordering: true,
//         info: false,
//         sScrollX: "100%",
//         sScrollInnerX: "100%",
//
//         order: [[1, 'desc']],
//
//         /* headerCallback: function (thead, data, start, end, display) {
//              thead.getElementsByTagName('th')[0].innerHTML = `
//                      <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
//                          <input type="checkbox" value="" class="m-group-checkable">
//                          <span></span>
//                      </label>`;
//          },*/
//         /*columnDefs: [
//             {
//                 targets: 0,
//                 width: '30px',
//                 className: 'dt-right',
//                 orderable: false,
//                 render: function (data, type, full, meta) {
//                     return `
//                         <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
//                             <input type="checkbox" value="" class="m-checkable">
//                             <span></span>
//                         </label>`;
//                 },
//             },
//
//
//
//         ],*/
//
//
//     });
// });

// $('#m_table_2').DataTable( {
//     paging: false,
//     searching: true,
//     ordering:  true,
//
//
// } );

/*$(document).ready(function () {
    $('#m_table_2').DataTable({
        paging: false,
        ordering: true,
        responsive: true,
        searching:true,
        info: false,
         sDom:   `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,


        order: [[1, 'desc']],

        headerCallback: function (thead, data, start, end, display) {
            thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                        <input type="checkbox" value="" class="m-group-checkable">
                        <span></span>
                    </label>`;
        },
        columnDefs: [
            {
                targets: 0,
                width: '30px',
                className: 'dt-right',
                orderable: false,
                render: function (data, type, full, meta) {
                    return `
                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                            <input type="checkbox" value="" class="m-checkable">
                            <span></span>
                        </label>`;
                },
            },



        ],


    })
});*/

$(document).ready(function () {
    $('#m_table_3').DataTable({
        paging: false,
        searching: false,
        ordering: true,
        responsive: true,
        info: false,


        order: [[1, 'desc']],

        headerCallback: function (thead, data, start, end, display) {
            thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                        <input type="checkbox" value="" class="m-group-checkable">
                        <span></span>
                    </label>`;
        },
        columnDefs: [
            {
                targets: 0,
                width: '30px',
                className: 'dt-right',
                orderable: false,
                render: function (data, type, full, meta) {
                    return `
                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                            <input type="checkbox" value="" class="m-checkable">
                            <span></span>
                        </label>`;
                },
            },



        ],


    });
});


$(document).ready(function () {
    $('#m_table_4').DataTable({
        paging: false,
        searching: false,
        ordering: true,
        info: false,
        sScrollX: "100%",
        sScrollInnerX: "100%",

        order: [[1, 'desc']],

       /* headerCallback: function (thead, data, start, end, display) {
            thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                        <input type="checkbox" value="" class="m-group-checkable">
                        <span></span>
                    </label>`;
        },*/
        /*columnDefs: [
            {
                targets: 0,
                width: '30px',
                className: 'dt-right',
                orderable: false,
                render: function (data, type, full, meta) {
                    return `
                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                            <input type="checkbox" value="" class="m-checkable">
                            <span></span>
                        </label>`;
                },
            },



        ],*/


    });
});


function RemoveLines() {
    $('.m-switch').parent().addClass('removeline');
}

jQuery(document).ready(function () {
    DatatablesBasicBasic.init();
    RemoveLines();
});