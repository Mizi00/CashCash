<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Technician;
use App\Models\Intervention;
use Livewire\WithPagination;

class SearchInterventions extends Component
{
    use WithPagination;

    /**
     * The search criteria for date.
     */
    public $searchDate;

    /**
     * The search criteria for technician registration number.
     */
    public $searchTech;

    /**
     * Number of items to display per page.
     */
    public $perPage = 10;

    /**
     * Render the Livewire component.
     */
    public function render()
    {
        $interventions = Intervention::query();            

        if ($this->searchTech) {
            $interventions->where('registrationNum', $this->searchTech);
        } elseif ($this->searchDate) {
            $interventions->whereDate('dateTimeVisit', $this->searchDate);
        }
        $interventions = $interventions->paginate($this->perPage);

        $technicians = Technician::join('employees', 'technicians.id', '=', 'employees.id')
            ->orderBy('employees.firstName')
            ->get();

        return view('livewire.search-interventions', compact('interventions', 'technicians'));
    }

    /**
     * Reset pagination when updating the search date.
     */
    public function updatingSearchDate()
    {
        $this->gotoPage(1);
    }

    /**
     * Reset pagination when updating the search technician.
     */
    public function updatingSearchTech()
    {
        $this->gotoPage(1);
    }
}