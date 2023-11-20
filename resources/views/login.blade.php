@extends('layouts.app')

@section('body')
<div class="page-centered">
    <h3>Login</h3>
    <form action="" method="post">
        @csrf
        <div class="form-error">Error</div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" placeholder="john.doe@example.fr">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-primary">Login</button>
    </form>
</div>
@endsection