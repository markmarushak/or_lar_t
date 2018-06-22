$(document).ready(function() {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    showData();

})

var type = "";

function showData(){
    if($('#affiliate').is(":checked")){
        type = $('#affiliate').val();
    }
    else{
        type = $('#partner').val();
    }

    $.ajax({
        method: 'POST',
        dataType: 'json',
        url: laroute.action('show-affiliates-partners'),
        data: {data: type},

    }).done(function (data) {

        manageRow(data);
    });
}
var aff_data = {};

function editRow (id) {
    //Affiliate and Partners edit
    //--------------------------------------------------------------
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
        $('#m_modal_5').removeAttr("hidden");
    })
}


function saveRow(){

    $('#m_modal_5').attr("hidden", true);
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


function closeModal(){
    $('#m_modal_5').attr("hidden", true);
}



//Delete Affiliate Partner from Database
function deleteRow(id) {

    $.ajax({

        type: 'POST',

        url: laroute.action('delete-affiliate-partner'),

        data: {data: id},


    }).done(function () {
        showData();
    });
}

function searchData(){
    $('#m_table_2').DataTable().search($('#m_search_input').val()).draw() ;
}


//Rendering table
//--------------------------------------------------------------
function manageRow(data) {
    var	rows = '';
    var myTable = $('#m_table_2').DataTable();
    $.each( data, function( key, value ) {
        rows = rows + '<tr id="'+value.id+'" ondblclick="editRow('+value.id+')">';
        rows = rows +'<td class="edit_data"><label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand"><input type="checkbox" value="" class="m-checkable"><span></span></label></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.id+'</span></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.description+'</span></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.country+'</span></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.type+'</span></td>';
        rows = rows + '<td class="edit_data"><span style="width: 70px;">'+value.rules+'</span></td>';
        if(value.status == 1){
            rows = rows + '<td class="edit_data text-center"><span style="overflow: visible; width: 70px;"><span class="m-badge m-badge--success"><span hidden="true" id="e_status">'+value.status+'</span></span></span></td>';
        }
        else{
            rows = rows + '<td class="edit_data text-center"><span style="overflow: visible; width: 70px;"><span class="m-badge m-badge--danger"><span hidden="true" id="e_status">'+value.status+'</span></span></span></td>';
        }
        rows = rows + '<td><i class="flaticon-cancel" style="color: red" name="'+value.id+'" onclick="deleteRow('+value.id+')"></i></td>';
        rows = rows + '</tr>';
    });
    $('#aff_table').html(rows);

}