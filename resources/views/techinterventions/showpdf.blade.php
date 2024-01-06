@extends('layouts.app')

@section('title', 'Validations')

@section('body')
<x-navbar />
<x-sidebar />

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Intervention validated</h4>
        <div class="main-block">
            <p>L'intervention vient d'être complétée avec succès, vous pouvez choisir de télécharger la fiche d'intervention ou de terminer.</p>
            <a href="{{ route('techinterventions.pdf', $intervention->id) }}" class="btn btn-primary">Download PDF</a>
            <a href="{{ route('techinterventions.index') }}" class="btn btn-secondary">Done</a>
        </div>
    </main>
</div>
@endsection