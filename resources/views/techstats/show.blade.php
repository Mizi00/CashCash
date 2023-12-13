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
            <canvas id="bar-chart" width="800" height="450"></canvas>
        </div>
    </main>
</div>

@section('js')
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Africa", "Asia", "Europe"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
@endsection

@endsection