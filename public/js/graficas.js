var linkData = 'http://graficas.net/';
$(document).ready(function () {
    $.ajax({
        contentType:'aplication/json',
        dataType: 'json',
        type: 'GET',
        url:linkData+'registerDay',
        success: function (result){
            console.log(result);
/*            $.each(result, function (i, item){
               cons
            });*/

        }
    })
})

function test(data) {
    var ctx = document.getElementById('barDay');
    var menu = data;
    var test = [4, 19, 3, 5];
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: menu,
            datasets: [{
                label: '# of Votes',
                data: test,
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
