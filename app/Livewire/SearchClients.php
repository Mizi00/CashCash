<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;

class SearchClients extends Component
{
    public $search;

    public function render()
    {   
        $clients = Client::query();

        if($this->search){
            $clients->where('id', '=', $this->search);
        }

        $clients = $clients->paginate(10);

        return view('livewire.search-clients', compact('clients'));
    }
}
