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
                <div class="form-group">
                    <label for="datetimevisit">Date of visit</label>
                    <input type="datetime-local" name="datetimevisit" id="datetimevisit" class="form-control" value="{{ $intervention->dateTimeVisit }}">
                </div>
                @if($intervention->technician == null)
                    <fieldset disabled="disabled">
                @endif
                    <div class="form-group">
                        <label for="registrationnum">Registration number</label>
                        <input type="number" name="registrationnum" id="registrationnum" class="form-control" value="{{ optional($intervention->technician)->id ?? '' }}" placeholder="{{ $intervention->technician === null ? 'No technician assigned' : '' }}">
                    </div>
                @if($intervention->technician == null)
                    </fieldset>
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection