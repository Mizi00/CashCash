@extends('layouts.app')

@section('title', 'Clients')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Clients</h4>
        @if(session('success'))
            <div class="main-alert"><span>{{ session('success') }}</span><a id="main-alert-close"><i class="fa-solid fa-xmark"></i></a></div>
        @endif
        <div class="main-block">
            @livewire('search-clients')
        </div>
    </main>
</div>
@endsection