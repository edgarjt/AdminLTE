$('#action').change(function (e){
    var action = $('#action').val();
    if (action === 'day') {
        $('#dateOne').removeClass('d-none');
        $('#year').addClass('d-none');

    }else if (action === 'month') {
        $('#dateOne').removeClass('d-none');
        $('#year').addClass('d-none');

    }else if (action === 'twoMonth') {
        $('#dateOne').removeClass('d-none');
        $('#year').addClass('d-none');

    }else if (action === 'year') {
        $('#dateOne').addClass('d-none');
        $('#year').removeClass('d-none');
    }
});

$('#graph').click(function () {
    var dateOne = $('#dateOne').val();
    var dateYear = $('#year').val();
    var service = $('#service').val();
    var action = $('#action').val();
    var data;

    if (action === 'day' || action === 'month' || action === 'twoMonth') {
        data = {
            'action': action,
            'date': dateOne
        }
    }else if (action === 'year') {
        data = {
            'action': action,
            'date': dateYear
        }
    }

    console.log(data);

    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'graph/tipServicio',
        data: data,
        success: function (result){
            console.log(result.type);
            var label = [];
            var data = [];
            var labelInfo = '#' + result.type;

            var className = 'graph-emergencias';
            $.each(result.data, function (i, item){
                label.push(item['servicio']['emergencia']);
                data.push(item['total']);
            });

            $('.graphDay').html('<canvas class="graph-emergencias"></canvas>');
            graph(label, data, labelInfo || 'No se encontro resultados', 'bar', className);
        }
    })
});

function graph(label, data, labelInfo, type, className) {
    var ctx = document.getElementsByClassName(className);

    var myChart = new Chart(ctx, {
        type: type,
        data: {
            labels: label,
            datasets: [{
                label: labelInfo,
                data: data,
                backgroundColor: [
                    'rgba(75, 192, 192)',
                    'rgba( 0, 255, 35 )',
                    'rgba( 255, 0, 201)',
                    'rgba( 255, 143, 0 )',
                    'rgba( 255, 228, 0 )',
                    'rgba( 0, 143, 255)',
                    'rgba( 255, 0, 255 )',
                    'rgb(205, 92, 92)',
                    'rgb(0, 128, 0)',
                    'rgb(128, 128, 0)',
                    'rgb(128, 128, 128)',
                    'rgb(128, 0, 0)',
                    'rgb(255, 255, 0)',
                    'rgb(0, 255, 255)',
                    'rgb(0, 128, 128)',
                    'rgba(255, 99, 132)',
                    'rgb(0, 0, 255)',
                    'rgb(0, 0, 128)',
                    'rgba(255, 206, 86)',
                    'rgba(153, 102, 255)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 99, 132)',
                    'rgba( 255, 143, 0 )',
                    'rgba(75, 192, 192)',
                    'rgba( 255, 228, 0 )',
                    'rgba( 0, 143, 255)',
                    'rgba( 255, 0, 255 )',
                    'rgb(205, 92, 92)',
                    'rgb(0, 128, 0)',
                    'rgb(128, 128, 0)',
                    'rgb(128, 128, 128)'

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

}

