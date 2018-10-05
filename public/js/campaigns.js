$(document).ready(function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('#btnGroupDrop1').click(function () {
       var arr = $(this).next()
           arr.each(function () {

           });
    });
    var report = {
        include: 'ALL',
        filter: null,
        limit: 50,
        time: 'today',
        groupBy: 'campaign'
    };

    $.ajax({
        method: 'POST',
        url: 'affiliate-service/campaigns',
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
                url: '/affiliate-service/campaigns/ajax',
                data: {_token:CSRF_TOKEN,column:column,data:report}
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
            $(this).css({
                'width':$(this).width(),
                'justify-content':'center'
            });
            $(this).text('Apply');
        }else if($(this).next().is(':visible'))
        {
            $(this).css('width','auto');
            $(this).removeClass('send');
            $(this).text('Control column');
        }
    });

    // render parameter response
    var limits = [50,100,200,500,1000],
        include = ['ALL','ACTIVE','ARCHIVED','TRAFFIC','ENTITY'],
        time = ['today'];

    selectParameters($('#limit'),limits);
    selectParameters($('#include'),include);
    selectParameters($('#time'),time);

    function selectParameters(id,array) {
        $(id).html('');
        for (var i=0;i<array.length;i++)
        {
            $(id).append('<option value="'+array[i]+'">'+array[i]+'</option>');
        }
        selectParametrChange(id);
    }

    function selectParametrChange(id) {
        $(id).change(function () {
            report[id.attr('name')] = $(id).val();
            $('#t-info').html('');
            console.log('html clear');
            $('#spinner').show();

            console.log(report);
            $.ajax({
                method: 'POST',
                dataType:'html',
                url: '/affiliate-service/campaigns/ajax',
                data: {_token:CSRF_TOKEN,data:report}
            }).done(function (data) {
                $('#spinner').hide();

                $('#t-info').append(data);
                console.log('html add');
            });
        });
    }

        $('#filter-from').submit(function (event) {
            event.preventDefault();
            var id = $(this).find('#filter');
            report[id.attr('name')] = $(id).val();

            $('#t-info').html('');
            console.log('html clear');
            $('#spinner').show();

            $.ajax({
                method: 'POST',
                dataType: 'html',
                url: '/affiliate-service/campaigns/ajax',
                data: {_token: CSRF_TOKEN, data: report}
            }).done(function (data) {
                $('#spinner').hide();

                $('#t-info').append(data);
                console.log('html add');
            });
        });
});