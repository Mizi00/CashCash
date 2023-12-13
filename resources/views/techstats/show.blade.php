@extends('layouts.app')

@php
    $chartNeeded = 1;
@endphp

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            On affiche les statistiques de {{ $technician->employee->firstName }} - {{ $date }}
        </div>
        <div class="main-block">
          <canvas id="barCanvas" aria-label="chart" role="img"></canvas>
        </div>
    </main>
</div>

@section('js')
const barCanvas = document.getElementById('barCanvas');

const data = {
    labels: ['Semaine 1', 'Semaine 2', 'Semaine 3', 'Semaine 4'],
    interventions: @json($interventionsByWeek),
    kilometres: @json($kilometersByWeek),
    duree: @json($timeSpentByWeek)
};

const barChart = new Chart(barCanvas, {
    type: 'line',
    data: {
        labels: data.labels,
        datasets: [
            {
                label: 'Interventions réalisées',
                data: data.interventions
            },
            {
                label: 'Kilomètres parcourus',
                data: data.kilometres
            },
            {
                label: 'Durée passée à contrôler le matériel',
                data: data.duree
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
                suggestedMax: 200
            }
        }
    }
})
function updateChartSize() {
    barChart.resize();
}
window.addEventListener('resize', updateChartSize);
updateChartSize();
@endsection

@endsection