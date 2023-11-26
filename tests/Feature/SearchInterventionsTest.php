<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Intervention;
use App\Livewire\SearchInterventions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchInterventionsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_search_interventions_by_date(): void
    {
        $intervention = Intervention::factory()->create([
            'dateTimeVisit' => '2018-06-08 10:00:00'
        ]);

        $formattedDate = Carbon::parse($intervention->dateTimeVisit)->format('d/m/Y H:i');

        Livewire::test(SearchInterventions::class)
            ->set('searchDate', '2018-06-08')
            ->assertSee($formattedDate);
    }
}