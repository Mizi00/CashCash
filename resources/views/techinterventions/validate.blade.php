@extends('layouts.app')

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            <form action="" methode="post">
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
                            <td><input type="number" name="materials[{{ $material->id }}][passingTime]"
                                    value="{{ $material->pivot->passingTime }}"></td>
                            <td><input type="text" name="materials[{{ $material->id }}][commentWorks]"
                                    value="{{ $material->pivot->commentWorks }}"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection