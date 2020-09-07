var linkData = 'https://solucionesalejo.com/cruzroja/public/';

$('#graphAll').click(function () {
    var year = $('#year').val();

    if (year.length < 4 || year.length > 4 || isNaN(year)) {
        return false;
    }
    $('.load').removeClass('d-none');
    $('.load-deced').removeClass('d-none');

    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerAll/'+year,
        success: function (result){
            var label = [];
            var data = [];
            var type = $('#type-graph').val();
            var labelInfo = '# Emergencias';
            $.each(result, function (i, item){
                label.push(item['Mes']);
                data.push(item['Total']);
            });

            if (label) {
                $('.load').addClass('d-none');
            }

            $('#registros-emergencias').html('<canvas class="graph-emergencias"></canvas>');
            graphEmergencias(label, data, labelInfo, type);
        }
    });

    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerAllDead/'+year,
        success: function (result){
            var label = [];
            var data = [];
            var type = 'doughnut';
            var labelInfo = '# Fallecidos';
            $.each(result, function (i, item){
                label.push(item['Mes']);
                data.push(item['Total']);
            });

            if (label) {
                $('.load-deced').addClass('d-none');
            }

            $('#registros-decesos').html('<canvas class="graph-dead"></canvas>');
            graphDead(label, data, labelInfo, type);
        }
    });

});


$('#graphDay').click(function () {
    var subdelegacion = $('#select-day').val();
    var fecha_1 = $('#fecha_1').val();
    var fecha_2 = $('#fecha_2').val();

    if (fecha_1.length === 0 || fecha_2.length === 0) {
        return false;
    }

    $('.load').removeClass('d-none');
    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerDay/'+subdelegacion+'/'+fecha_1+'/'+fecha_2,
        success: function (result){
            var label = [];
            var data = [];
            var type = $('#type-graph').val();
            var labelInfo = '# Emergencias';
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

$('#graphDayDeced').click(function () {
    var subdelegacion = $('#select-day-deced').val();
    var fecha_1 = $('#fecha1').val();
    var fecha_2 = $('#fecha2').val();

    if (fecha_1.length === 0 || fecha_2.length === 0) {
        return false;
    }

    $('.load-deced').removeClass('d-none')

    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerDayDeced/'+subdelegacion+'/'+fecha_1+'/'+fecha_2,
        success: function (result){
            var label = [];
            var data = [];
            var type = $('#type-graph-deced').val();
            var labelInfo = '# Fallecidos';

            if (result) {
                $('.load-deced').addClass('d-none')
            }

            $.each(result, function (i, item){
                label.push(item['Dias']);
                data.push(item['Total']);
            });

            $('#registros-decesos').html('<canvas class="graph-dead"></canvas>');
            graphDead(label, data, labelInfo, type);
        }
    });
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
});

$('#graphMonthDeced').click(function () {
    var subdelegacion = $('#select-month-deced').val();

    $('.load-deced').removeClass('d-none')
    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerMonthDeced/'+subdelegacion,
        success: function (result){
            var label_paciente = [];
            var data_paciente = [];
            var type = $('#type-graph-deced').val();
            var labelInfo = '# Fallecidos';

            $.each(result, function (i, item){
                label_paciente.push(item['Meses']);
                data_paciente.push(item['Total']);
            });

            if (result) {
                $('.load-deced').addClass('d-none');
            }

            $('#registros-decesos').html('<canvas class="graph-dead"></canvas>');
            graphDead(label_paciente, data_paciente, labelInfo, type);
        }
    })
});

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

$('#graphYearDeced').click(function () {
    var subdelegacion = $('#select-year-deced').val();

    $('.load-deced').removeClass('d-none')
    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerYearDeced/'+subdelegacion,
        success: function (result){
            var label = [];
            var data = [];
            var labelInfo = '# Fallecidos';
            var type = $('#type-year-deced').val();

            $.each(result, function (i, item){
                label.push(item['Year']);
                data.push(item['Total']);
            });

            if (label) {
                $('.load-deced').addClass('d-none');
            }

            $('#registros-decesos').html('<canvas class="graph-dead"></canvas>');
            graphDead(label, data, labelInfo, type);
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

function graphDead(label, data, labelInfo, type) {
    var ctx = document.getElementsByClassName('graph-dead');

    var myChart = new Chart(ctx, {
        type: type,
        data: {
            labels: label,
            datasets: [{
                label: labelInfo,
                data: data,
                backgroundColor: [
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
                    'rgb(128, 128, 128)',
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
                    'rgb(128, 0, 0)'
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
