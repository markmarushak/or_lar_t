$(document).ready(function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
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
        data: report
    }).done(function (data) {
       var result = JSON.parse(data);
    });

    // column change

    var column = {};

    $('#control-col').next().find('input').click(function () {
        $(this).is(':checked') ? $(this).val(1) : $(this).val(0);
    });

    $('#control-col').click(function () {
        if ($(this).hasClass('send') && $(this).next().is(':visible')){

            var arr = $(this).next().find('input');
            arr.each(function () {
                column[this.name] = {status:this.value};
            });
            $('#t-info').html('');
            console.log('html clear');

            $('#spinner').show();

            $.ajax({
                method: 'POST',
                dataType:'html',
                url: '/affiliate-service/compaigns/ajax',
                data: {_token:CSRF_TOKEN,data:column}
            }).done(function (data) {
                $('#spinner').hide();

                $('#t-info').append(data);
                console.log('html add');
            });


            column = {};
        }
    });
    $('#control-col').click(function () {
        if (!$(this).hasClass('send')){
            $(this).addClass('send');
            $(this).text('apply');
        }else if($(this).next().is(':visible'))
        {
            $(this).removeClass('send');
            $(this).text('control column');
        }
    });


});