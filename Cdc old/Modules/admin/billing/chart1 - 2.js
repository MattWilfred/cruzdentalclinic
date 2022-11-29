var ctx = document.getElementById('barChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        datasets: [{
            label: ' Earning in ₱ ',
            data: [3050, 1900, 2100, 4050, 3000, 550, 2600],
            backgroundColor: [
                'rgb(177, 0, 255)'
            ],
            borderColor: [
                'rgb(177, 0, 255)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true   
    }
});
