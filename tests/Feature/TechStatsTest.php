<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Technician;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TechStatsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Tests the display of statistics for a technician.
     * Creates a technician record for testing.
     * Acts as the authenticated technician.
     * Checks the response status when accessing the technician statistics index.
     * Verifies the response status and displayed content after specifying technician details and a month/year.
     * Asserts that the technician's first name and the specified month/year are visible in the response.
     */
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
