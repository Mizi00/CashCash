@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        salut
        @for($i=0;$i<44677;$i++)
        Salut!
        @endfor
    </main>
</div>
@endsection