<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Technician;
use Livewire\WithPagination;

class SearchTechnicians extends Component
{
    use WithPagination;
    
    public $search, $perPage = 10;

    public function render()
    {   
        $technicians = Technician::paginate($this->perPage);
        return view('livewire.search-technicians', compact('technicians'));
    }
}
