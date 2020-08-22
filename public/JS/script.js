var lineChartData = {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    datasets: [{
        label: 'Ano Atual',
        borderColor: window.chartColors.red,
        backgroundColor: window.chartColors.red,
        fill: false,
        data: [
            5,
            5,
            3,
            3,
            8,
            3,
            3,
            0,
            10,
            4,
            5,
            2
        ],
        yAxisID: 'y-axis-1',
    }, {
        label: 'Ano Anterior',
        borderColor: window.chartColors.blue,
        backgroundColor: window.chartColors.blue,
        fill: false,
        data: [
            5,
            3,
            3,
            3,
            3,
            3,
            3,
            0,
            5,
            10,
            4,
            2
        ],
        yAxisID: 'y-axis-2'
    }]
};

window.onload = function() {
    var ctx = document.getElementById('canvas2').getContext('2d');
    window.myLine = Chart.Line(ctx, {
        data: lineChartData,
        options: {
            responsive: true,
            hoverMode: 'index',
            stacked: false,
            title: {
                display: true,
                text: 'COMPARAÇÃO DE VENDAS'
            },
            scales: {
                yAxes: [{
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'left',
                    id: 'y-axis-1',
                }, {
                    type: 'linear', // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                    display: true,
                    position: 'right',
                    id: 'y-axis-2',

                    // grid line settings
                    gridLines: {
                        drawOnChartArea: false, // only want the grid lines for one axis to show up
                    },
                }],
            }
        }
    });
};

document.getElementById('randomizeData').addEventListener('click', function() {
    lineChartData.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
            return 3;
        });
    });

    window.myLine.update();
});




