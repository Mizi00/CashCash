@extends('layouts.app')

@section('title', 'Visualization technician')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Visualization technician</h4>
        <div class="main-block">
            <p><strong>Id Technician: </strong>{{ $technician->id }}</p>        
            

            @forelse($technician->interventions as $intervention)
            <h4>Intervention n°{{ $intervention->id }} {{ $intervention->dateTimeVisit }}</h4>
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
                            <td>{{ $material->pivot->passingTime }}</td>                       
                            <td>{{ $material->pivot->commentWorks }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6">No materials found.</td></tr>
                    @endforelse
                </tbody>
            </table>
            @empty
            rien
            @endforelse
        </div>
    </main>
</div>
@endsection