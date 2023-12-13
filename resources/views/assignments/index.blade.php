@extends('layouts.app')

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Visit date</th>
                        <th>Client</th>
                        <th>Technician</th>
                        <th>Materials</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($interventions as $intervention)
                    <tr>
                        <td>{{ $intervention->id }}</td>
                        <td>{{ Carbon\Carbon::parse($intervention->dateTimeVisit)->isoFormat('MMM D, YYYY HH[:]mm A') }}</td>
                        <td>{{ $intervention->client->socialReason }}</td>
                        <td>{{ optional($intervention->technician)->id ?? 'N/A' }}</td>
                        <td>{{ $intervention->number_of_materials }}</td>
                        <td>
                            <div class="table-actions"><a href="{{ route('assignments.edit', $intervention->id) }}"><i class="fa-solid fa-plus"></i></a></div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No interventions found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $interventions->links('livewire.pagination') }}
        </div>
    </main>
</div>
@endsection