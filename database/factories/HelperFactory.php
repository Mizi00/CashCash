<?php

namespace Database\Factories;

use App\Models\Helper;
use App\Models\Employee;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HelperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->getUniqueIdForHelper()
        ];
    }

    protected function getUniqueIdForHelper(){
        $usedHelperIds = Helper::all()->pluck('id')->toArray();

        $technicianIds = Technician::all()->pluck('id')->toArray();

        $availableEmployeeForHelper = Employee::whereNotIn('id', $technicianIds)
            ->whereNotIn('id', $usedHelperIds)
            ->pluck('id')
            ->toArray();

        if (empty($availableEmployeeForHelper)) {
            // Aucun employé n'est disponible pour le poste d'helper
            return null;
        }

        $randomEmployeeId = $availableEmployeeForHelper[array_rand($availableEmployeeForHelper)];

        //echo($availableEmployeeForHelper."------".$randomEmployeeId."\n");
        return $randomEmployeeId;

    
    }
}
