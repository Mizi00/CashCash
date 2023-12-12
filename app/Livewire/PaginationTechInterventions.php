<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class PaginationTechInterventions extends Component
{
    use WithPagination;
    public function render()
    {
        $interventions = Auth::user()->Technician->interventions
            ->filter(function ($intervention) {
                return !$intervention->isCompleted();
            })->sortby(function ($intervention) {
                return $intervention->client->distanceKm;
            })
            ->paginate(2);
        return view('livewire.pagination-tech-interventions', ['interventions' => $interventions]);
    }
}
