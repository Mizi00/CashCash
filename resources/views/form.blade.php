@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <div class="main-block">
            <form action="">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter email">
                    <small class="text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="main-block">
            <form action="">
                <div class="form-row">
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="email" id="firstname" class="form-control" placeholder="Enter firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="email" id="lastname" class="form-control" placeholder="Enter lastname">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address">
                </div>

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="" id="comment" cols="30" class="form-control" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection