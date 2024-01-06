@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Visualization client</h4>
        <div class="main-block">
           <p><strong>Id Client: </strong>{{ $client->id }}</p>
           <p><strong>Social Reason: </strong>{{ $client->socialReason }}</p>
           <p><strong>Siren number: </strong>{{ trim(chunk_split($client->sirenNum, 3, ' '), ' ') }}</p>
           <p><strong>APE Code: </strong>{{ $client->apeCode }}</p>
           <p><strong>Address: </strong>{{ $client->address }}</p>
           <p><strong>Phone Number: </strong>{{ trim(chunk_split($client->phoneNumber, 2, ' '), ' ') }}</p>
           <p><strong>Fax Number: </strong>{{ trim(chunk_split($client->faxNum, 2, ' '), ' ') }}</p>
           <p><strong>Mail Address: </strong>{{ $client->mailAddress }}</p>
           <p><strong>Agency: </strong>{{ $client->agencyNum }}, {{ $client->agency->name }}</p>
        </div>
    </main>
</div>
@endsection