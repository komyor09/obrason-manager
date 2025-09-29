document.addEventListener("DOMContentLoaded", function() {
    var options = {
        chart: {
            type: 'line',
            height: 300
        },
        series: [{
            name: 'Заказы',
            data: [10, 41, 35, 51, 49, 62, 69]
        }],
        xaxis: {
            categories: ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс']
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart-orders"), options);
    chart.render();
});