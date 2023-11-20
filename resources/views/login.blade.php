@extends('layouts.app')

@section('body')
<div class="page-centered">
    <h3>Login</h3>
    <form action="{{ route('login-post') }}" method="post">
        @csrf
        @if(session('error'))
            <div class="form-error">{{ session('error') }}</div>
        @endif        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="mailAddress" class="form-control" placeholder="john.doe@example.fr">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-primary">Login</button>
    </form>
</div>
@endsection