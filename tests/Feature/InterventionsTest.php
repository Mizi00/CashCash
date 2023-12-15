<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use App\Models\Helper;
use Livewire\Livewire;
use App\Models\Employee;
use App\Models\Material;
use App\Models\Technician;
use App\Models\Intervention;
use App\Livewire\SearchInterventions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InterventionsTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_search_interventions_by_date(): void
    {
        $intervention = Intervention::factory()->create([
            'dateTimeVisit' => '2018-06-08 10:00:00'
        ]);

        $formattedDate = Carbon::parse($intervention->dateTimeVisit)->isoFormat('MMM D, YYYY HH[:]mm A');

        Livewire::test(SearchInterventions::class)
            ->set('searchDate', '2018-06-08')
            ->assertSee($formattedDate);
    }

    public function test_can_search_interventions_by_technician_id(): void
    {
        $technician = Technician::factory()->create();

        // Create an intervention associated with the technician
        $intervention = Intervention::factory()->create([
            'dateTimeVisit' => '2022-11-24 20:00:00',
            'registrationNum' => $technician->id
        ]);

        $formattedDate = Carbon::parse($intervention->dateTimeVisit)->isoFormat('MMM D, YYYY HH[:]mm A');

        Livewire::test(SearchInterventions::class)
            ->set('searchTech', $technician->id)
            ->assertSee($formattedDate)
            ->assertSee($intervention->registrationNum);   
    }

    public function test_can_edit_intervention_date(): void
    {
        $employee = Employee::factory()->create();
        Helper::factory()->create(['id' => $employee->id]);

        // Create an intervention
        $intervention = Intervention::factory()->create([
            'dateTimeVisit' => '2022-12-01 15:30:00'
        ]);

        $newDate = '2024-01-24 10:30:00';

        $this->actingAs($employee);
        $response = $this->patch(route('interventions.update', ['intervention' => $intervention->id]), [
            'dateTimeVisit' => $newDate
        ]);

        // Assert that there are no session errors and the user is redirected
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('interventions.index'));

        $updatedIntervention = Intervention::find($intervention->id);

        // Assert that the datetimevisit of the intervention is updated
        $this->assertEquals($newDate, $updatedIntervention->dateTimeVisit);
    }

    public function test_can_edit_intervention_technician(): void
    {
        $employeeActing = Employee::factory()->create();
        Helper::factory()->create(['id' => $employeeActing->id]);

        $employee = Employee::factory()->create();
        $technician = Technician::factory()->create(['id' => $employee->id]);

        $employee1 = Employee::factory()->create();
        $technician1 = Technician::factory()->create(['id' => $employee1->id]);

        // Create an intervention associated with the technician
        $intervention = Intervention::factory()->create([
            'registrationNum' => $technician->id
        ]);

        $this->actingAs($employeeActing);
        $response = $this->patch(route('interventions.update', ['intervention' => $intervention->id]), [
            'dateTimeVisit' => '2022-05-01 15:00:00',
            'registrationNum' => $technician1->id
        ]);

        // Assert that there are no session errors and the user is redirected
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('interventions.index'));

        $updatedIntervention = Intervention::find($intervention->id);

        // Assert that the technician id of the intervention is updated
        $this->assertEquals($technician1->id, $updatedIntervention->registrationNum);
    }

    public function test_can_edit_intervention_material_passingtime_and_commentworks(): void
    {
        $employeeActing = Employee::factory()->create();
        Helper::factory()->create(['id' => $employeeActing->id]);
        
        // Create an employee and a corresponding technician
        $employee = Employee::factory()->create();
        $technician = Technician::factory()->create(['id' => $employee->id]);

        // Create an intervention associated with the technician
        $intervention = Intervention::factory()->create(['registrationNum' => $technician->id]);

        // Create a material associated with the intervention
        $material = Material::factory()->create();
        $intervention->materials()->attach($material->id);

        // Act as the employee and attempt to update the material's passingTime and commentWorks
        $this->actingAs($employeeActing);
        $response = $this->patch(route('interventions.update', ['intervention' => $intervention->id]), [
            'dateTimeVisit' => '2022-05-01 15:00:00',
            'registrationNum' => $technician->id, // Use the same technician
            'materials' => [
                $material->id => [
                    'passingTime' => 2, // New passing time value
                    'commentWorks' => 'Updated comment', // New comment value
                ]
            ]
        ]);

        // Assert that there are no session errors and the user is redirected
        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('interventions.index'));

        // Refresh the intervention from the database
        $intervention->refresh();

        // Retrieve the updated material from the database
        $updatedMaterial = $intervention->materials->first();

        // Assert that the passingTime and commentWorks of the material are updated
        $this->assertEquals(2, $updatedMaterial->pivot->passingTime);
        $this->assertEquals('Updated comment', $updatedMaterial->pivot->commentWorks);
    }
}