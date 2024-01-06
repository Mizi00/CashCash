@extends('layouts.app')

@section('title', "Edition client")

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Edition client</h4>
        <div class="main-block">
            <form action="{{ route('clients.update', $client->id) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="socialReason">Social reason</label>
                    <input type="text" class="form-control @error('socialReason') form-error-input @enderror" name="socialReason" id="socialReason" value="{{ $client->socialReason }}">                    
                    @error('socialReason')
                        <div class="form-error-input-text">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="sirenNum">Siren number</label>
                        <input type="number" name="sirenNum" id="sirenNum" class="form-control @error('sirenNum') form-error-input @enderror" value="{{ $client->sirenNum }}">
                        @error('sirenNum')
                            <div class="form-error-input-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="apeCode">Ape code</label>
                        <input type="text" id="apeCode" name="apeCode" class="form-control @error('apeCode') form-error-input @enderror" value="{{ $client->apeCode }}">
                        @error('apeCode')
                            <div class="form-error-input-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') form-error-input @enderror" name="address" id="address" value="{{ $client->address }}">
                    @error('address')
                        <div class="form-error-input-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-row">
                <div class="form-group">
                    <label for="phoneNumber">Phone number</label>
                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control @error('phoneNumber') form-error-input @enderror" value="{{ $client->phoneNumber }}">
                    @error('phoneNumber')
                        <div class="form-error-input-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="faxNum">Fax number</label>
                    <input type="text" name="faxNum" id="faxNum" class="form-control @error('faxNum') form-error-input @enderror" value="{{ $client->faxNum }}">
                    @error('faxNum')
                        <div class="form-error-input-text">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                    <label for="mailAddress">Mail address</label>
                    <input type="email" class="form-control @error('mailAddress') form-error-input @enderror" name="mailAddress" id="mailAddress" value="{{ $client->mailAddress }}">
                    @error('mailAddress')
                        <div class="form-error-input-text">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
</div>
@endsection
