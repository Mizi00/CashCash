<?php

namespace App\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class PaginationTechInterventions extends Component
{
    use WithPagination;

    /**
     * Renders the view for listing technician's interventions with pagination.
     */
    public function render()
    {
        $interventions = Auth::user()->technician->interventions
            ->filter(function ($intervention) {
                return !$intervention->isCompleted();
            })
            ->sortBy(function ($intervention) {
                return $intervention->client->distanceKm;
            });
            
        $interventions = $this->paginate($interventions, 10);
        return view('livewire.pagination-tech-interventions', ['interventions' => $interventions]);
    }

    /**
     * Paginates the given items with the specified number of items per page.
     */
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