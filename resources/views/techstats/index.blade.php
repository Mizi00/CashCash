@extends('layouts.app')

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Statistics</h4>
        <div class="main-block">
            <form action="{{ route('techstats.show') }}" method="post">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="registrationNum">Registration number</label>
                        <input type="number" min="1" name="registrationNum" id="registrationNum" class="form-control @error('registrationNum') form-error-input @enderror"
                            value="number">
                        @error('registrationNum')
                            <div class="form-error-input-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="monthyear">Month year</label>
                        <input type="month" max="{{ date('Y-m', now()->timestamp) }}" name="monthyear" id="monthyear" class="form-control @error('monthyear') form-error-input @enderror"
                            value="{{ date('Y-m', now()->timestamp) }}">
                        @error('monthyear')
                            <div class="form-error-input-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection