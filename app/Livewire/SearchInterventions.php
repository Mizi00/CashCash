<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Intervention;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class SearchInterventions extends Component
{
    use WithPagination;
    
    public $searchDate, $searchTech;

    public function render()
    {
        $interventions = Intervention::query();            

        if ($this->searchTech) {
            $interventions->where('registrationNum', $this->searchTech);
        } elseif ($this->searchDate) {
            $interventions->where(DB::raw('DATE_FORMAT(dateTimeVisit, "%Y-%m-%d")'), $this->searchDate);
        }
        $interventions = $interventions->paginate(10);

        return view('livewire.search-interventions', compact('interventions'));
    }

    public function updatingSearchDate()
    {
        $this->gotoPage(1);
    }

    public function updatingSearchTech()
    {
        $this->gotoPage(1);
    }
}