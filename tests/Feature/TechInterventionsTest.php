<?php

namespace Tests\Feature;

use App\Livewire\PaginationTechInterventions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Technician;
use App\Models\Intervention;
use App\Models\Material;
use Tests\TestCase;
use Livewire\Livewire;

class TechInterventionsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Tests the validation of an intervention by a technician.
     * Creates a technician, intervention, and material records.
     * Validates if the intervention ID is visible before the update.
     * Updates the intervention's material with passingTime and commentWorks.
     * Asserts redirection to the intervention index after the update.
     * Ensures that the updated intervention ID and client social reason are not visible
     */
    public function test_can_validate_intervention(): void
    {
        $technician = Technician::factory()->create();

        $intervention = Intervention::factory()->create(['registrationNum' => $technician->id]);
        $material = Material::factory()->create();
        $intervention->materials()->attach($material->id, [
            'passingTime' => null,
            'commentWorks' => null
        ]);

        $this->actingAs($technician->employee);
        Livewire::test(PaginationTechInterventions::class)
            ->assertSee($intervention->id);

        $response = $this->patch(route('techinterventions.update', ['intervention' => $intervention->id]), [
            'materials' => [
                $material->id => [
                    'passingTime' => 20,
                    'commentWorks' => 'New comment works'
                ]
            ]
        ]);        
        $response->assertStatus(200);

        $response->assertViewIs('techinterventions.showpdf');
        $this->assertTrue($intervention->isCompleted());
    }
}
