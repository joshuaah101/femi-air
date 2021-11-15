import Chart from 'chart.js/auto'
const ctx = document.getElementById('myChart').getContext('2d')
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Adult', 'Child','Infant'],
        datasets: [{
            label: 'Passenger chart',
            data: [55, 30, 15],
            backgroundColor: [
                // 'rgba(255, 99, 132, 0.2)',
                // 'rgba(54, 162, 235, 0.2)',
                'orange',
                'pink',
                'green'
            ],
            borderColor: [
                // 'rgba(255, 99, 132, 1)',
                // 'rgba(54, 162, 235, 1)',
                'orange',
                'pink',
                'green'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
})