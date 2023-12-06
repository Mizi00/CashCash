@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
           <p><strong>Id Client: </strong>{{ $client->id }}</p>
           <p><strong>Social Reason: </strong>{{ $client->socialReason }}</p>
           <p><strong>APE Code: </strong>{{ $client->apeCode }}</p>
           <p><strong>Address: </strong>{{ $client->address }}</p>
           <p><strong>Phone Number: </strong>{{ $client->phoneNumber }}</p>
           <p><strong>Fax Number</strong>{{ $client->faxNumber }}</p>
           <p><strong>Mail Address: </strong>{{ $client->mailAddress }}</p>
           <p><strong>Agency Number: </strong>{{ $client->agencyNum }}</p>
        </div>
    </main>
</div>
@endsection