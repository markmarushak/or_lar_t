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
var aff_data = {};

//Render Table
//-------------------------------------------------------
function showData(){

    var table = $('#m_table_2').DataTable();
    table.destroy();

    $.ajax({
       method: 'POST',
       dataType: 'json',
       url: laroute.action('show-affiliates-partners'),
       data: {data: type},
    }).done(function(data){
        $('#m_table_2').DataTable({
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
                    data: 'description',
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 2,
                    data: 'country',
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 3,
                    data: 'type',
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },

                {
                    targets: 4,
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
                                                                <a href="#" onclick="editRow(`+data.id+`)" class="m-nav__link">
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


//Edit record in Database
//------------------------------------------------------------------
function editRow (id) {
    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: laroute.action('get-affiliate-partner'),
        data: {data: id},

    }).done(function (data) {
        $.each(data, function (key, value) {
            $('#n_description').val(value.description);
            aff_data.id = id;
            $('#n_country').val(value.country);
            $('#n_type').val(value.type);
            $('#n_rules').val(value.rules);
            aff_data.description = value.description;
            if (value.status == true) {
                $('#n_status').attr("checked", "checked");
            }
            else {
                $('#n_status').removeAttr("checked");
            }
        })
        $('#m_modal_5').show();
        $('#edit_modal').slideDown(300);
    })
}

//Save edited record to Database
//------------------------------------------------
function saveRow(){

    closeEditModal();
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

        data: {id: aff_data.id,
            description: $('#n_description').val(),
            country: $('#n_country').val(),
            type: $('#n_type').val(),
            rules: $('#n_rules').val(),
            status: status},


    }).done(function () {
        showData();
    });
}


function closeEditModal(){
    $('#edit_modal').slideUp('fast', function(){
        $('#m_modal_5').hide();
    });

}

function closeDeleteModal(){
    $('#delete_modal').slideUp('fast', function(){
        $('#m_modal_4').hide();
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

        type: 'POST',

        url: laroute.action('delete-affiliate-partner'),

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
    $('#aff').text(type);
    $('#aff_id').text(n_id);
    $('#aff_descr').text(description);
    $('#m_modal_4').show();
    $('#delete_modal').slideDown(300);
}


