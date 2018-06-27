$(document).ready(function() {
    var ac = $('#query').autocomplete({
        serviceUrl: laroute.action('get-affiliates-partners-autocomplete'),
        minChars: 2,
        paramName: 'description',
        delimiter: /(,|;)\s*/,
        maxHeight: 400,
        width: 300,
        zIndex: 9999,
        deferRequestBy: 300,
        onSelect: function (data, value) {
        },
    });

    ac.enable();
})

