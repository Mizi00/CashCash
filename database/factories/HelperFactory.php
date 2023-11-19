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
    protected $availableEmployeeForHelper;

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
        if (!isset($this->availableEmployeeForHelper)) {
            $technicianIds = Technician::pluck('id')->toArray();
            $helperIds = Helper::pluck('id')->toArray();

            $this->availableEmployeeForHelper = Employee::whereNotIn('id', $technicianIds)
                ->whereNotIn('id', $helperIds)
                ->pluck('id')
                ->toArray();
        }

        if (empty($this->availableEmployeeForHelper)) {
            // Aucun employé n'est disponible pour le poste d'helper
            return null;
        }

        $randomEmployeeId = array_splice($this->availableEmployeeForHelper, array_rand($this->availableEmployeeForHelper), 1)[0];
        return $randomEmployeeId;
    }
}