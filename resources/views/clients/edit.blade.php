@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            <form action="{{ route('clients.update', $client->id) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="socialReason">Social reason</label>
                    <input type="text" class="form-control" id="socialReason" value="{{ $client->socialReason }}">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="sirenNum">Siren number</label>
                        <input type="number" id="sirenNum" class="form-control" value="{{ $client->sirenNum }}">
                    </div>
                    <div class="form-group">
                        <label for="apeCode">Ape code</label>
                        <input type="text" id="apeCode" class="form-control" value="{{ $client->apeCode }}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" value="{{ $client->address }}">
                </div>
                <div class="form-row">
                <div class="form-group">
                    <label for="phoneNumber">Phone number</label>
                    <input type="text" id="phoneNumber" class="form-control" value="{{ $client->phoneNumber }}">
                </div>
                <div class="form-group">
                    <label for="faxNum">Fax number</label>
                    <input type="text" id="faxNum" class="form-control" value="{{ $client->faxNum }}">
                </div>
                </div>
                <div class="form-group">
                    <label for="mailAddress">Mail address</label>
                    <input type="email" class="form-control" id="mailAddress" value="{{ $client->mailAddress }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection
