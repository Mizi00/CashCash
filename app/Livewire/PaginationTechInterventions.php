<?php

namespace App\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class PaginationTechInterventions extends Component
{
    use WithPagination;
    public function render()
    {
        $interventions = Auth::user()->technician->interventions
            ->filter(function ($intervention) {
                return !$intervention->isCompleted();
            })
            ->sortby(function ($intervention) {
                return $intervention->client->distanceKm;
            });
            
        $interventions = $this->paginate($interventions, 10);
        return view('livewire.pagination-tech-interventions', ['interventions' => $interventions]);
    }

    private function paginate($items, $perPage)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $items->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $paginatedItems = new LengthAwarePaginator(
            $currentItems,
            count($items),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
        return $paginatedItems;
    }
}