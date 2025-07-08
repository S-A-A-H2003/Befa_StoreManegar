import Chart from 'chart.js/auto';

// doughnut chart
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('doughnut')?.getContext('2d');

    if (!ctx) return;

    const data = {
        labels : [
            'Less than 25',
            'Between 26 and 50',
            'Between 51 and 75',
            'More than 75'
        ],
        datasets: [{
            label: 'Pruduct Price',
            data: [status1, status2, status3 ,status4],
            backgroundColor: [
                'rgb(239, 68, 68)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(21, 128, 61)',
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'doughnut',
        data: data,
    };

    new Chart(ctx, config);
});

// pie chart
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('pie')?.getContext('2d');

    if (!ctx) return;

    const data = {
        labels : [
            'Less than 2',
            'More than 2'
        ],
        datasets: [{
            label: 'Pruduct Rating',
            data: [lessOfTowRating, moreOfTowRating],
            backgroundColor: [
                'rgb(239, 68, 68)',
                'rgb(234, 179, 8)',
            ],
            hoverOffset: 4
        }]
    };

    const config = {
        type: 'pie',
        data: data,
    };

    new Chart(ctx, config);
});

