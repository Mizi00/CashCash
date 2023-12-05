@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            <form action="{{ route('interventions.update', $intervention->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="dateTimeVisit">Date of visit</label>
                    <input type="datetime-local" name="dateTimeVisit" id="dateTimeVisit" class="form-control" value="{{ $intervention->dateTimeVisit }}">
                </div>
                @if($intervention->technician == null)
                    <fieldset disabled="disabled">
                @endif
                    <div class="form-group">
                        <label for="registrationNum">Registration number</label>
                        <input type="number" name="registrationNum" id="registrationNum" class="form-control" value="{{ optional($intervention->technician)->id ?? '' }}" placeholder="{{ $intervention->technician === null ? 'No technician assigned' : '' }}">
                    </div>
                @if($intervention->technician == null)
                    </fieldset>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            {{-- Materials --}}
            {{-- 
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
                    @foreach($intervention->materials as $material)
                    <tr>
                        <td>{{ $material->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($material->installationDate)->isoFormat('MMM D, YYYY') }}</td>
                        <td>{{ $material->materialtype->label }}</td>
                        <td>{{ $material->location }}</td>
                        <td>{{ $material->pivot->passingTime }}</td>
                        <td>{{ $material->pivot->commentWorks }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            --}}

        </div>
    </main>
</div>
@endsection