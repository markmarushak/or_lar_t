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
        onSelect: function (data, value) {

            $('input').on('click', function(){
                $('form').append( "<button type='submit'>Hello</button>" );
            });
        },
    });

    ac.enable();
})

