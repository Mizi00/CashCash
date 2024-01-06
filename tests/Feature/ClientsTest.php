<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Client;
use App\Models\Helper;
use Livewire\Livewire;
use App\Models\Employee;
use App\Livewire\SearchClients;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientsTest extends TestCase
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

    public function test_can_edit_client(): void
    {
        $client = Client::factory()->create();

        $employee = Employee::factory()->create();
        $helper = Helper::factory()->create(['id' => $employee->id]);

        $this->actingAs($employee);
        $response = $this->patch(route('clients.update', $client->id), [
            'socialReason' => 'Auchan',
            'sirenNum' => '000000',
            'apeCode' => '12121DDD',
            'address' => '23 rue de lafièvre',
            'phoneNumber' => '0610101033',
            'faxNum' => '0909902232',
            'mailAddress' => 'new@email.com',
        ]);

        $response->assertRedirect(route('clients.index'));

        $client->refresh();

        Livewire::test(SearchClients::class)
            ->set('search', $client->id)
            ->assertSee($client->socialReason)
            ->assertSee(trim(chunk_split($client->phoneNumber, 2, ' '), ' '))            
            ->assertSee($client->mailAddress);
    }
}
