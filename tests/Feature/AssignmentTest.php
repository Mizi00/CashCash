<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Technician;
use App\Models\Intervention;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AssignmentTest extends TestCase
{
    use DatabaseTransactions;
    
    public function test_it_assigns_technician_to_intervention()
    {
        $intervention = Intervention::factory()->create();

        $technician = Technician::factory()->create();
        $this->actingAs($technician->employee);

        $response = $this->patch(route('assignments.update', $intervention->id), [
            'registrationNum' => $technician->id,
        ]);

        $response->assertRedirect(route('assignments.index'));
        $intervention->refresh();

        $this->assertEquals($technician->id, $intervention->registrationNum);
    }
}
