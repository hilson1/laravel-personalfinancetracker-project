@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📈 Monthly Expense Prediction</h2>

    <canvas id="expenseChart" height="100"></canvas>

    <div class="mt-4">
        <p><strong>Predicted Expense for Month {{ $predicted_month }}:</strong> Rs {{ $predicted_value }}</p>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('expenseChart').getContext('2d');

    const labels = {!! json_encode($months) !!};
    const data = {!! json_encode($totals) !!};

    // Add prediction to chart
    labels.push({{ $predicted_month }});
    data.push({{ $predicted_value }});

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels.map(m => 'Month ' + m),
            datasets: [{
                label: 'Monthly Expenses (Rs)',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.3,
                fill: true,
                pointRadius: 5,
                pointHoverRadius: 7,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Expenses with Prediction',
                    font: {
                        size: 18
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Amount (Rs)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            }
        }
    });
</script>
@endsection
