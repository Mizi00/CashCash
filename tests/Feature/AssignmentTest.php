<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Helper;
use App\Models\Employee;
use App\Models\Technician;
use App\Models\Intervention;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AssignmentTest
 *
 * @package Tests\Feature
 */
class AssignmentTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test assigning a technician to an intervention.
     *
     * @return void
     */
    public function test_it_assigns_technician_to_intervention()
    {
        $employee = Employee::factory()->create();
        Helper::factory()->create(['id' => $employee->id]);

        // Create an intervention
        $intervention = Intervention::factory()->create();

        // Create a technician and act as the technician's employee
        $technician = Technician::factory()->create();
        $this->actingAs($employee);

        // Make a request to assign the technician to the intervention
        $response = $this->patch(route('assignments.update', $intervention->id), [
            'registrationNum' => $technician->id,
        ]);

        // Assert that the request is redirected to the assignments index route
        $response->assertRedirect(route('assignments.index'));

        // Refresh the intervention from the database
        $intervention->refresh();

        // Assert that the intervention now has the correct technician assigned
        $this->assertEquals($technician->id, $intervention->registrationNum);
    }
}