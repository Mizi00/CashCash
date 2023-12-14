<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Technician;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TechStatsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_displays_technician_statistics(): void
    {
        $technician = Technician::factory()->create();

        $this->actingAs($technician->employee);
        $response = $this->get(route('techstats.index'));
        $response->assertStatus(200);

        $response = $this->post(route('techstats.show'), [
            'registrationNum' => $technician->id,
            'monthyear' => '2023-01'
        ]);
       
        $response->assertStatus(200);
        $response->assertSee($technician->employee->firstName);
        $response->assertSee(Carbon::parse('2023-01')->format('F Y'));
    }
}
