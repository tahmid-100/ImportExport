

@extends('layouts.adminMaster')

@section('title', 'Dashboard')

@section('content')
<div class="container1">
    <h2 class="header">Orders Distribution by Category</h2>
    <canvas id="ordersPieChart"></canvas>
</div>
@endsection

<style>
    .container1 {
        margin-top: 80px;
        max-width: 1000px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-left: auto;
        margin-right: auto; 
    }

    .header {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        color: #333;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('ordersPieChart').getContext('2d');
        var ordersByCategory = @json($ordersByCategory);

        var labels = ordersByCategory.map(function(item) {
            return item.category_name;
        });

        var data = ordersByCategory.map(function(item) {
            return item.count;
        });

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Orders by Category',
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
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        
                    }
                }
            },
        });
    });
</script>
