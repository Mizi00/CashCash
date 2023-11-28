<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class SearchClients extends Component
{
    use WithPagination;
    
    public $search;

    public function render()
    {   
        $clients = Client::query()
            ->when($this->search,  function($query) {
                return $query->where('id', '=', $this->search);
            })->paginate(10);

        return view('livewire.search-clients', compact('clients'));
    }
}
