$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var id = ''
var project_id = ''
var conditionalLogic = `<div id="div_hide" class="slider" style="display: none">
                        <form class="form-inline">
                            <div class="form-group m-form__group">
    
                                <div class=" form-group">
                                    <select class="form-control" style="width:110px" id="m_zip_code">
                                        <option value="top">ZipCode</option>
                                        <option value="bottom">Bottom</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <select class="form-control ml-3" id="m_from">
                                            <option value="top">From</option>
                                            <option value="bottom">Bottom</option>
                                        </select>
                                    </div>
                                    <input type="text" class="form-control col-3 ml-3" id="m_zip_val">
                                </div>
                                <div class="form-group">
                                    <div class=" form-group">
                                        <select class="form-control" id="m_from_2">
                                            <option value="top">To</option>
                                            <option value="bottom">Bottom</option>
                                        </select>
                                    </div>
                                    <input type="text" class="form-control col-3 ml-3" id="m_zip_val_2">
                                    
                                </div>
                            </div>
                        </form>
                        <form class="form-inline">
                            <div class="form-group m-form__group pt-2">
    
                                <div class=" form-group">
                                    <select class="form-control" style="width:110px" id="m_material">
                                        <option value="top">Material</option>
                                        <option value="bottom">Bottom</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control ml-3" id="m_material_is">
                                        <option value="top">Is</option>
                                        <option value="bottom">Bottom</option>
                                    </select>
                                </div>
    
                                <div class="form-group">
                                    <div class=" form-group">
                                        <select class="form-control ml-3" id="m_material_2">
                                            <option value="top">Stone</option>
                                            <option value="bottom">Bottom</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="pt-2">
                            <a href="#" onclick="addRule()" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
    <span>
    <i class="la la-plus"></i>
    <span id="add_btn">Add Rule</span>
    </span>
                            </a>
                        </div>
                </div>
                </div>
                </div>`;


$(document).ready(function() {

    var ac = $('#query').autocomplete({
        serviceUrl: '/affiliate-service/affiliates-partners/acaffiliates',
        // serviceUrl: laroute.action('get-affiliates-partners-autocomplete'),
        type: "GET",
        minChars: 2,
        delimiter: /(,|;)\s*/,
        maxHeight: 400,
        width: 300,
        zIndex: 9999,
        deferRequestBy: 300,
        showNoSuggestionNotice: true,
    });

    ac.enable();

    showData();
})

function showData()
{

    var table = $('#m_table_4').DataTable();
    table.clear();
    table.destroy();
    project_id = $('#project_id').val();
    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: laroute.action('show-partners'),
        data: {id: project_id},
    }).done(function(data){
        var table = $('#m_table_4').DataTable({
            paging: false,
            ordering: true,
            responsive: true,
            searching:true,
            info: false,
            sDom:   `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,


            order: [[1, 'desc']],
            data: data,
            rowId: "affiliate_partner_id",
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
                    data: 'affiliate_partner_id',
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
                    data: 'rules',
                    render: function (data, type, full, meta) {
                        return `
                        <span style="width: 70px;">`+data+`</span>`;
                    },
                },
                {
                    targets: 5,
                    width: '30px',
                    orderable: false,
                    data:{id: 'affiliate_partner_id',
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
                                                                <a href="#" class="m-nav__link" onclick="showModal(`+data.affiliate_partner_id+`, '`+data.description+`', '`+data.type+`')">
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

        $('#m_table_4').on('dblclick', 'tbody tr', function(){
            showConditionalLogic(table, $(this), $(this).attr("id"));
        });

    });

}



function deletePartner()
{

    $.ajax({

        type: 'POST',

        url: laroute.action('delete-partners'),

        data: {data_filter_rules_id: project_id,
                affiliate_partner_id: id},


    }).done(function () {
        showData();
        closeDeleteModal();

    });
}

function addPartner()
{

    $.ajax({

        type: 'POST',
        dataType: 'json',
        url: laroute.action('add-partners'),

        data: {affiliates_partners_description: $('#query').val(),
                data_filters_rules_id: $('#project_id').val()},


    }).done(function () {
        showData();
    });
}

function addRule()
{
    var newRule = $('#m_zip_code :selected').text()+' '+$('#m_from :selected').text()+' '+$('#m_zip_val').val()+' '+$('#m_from_2 :selected').text()+' '+$('#m_zip_val_2').val()+' '+$('#m_material :selected').text()+' '+$('#m_material_is :selected').text()+' '+$('#m_material_2 :selected').text();
    $.ajax({

        type: 'POST',
        dataType: 'json',
        url: laroute.action('add-rules'),

        data: {affiliate_partner_id: id,
            new_rule: newRule},


    }).done(function () {
        showData();
    });
}

function showConditionalLogic(table, tr, t_id)
{
    console.log(tr);
    var row = table.row( tr );
    if ( row.child.isShown() ) {
        $('.slider', row.child()).slideUp( function () {
            row.child.hide();
            tr.removeClass('shown');
            id = '';
        } );
    }
    else {
        if ( $('tbody tr').hasClass('shown') ) {
            showConditionalLogic(table, $('.shown'));
        }
        row.child(conditionalLogic).show();
        tr.addClass('shown');

        $('.slider', row.child()).slideDown();
        id = t_id;
    }
}

function showModal(n_id, description, type)
{
    id = n_id;
    $('#aff').text(type);
    $('#aff_id').text(n_id);
    $('#aff_descr').text(description);
    $('#m_modal_del').show();
    $('#delete_modal').slideDown(300);
}

function closeDeleteModal()
{
    $('#delete_modal').slideUp('fast', function(){
        $('#m_modal_del').hide();
    });
}

