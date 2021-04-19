$('#graphYear').click(function () {
    var subdelegacion = $('#select-year').val();

    $('.load').removeClass('d-none')
    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerYear/'+subdelegacion,
        success: function (result){
            var label = [];
            var data = [];
            var labelInfo = '# Emergencias';
            var type = $('#type-graph').val();
            $.each(result, function (i, item){
                label.push(item['Year']);
                data.push(item['Total']);
            });

            if (label) {
                $('.load').addClass('d-none');
            }

            $('#registros-emergencias').html('<canvas class="graph-emergencias"></canvas>');
            graphEmergencias(label, data, labelInfo, type);
        }
    })
});

function graphEmergencias(label, data, labelInfo, type) {
    var ctx = document.getElementsByClassName('graph-emergencias');

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

