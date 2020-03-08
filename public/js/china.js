var file = 'data/csv/china.csv';
d3.csv(file).then(getChina);
function getChina(data) {
    var date = data.map(function (d) { return d.Date });
    var confirmed = data.map(function (d) { return d.Confirmed });
    var deaths = data.map(function (d) { return d.Deaths });
    var recovered = data.map(function (d) { return d.Recovered });

    var ctx = document.getElementById('chartChina');
    var chartChina = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: ['Confirmed', 'Recovered', 'Deaths'],
            datasets: [{
                label: 'Covid-19 ',
                data: [confirmed, recovered, deaths],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            layout: {
                padding: {
                    left: 20,
                    right: 80,
                    top: 0,
                    bottom: 0
                }
            }
        }
    });
}