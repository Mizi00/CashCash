@extends('layouts.app')

@section('title', "Assignment intervention #$intervention->id")

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Assignment intervention #{{ $intervention->id }}</h4>
        <div class="main-block">
            <form action="{{ route('assignments.update', $intervention->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="registrationNum">Registration number</label>
                    <select name="registrationNum" id="registrationNum" class="form-control @error('registrationNum') form-error-input @enderror">
                        @forelse($technicians as $technician)
                            <option value="{{ $technician->id }}">{{ $technician->id . ' - ' . $technician->employee->firstName . ' ' . $technician->employee->lastName }}</option>
                        @empty
                            <option value="-1">No technicians available</option>
                        @endforelse
                    </select>
                    @error('registrationNum')
                        <div class="form-error-input-text">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection