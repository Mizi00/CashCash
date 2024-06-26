@extends('layouts.app')

@section('title', 'Validations')

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Validation intervention #{{ $intervention->id }}</h4>
        <div class="main-block">
            <form action="{{ route('techinterventions.update', $intervention->id) }}" method="post">
                @method('PATCH')
                @csrf
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
                            <td><input type="number" min="1" name="materials[{{ $material->id }}][passingTime]"
                                    value="{{ $material->pivot->passingTime }}"></td>
                            <td><input type="text" name="materials[{{ $material->id }}][commentWorks]"
                                    value="{{ $material->pivot->commentWorks }}"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="form-error-input-text">{{ $error }}</div>
                    @endforeach
                @endif

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection