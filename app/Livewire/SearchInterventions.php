<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Intervention;
use Illuminate\Support\Facades\DB;

class SearchInterventions extends Component
{
    public $searchDate;

    public function render()
    {
        $interventions = Intervention::query();

        if($this->searchDate)
        {
            $interventions->where(DB::raw('DATE_FORMAT(dateTimeVisit, "%Y-%m-%d")'), $this->searchDate);
        }

        $interventions = $interventions->paginate(10);

        return view('livewire.search-interventions', compact('interventions'));
    }
}
