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
                            <div class="stats-flex stats-number">{{ rand(0, 5000) }}</div>
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
    </main>
</div>

@section('js')

@endsection

@endsection {{-- Section body --}}