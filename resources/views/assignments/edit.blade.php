@extends('layouts.app')

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            <form action="{{ route('assignments.update', $intervention->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="registrationNum">Registration number</label>
                    <input type="number" name="registrationNum" id="registrationNum" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection