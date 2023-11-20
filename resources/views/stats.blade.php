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
                @for($i=0;$i<4;$i++)
                <div class="stats-card">
                    <div class="stats-layer-top"><span>Total Visits</span></div>
                    <div class="stats-layer-bottom">
                        <div class="stats-flexs">
                            <div class="stats-flex"><i class="fa-solid fa-chart-simple fa-2xl"></i></div>
                            <div class="stats-flex stats-number">{{ rand(0, 5000) }}</div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        <div class="stats-width">
            <div class="stats-card normal"><img width="100%" src="https://i.ytimg.com/vi/jcwHPMYO7zg/maxresdefault.jpg" alt=""></div>
        </div>
    </main>
</div>

@section('js')

@endsection

@endsection {{-- Section body --}}