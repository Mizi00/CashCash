<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Client;
use Livewire\Livewire;
use App\Livewire\SearchClients;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchClientsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_search_clients_by_id(): void
    {
        $client = Client::factory()->create([
            'id' => 535
        ]);

        Livewire::test(SearchClients::class)
            ->set('search', '535')
            ->assertSee($client->id);
    }
}
