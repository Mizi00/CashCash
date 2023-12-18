@extends('layouts.app')

@php
    $chartNeeded = 1;
@endphp

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">          
        <div class="stats-width">
            <div class="stats-cards">
                <div class="stats-card">
                    <div class="stats-layer-top"><span>Total Clients</span></div>
                    <div class="stats-layer-bottom">
                        <div class="stats-flexs">
                            <div class="stats-flex"><i class="fa-solid fa-chart-simple fa-2xl"></i></div>
                            <div class="stats-flex stats-number">{{ \App\Models\Client::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="stats-card">
                    <div class="stats-layer-top"><span>Total Technicians</span></div>
                    <div class="stats-layer-bottom">
                        <div class="stats-flexs">
                            <div class="stats-flex"><i class="fa-solid fa-chart-simple fa-2xl"></i></div>
                            <div class="stats-flex stats-number">{{ \App\Models\Technician::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="stats-card">
                    <div class="stats-layer-top"><span>Total Unassigned Intervention</span></div>
                    <div class="stats-layer-bottom">
                        <div class="stats-flexs">
                            <div class="stats-flex"><i class="fa-solid fa-chart-simple fa-2xl"></i></div>
                            <div class="stats-flex stats-number">{{ \App\Models\Intervention::where('registrationNum', null)->count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="stats-card">
                    <div class="stats-layer-top"><span>Total Interventions</span></div>
                    <div class="stats-layer-bottom">
                        <div class="stats-flexs">
                            <div class="stats-flex"><i class="fa-solid fa-chart-simple fa-2xl"></i></div>
                            <div class="stats-flex stats-number">{{ \App\Models\Intervention::count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stats-width">
            <div class="stats-card normal"><canvas id="barCanvas" aria-label="chart" role="img"></canvas></div>
        </div>
    </main>
</div>

@section('js')
const barCanvas = document.getElementById('barCanvas');

const barChart = new Chart(barCanvas, {
    type: 'bar',
    data: {
        labels: ['Total Clients', 'Total Interventions', 'Total Technicians', 'Total Unassigned Intervention'],
        datasets: [
            {
                label: 'Totals',
                data: [{{ \App\Models\Client::count() }}, {{ \App\Models\Intervention::count() }}, {{ \App\Models\Technician::count() }}, {{ \App\Models\Intervention::where('registrationNum', null)->count() }}],
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 192, 192)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

function updateChartSize() {
    barChart.resize();
}

window.addEventListener('resize', updateChartSize);
updateChartSize();
@endsection

@endsection {{-- Section body --}}