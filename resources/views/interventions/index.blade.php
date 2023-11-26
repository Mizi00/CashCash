@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            <div class="table-search">
                <label>Search:<input type="search" aria-controls="table"></label>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>                
                <tbody>
                    @foreach($interventions as $intervention)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($intervention->dateTimeVisit)->format('d/m/Y H:i') }}</td>
                            <td>Chief Executive Officer (CEO)</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2009/10/09</td>
                            <td>$1,200,000</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $interventions->links('pagination.default') }}
        </div>
    </main>
</div>
@endsection