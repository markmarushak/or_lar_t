$(document).ready(function() {
    var dateAndTime;

    $.ajax({
        url: '/time-sent-email',
        method: 'GET',
        dataType: 'json',
        data: '',
    }).done(function(data) {
        dateAndTime = data;
    });
    var date=[];
    var time =[];

    var ctx = document.getElementById("m_chart_mail_stats").getContext("2d");
    dateAndTime.forEach(function(value, key, dateAndTime){
        date.push(value)
        time.push(key)
    })


    var gradient = ctx.createLinearGradient(0, 0, 0, 240);
    gradient.addColorStop(0, Chart.helpers.color('#00c5dc').alpha(0.7).rgbString());
    gradient.addColorStop(1, Chart.helpers.color('#f2feff').alpha(0).rgbString());

    var config = {
        type: 'line',
        data: {
            labels: [date]


            ,
            datasets: [{
                label: "email",
                backgroundColor: gradient, // Put the gradient here as a fill color
                borderColor: '#0dc8de',

                pointBackgroundColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                pointBorderColor: Chart.helpers.color('#ffffff').alpha(0).rgbString(),
                pointHoverBackgroundColor: mApp.getColor('danger'),
                pointHoverBorderColor: Chart.helpers.color('#000000').alpha(0.2).rgbString(),

                //fill: 'start',
                data: [
                    time
                ]
            }]
        },
        options: {
            title: {
                display: false,
            },
            tooltips: {
                intersect: false,
                mode: 'nearest',
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10
            },
            legend: {
                display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            hover: {
                mode: 'index'
            },
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: false,
                    gridLines: false,
                    scaleLabel: {
                        display: true,
                        labelString: 'Value'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            elements: {
                line: {
                    tension: 0.19
                },
                point: {
                    radius: 4,
                    borderWidth: 12
                }
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 5,
                    bottom: 0
                }
            }
        }
    };

    var chart = new Chart(ctx, config);
})