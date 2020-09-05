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
            var type = $('#type-graph').val();
            var labelInfo = '# Emregencias';
            $.each(result, function (i, item){
                label.push(item['Dias']);
                data.push(item['Total']);
            });

            if (label) {
                $('.load').addClass('d-none');
            }

            $('#registros-emergencias').html('<canvas class="graph-emergencias"></canvas>');
            graphEmergencias(label, data, labelInfo, type);
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
            var label_paciente = [];
            var data_paciente = [];
            var type = $('#type-graph').val();
            var labelInfo = '# Emergencias';
            $.each(result, function (i, item){
               label_paciente.push(item['Meses']);
               data_paciente.push(item['Total']);


            });

            if (result) {
                $('.load').addClass('d-none');
            }

            $('#registros-emergencias').html('<canvas class="graph-emergencias"></canvas>');
            graphEmergencias(label_paciente, data_paciente, labelInfo, type);
        }
    })
})

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

function graphDecesos(label, data) {
    var ctx = document.getElementsByClassName('graph-decesos');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: label,
            datasets: [{
                label: '# Fallecidos',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(153, 102, 255)',
                    'rgba(255, 159, 64)'
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
