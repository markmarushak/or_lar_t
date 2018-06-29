$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
        onSelect: function (e) {
             if(!($('*').is('#ac_btn'))) {
                 $('#auto_complete').append(`<a href="#" onclick="" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air" id="ac_btn">
                            <span>
                                <i class="la la-plus"></i>
                                <span id="add_btn">Add</span>
                            </span>
                        </a>`);
             }
        },
    });

    ac.enable();
})

