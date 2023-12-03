@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            <p><strong>Client:</strong> {{ $intervention->client->socialReason }}</p>
            <p><strong>Technician:</strong> {{ optional($intervention->technician)->employee->lastName ?? 'No technician assigned' }}</p>
            <p><strong>Address:</strong> {{ $intervention->client->address }}</p>
            @php
                $formattedDate = \Carbon\Carbon::parse($intervention->dateTimeVisit)->isoFormat('MMM D, YYYY HH[:]mm A');
            @endphp
            <p><strong>Intervention date:</strong> {{ $formattedDate }}</p>
            <p><strong>Number of materials:</strong> {{ $intervention->number_of_materials }}</p>
        </div>
    </main>
</div>
@endsection