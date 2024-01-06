@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Visualization intervention #{{ $intervention->id }}</h4>
        <div class="main-block">            
            <p><strong>Client:</strong> {{ $intervention->client->socialReason }}</p>
            @php
                $technician = optional($intervention->technician);
                $employee = optional($technician->employee);
            @endphp
            <p><strong>Technician:</strong> {{ implode(' ', array_filter([$employee->firstName, $employee->lastName])) ?: 'No technician assigned' }}</p>
            <p><strong>Address:</strong> {{ $intervention->client->address }}</p>
            @php
                $formattedDate = \Carbon\Carbon::parse($intervention->dateTimeVisit)->isoFormat('MMM D, YYYY HH[:]mm A');
            @endphp
            <p><strong>Intervention date:</strong> {{ $formattedDate }}</p>
            <p><strong>Number of materials:</strong> {{ $intervention->number_of_materials }}</p>

            {{-- Materials --}}
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Installation date</th>
                        <th>Label</th>
                        <th>Location</th>
                        <th>Passing time</th>
                        <th>Comment works</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($intervention->materials as $material)
                        <tr>
                            <td>{{ $material->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($material->installationDate)->isoFormat('MMM D, YYYY') }}</td>
                            <td>{{ $material->materialtype->label }}</td>
                            <td>{{ $material->location }}</td>
                            <td>{{ $material->pivot->passingTime ?? 'N/A' }}</td>
                            <td>{{ $material->pivot->commentWorks ?? 'N/A'}}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6">No materials found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection