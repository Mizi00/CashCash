@extends('layouts.app')

@section('title', 'Validations')

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Validations</h4>
        @if(session('success'))
            <div class="main-alert"><span>{{ session('success') }}</span><a id="main-alert-close"><i class="fa-solid fa-xmark"></i></a></div>
        @endif
        <div class="main-block">
            @livewire('pagination-tech-interventions')
        </div>
    </main>
</div>
@endsection