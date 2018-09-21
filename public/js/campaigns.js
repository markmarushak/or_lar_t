$(document).ready(function () {

    $('#btnGroupDrop1').click(function () {
       var arr = $(this).next()
           arr.each(function () {

           });
    });
    var report = {
        include: null,
        filter: null,
        limit: null,
        groupBy: null
    };

    $.ajax({
        method: 'POST',
        url: 'affiliate-service/compaigns',
        data: {include: }
    }).done(function (data) {
       var re
    });

});