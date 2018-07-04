$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#m_table_1').on('dblclick', 'tbody tr', function(){
        editRow($(this).attr('id'));
    });
    showData();
})

var aff_data = {};

function showData(){
    $('#m_table_1').hide();
    var table = $('#m_table_1').DataTable();
    table.destroy();
    $('#spinner').show();

    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: laroute.action('data-filters-rules-show'),
        data:'',
    }).done(function(data){
        $('#spinner').hide();
        $('#m_table_1').show();
        $('#m_table_1').DataTable({
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
                    data: 'description',
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 1,
                    data: 'category',
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 2,
                    data: 'source',
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
                    data: {id: 'id',
                            description: 'description'},
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;"><a href="#" onclick="window.location = laroute.action('connection', {data_filters_rules_id:'`+data.id+`', data_filters_rules_description:'`+data.description+`'})" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill">
                                    <i class="la la-edit"></i>
                                </a></span>`;
                    },
                },

                {
                    targets: 5,
                    data: 'status',
                    render: function (data, type, full, meta) {
                        if(data == 1) {
                            return `
                            <span style="overflow: visible; width: 70px;"><span class="m-badge m-badge--success"><span hidden="true" id="e_status">`+data+`</span></span></span>`;
                        }
                        else{
                            return `
                            <span style="overflow: visible; width: 70px;"><span class="m-badge m-badge--danger"><span hidden="true" id="e_status">`+data+`</span></span></span>`;
                        }
                    },
                },
                {
                    targets: 6,
                    width: '30px',
                    orderable: false,
                    data: 'country',
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
            ],

        });
    });

}


function editRow (id) {
    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: laroute.action('data-filters-rules-get'),
        data: {data: id},

    }).done(function (data) {
        $.each(data, function (key, value) {
            $('#n_description').val(value.description);
            aff_data.id = id;
            $('#n_category').val(value.category);
            $('#n_source').val(value.source);
            $('#n_type').val(value.type);
            $('#n_country').val(value.country);
            aff_data.description = value.description;
            if (value.status == true) {
                $('#n_status').attr("checked", "checked");
            }
            else {
                $('#n_status').removeAttr("checked");
            }
        })
        $('#m_modal_edit').show();
        $('#edit_modal').slideDown(300);
    })
}

function saveRow(){

    closeModal();
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
        url: laroute.action('data-filters-rules-edit'),

        data: {id: aff_data.id,
            description: $('#n_description').val(),
            category: $('#n_category').val(),
            source: $('#n_source').val(),
            status: status,
            country: $('#n_country').val()},


    }).done(function () {
        showData();
    });
}


function closeModal(){
    $('#edit_modal').slideUp('fast', function(){
        $('#m_modal_edit').hide();
    })
}