var ctx = document.getElementById('lineChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: ' Earning in ₱ ',
            data: [2050, 1900, 2100, 4050, 3000, 3550, 2600, 2450, 3850, 3770, 4950, 5500,],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255,0,0)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true   
    }
});
