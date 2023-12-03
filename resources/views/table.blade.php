@extends('layouts.app')

@section('body')
<x-navbar/>
<x-sidebar/>

@php
    $data = collect([
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Jane'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    ['id' => 3, 'name' => 'Doe'],
    // Ajoutez d'autres éléments selon vos besoins
]); // Remplacez cela par votre propre collection de données
    $perPage = 10; // Nombre d'éléments par page
    $currentPage = \Illuminate\Pagination\Paginator::resolveCurrentPage('page') ?: 1;
    $currentItems = $data->slice(($currentPage - 1) * $perPage, $perPage)->all();
    $data = new \Illuminate\Pagination\LengthAwarePaginator($currentItems, count($data), $perPage, $currentPage, ['path' => \Illuminate\Pagination\Paginator::resolveCurrentPath()]);
@endphp

<div class="page-container">
    <main class="main-content">
        <h4 class="main-title">Data tables</h4>
        <div class="main-block">
            <div class="table-search spaced">
                <label>Show <select name="" id=""><option value="10">10</option><option value="25">25</option><option value="50">50</option></select> entries</label>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0;$i<10;$i++)
                    <tr>
                        <td>Angelica Ramos</td>
                        <td>Chief Executive Officer (CEO)</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2009/10/09</td>
                        <td>$1,200,000</td>
                        <td><div class="table-actions"><a href="/interventions/view/{{ $i }}"><i class="fa-regular fa-eye"></i></a><a href="/interventions/edit/{{ $i }}"><i class="fa-regular fa-pen-to-square"></i></a></div></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
            {{ $data->links('pagination.default') }}
        </div>
    </main>
</div>
@endsection