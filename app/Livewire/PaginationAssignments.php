<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Intervention;
use Livewire\WithPagination;

class PaginationAssignments extends Component
{
    use WithPagination;

    public function render()
    {
        $interventions = Intervention::whereNull('registrationNum')->paginate(10);
        return view('livewire.pagination-assignments', ['interventions' => $interventions]);
    }
}
