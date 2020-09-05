var linkData = 'http://graficas.net/';

$('#graphDay').click(function () {
    var subdelegacion = $('#select-day').val();
    var fecha_1 = $('#fecha_1').val();
    var fecha_2 = $('#fecha_2').val();

    if (fecha_1 == false || fecha_2 == false) {
        return false;
    }

    $('.load').removeClass('d-none')
    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerDay/'+subdelegacion+'/'+fecha_1+'/'+fecha_2,
        success: function (result){
            var label = [];
            var data = [];
            var labelInfo = '# Emregencias';
            $.each(result, function (i, item){
                label.push(item['Dias']);
                data.push(item['Total']);
            });

            if (label) {
                $('.load').addClass('d-none');
            }

            $('#test').html('<canvas id="graph" style="height:450px"></canvas>')
            graphBar(label, data, labelInfo);
        }
    })
})

$('#graphMonth').click(function () {
    var subdelegacion = $('#select-month').val();

    $('.load').removeClass('d-none')
    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerMonth/'+subdelegacion,
        success: function (result){
            var label = [];
            var data = [];
            var labelInfo = '# Emergencias';
            $.each(result, function (i, item){
               label.push(item['Mes']);
               data.push(item['Total']);
            });

            if (label) {
                $('.load').addClass('d-none');
            }

            $('#test').html('<canvas id="graph" style="height:450px"></canvas>')
            graphBar(label, data, labelInfo);
        }
    })
})

function graphBar(label, data, labelInfo) {
    var ctx = document.getElementById('graph');

    if (ctx == false) {
        console.log('No existe el id')
    }
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: labelInfo,
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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
