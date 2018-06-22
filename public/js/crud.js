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
                $('#m_modal_5').removeAttr("hidden");
                $('#save_btn').click(function () {
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

                        data: {id: id,
                            description: $('#n_description').val(),
                            country: $('#n_country').val(),
                            type: $('#n_type').val(),
                            rules: $('#n_rules').val(),
                            status: status},


                    }).done(function (data) {
                        manageRow(data);
                    });
                })
            })

        })

        $('#close_btn, #close_mark').click(function(){
            $('#m_modal_5').attr("hidden", true);
        })


        //Delete Affiliate Partner from Database
        $('.flaticon-cancel').click(function (e) {

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
        rows = rows + '<td><i class="flaticon-cancel" style="color: red" name="'+value.id+'"></i></td>';
        rows = rows + '</tr>';
    });
    $("tbody").html(rows);
}