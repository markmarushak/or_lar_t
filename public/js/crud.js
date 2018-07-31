$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    showData();



})



var type = 'All';
var id = '';


//Render Table
//-------------------------------------------------------
function showData(){
    $('#m_table_2').hide();
    var table = $('#m_table_2').DataTable();
    table.destroy();
    $('#spinner').show();

    $.ajax({
       method: 'GET',
       dataType: 'json',
       url: 'affiliates-partners/show',
       data: {data: type},
    }).done(function(data){
        $('#spinner').hide();
        $('#m_table_2').show();
        var table = $('#m_table_2').DataTable({
            paging: false,
            ordering: true,
            responsive: true,
            searching:true,
            info: false,
            sDom:   `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,


            order: [[1, 'desc']],
            data: data,
            rowId: "id",
            /*headerCallback: function (thead, data, start, end, display) {
                thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                        <input type="checkbox" value="" class="m-group-checkable">
                        <span></span>
                    </label>`;
            },*/
            columnDefs: [
                {
                    targets: 0,
                    data: 'id',
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 1,
                    data: 'name',
                    render: function (data, type, full, meta) {
                        if(data == null){
                            data = "";
                        }
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 2,
                    data: 'description',
                    render: function (data, type, full, meta) {
                        if(data == null){
                            data = "";
                        }
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 3,
                    data: 'website',
                    render: function (data, type, full, meta) {
                        if(data == null){
                            data = "";
                        }
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 4,
                    data: 'address',
                    render: function (data, type, full, meta) {
                        if(data == null){
                            data = "";
                        }
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 5,
                    data: 'country',
                    render: function (data, type, full, meta) {
                        if(data == null){
                            data = "";
                        }
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 6,
                    data: 'type',
                    render: function (data, type, full, meta) {
                        if(data == null){
                            data = "";
                        }
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },

                {
                    targets: 7,
                    width: '30px',
                    orderable: false,
                    data:{id: 'id',
                        type: 'type',
                        description: 'description'},
                    render: function (data, type, full, meta) {
                        return `
                                <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill">
                                        <i class="la la-ellipsis-h"></i>
                                    </a>
                                    <div class="m-dropdown__wrapper" style="z-index: 101;">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust" style="right: auto; left: 29.5px;"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__body">              
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav">

                                                            <li class="m-nav__item">
                                                                <a href="#" onclick=" window.location = 'affiliates-partners/edit/`+data.id+`'" class="m-nav__link">
                                                                    <i class="m-nav__link-icon flaticon-edit"></i>
                                                                    <span class="m-nav__link-text">Edit</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="#" class="m-nav__link" onclick="showModal(`+data.id+`, '`+data.description+`', '`+data.type+`')">
                                                                    <i class="m-nav__link-icon flaticon-delete-1"></i>
                                                                    <span class="m-nav__link-text">Delete</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        `;
                    },
                },
            ],

        });
    });

}



//Search in Table
//--------------------------------------------------------------
function searchData(){
    $('#m_table_2').DataTable().search($(this).val()).draw() ;
}


// //Edit record in Database
// //------------------------------------------------------------------
// function editRow (id) {
//     $.ajax({
//         method: 'POST',
//         dataType: 'json',
//         url: laroute.action('get-affiliate-partner'),
//         data: {data: id},
//
//     }).done(function (data) {
//         $.each(data, function (key, value) {
//             $('#e_description').val(value.description);
//             aff_data.id = id;
//             $('#query').val(value.country);
//             $('#e_type :contains('+value.type+')').attr("selected", "selected");
//             aff_data.description = value.description;
//
//         })
//     })
// }

// function showEditRow(tr_id)
// {
//     event.preventDefault();
//
//     editRow(tr_id);
//     var tr = ($('#'+tr_id));
//     var table = $('#m_table_2').DataTable();
//     var row = table.row(tr);
//     if (row.child.isShown()) {
//         $('.slider', row.child()).slideUp(function () {
//             row.child.hide();
//             tr.removeClass('shown');
//             id = '';
//         });
//     }
//     else {
//         if ($('tbody tr').hasClass('shown')) {
//             showEditRow($('.shown').attr('id'));
//         }
//         row.child(edit_row).show();
//         $('.slider', row.child()).slideDown('slow');
//         tr.addClass('shown');
//
//         //id = t_id;
//     }
//     var autoComplete = $('#query').autocomplete({
//         lookup: countries,
//         minChars: 2,
//         delimiter: /(,|;)\s*/,
//         maxHeight: 400,
//         width: 300,
//         zIndex: 9999,
//         deferRequestBy: 300,
//         showNoSuggestionNotice: true,
//         onSelect: function (suggestion) {
//             console.log(suggestion);
//         }
//     });
//     autoComplete.enable();
// }



//Save edited record to Database
//------------------------------------------------
// function saveRow(){
//
//
//     $.ajax({
//
//         type: 'POST',
//         dataType: 'json',
//         url: laroute.action('edit-affiliate-partner'),
//
//         data: {id: aff_data.id,
//             description: $('#e_description').val(),
//             country: $('#query').val(),
//             type: $('#e_type').val()},
//
//
//     }).done(function () {
//         showData();
//     });
// }


// function closeEditModal(){
//     $('#edit_modal').slideUp('fast', function(){
//         $('#m_modal_5').hide();
//     });
//
// }

function closeDeleteModal(){
    $('#delete_modal').slideUp('fast', function(){
        $('#m_modal_del').hide();
    });
}

function changeType(t){
    type = t;
    var temp_t = t+'s';
    $('#dropdownMenuButton').text(temp_t);
    if(type == 'Affiliate'){
        $('#add_btn').text("Add Affiliate");
    }
    else if(type == 'Partner'){
        $('#add_btn').text("Add Partner");
    }
    else if(type == 'All'){
        $('#add_btn').text("Add");
        $('#dropdownMenuButton').text(type);
    }
    showData();
}



//Delete Affiliate Partner from Database
function deleteRow() {

    $.ajax({

        type: 'DELETE',

        url: 'affiliates-partners/delete',

        data: {data: id},


    }).done(function () {
        showData();
        closeDeleteModal();
    });
}

function searchData(){
    $('#m_table_2').DataTable().search($('#m_search_input').val()).draw() ;
}

function showModal(n_id, description, type){
    id = n_id;
    $('#aff_type').text(type);
    $('#aff_id').text(n_id);
    $('#aff_descr').text(description);
    $('#m_modal_del').show();
    $('#delete_modal').slideDown(300);
}




