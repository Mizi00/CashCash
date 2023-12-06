<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\Employee;
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
        $technician = Technician::factory()->create(['id' => $employee->id]);

        $intervention = Intervention::factory()->create([
            'dateTimeVisit' => '2022-12-01 15:30:00'
        ]);

        $newDate = '2024-01-24 10:30:00';

        $this->actingAs($employee);
        $response = $this->patch(route('interventions.update', ['intervention' => $intervention->id]), [
            'dateTimeVisit' => $newDate
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('interventions.index'));

        $updatedIntervention = Intervention::find($intervention->id);

        $this->assertEquals($newDate, $updatedIntervention->dateTimeVisit);
    }

    public function test_can_edit_intervention_technician(): void
    {
        $employee = Employee::factory()->create();
        $technician = Technician::factory()->create(['id' => $employee->id]);

        $employee1 = Employee::factory()->create();
        $technician1 = Technician::factory()->create(['id' => $employee1->id]);

        $intervention = Intervention::factory()->create([
            'registrationNum' => $technician->id
        ]);

        $this->actingAs($employee);
        $response = $this->patch(route('interventions.update', ['intervention' => $intervention->id]), [
            'dateTimeVisit' => '2022-05-01 15:00:00',
            'registrationNum' => $technician1->id
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('interventions.index'));

        $updatedIntervention = Intervention::find($intervention->id);

        $this->assertEquals($technician1->id, $updatedIntervention->registrationNum);
    }
}