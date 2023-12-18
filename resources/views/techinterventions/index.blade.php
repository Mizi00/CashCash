@extends('layouts.app')

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Validations</h4>
        <div class="main-block">
            @livewire('pagination-tech-interventions')
        </div>
    </main>
</div>
@endsection