@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Edition intervention #{{ $intervention->id }}</h4>
        <div class="main-block">
            <form action="{{ route('interventions.update', $intervention->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="dateTimeVisit">Date of visit</label>
                    <input type="datetime-local" name="dateTimeVisit" id="dateTimeVisit" class="form-control @error('dateTimeVisit') form-error-input @enderror" value="{{ $intervention->dateTimeVisit }}">
                    @error('dateTimeVisit')
                        <div class="form-error-input-text">{{ $message }}</div>
                    @enderror
                </div>
                @if($intervention->technician == null)
                    <fieldset disabled="disabled">
                @endif
                    <div class="form-group">
                        <label for="registrationNum">Registration number</label>
                        <input type="number" name="registrationNum" id="registrationNum" class="form-control @error('registrationNum') form-error-input @enderror" value="{{ optional($intervention->technician)->id ?? '' }}" placeholder="{{ $intervention->technician === null ? 'No technician assigned' : '' }}">
                        @error('registrationNum')
                            <div class="form-error-input-text">{{ $message }}</div>
                        @enderror
                    </div>
                @if($intervention->technician == null)
                    </fieldset>
                @endif

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
                                <td>
                                    <input type="number" name="materials[{{ $material->id }}][passingTime]" value="{{ $material->pivot->passingTime }}">
                                </td>                       
                                <td><input type="text" name="materials[{{ $material->id }}][commentWorks]" value="{{ $material->pivot->commentWorks }}"></td>
                            </tr>
                        @empty
                            <tr><td colspan="6">No materials found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="form-error-input-text">{{ $error }}</div>
                    @endforeach
                @endif

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('interventions.pdf', $intervention->id) }}"><button class="btn btn-secondary" type="button">Download PDF</button></a>
            </form>
        </div>
    </main>
</div>
@endsection