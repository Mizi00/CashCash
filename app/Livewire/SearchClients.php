<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class SearchClients extends Component
{
    use WithPagination;
    
    public $search, $perPage = 10;

    public function render()
    {   
        $clients = Client::query()
            ->when($this->search,  function($query) {
                return $query->where('id', '=', $this->search);
            })->paginate($this->perPage);

        return view('livewire.search-clients', compact('clients'));
    }

    /**
     * Reset pagination when updating the search.
     */
    public function updatingSearch()
    {
        $this->gotoPage(1);
    }
}
