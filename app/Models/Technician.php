<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technician extends Model
{
    use HasFactory;
    /**
     * Indicates if the model should be timestamped and incrementing
     */
    public $timestamps = false, $incrementing = false;

    /**
     * Define a many-to-one relationship with the Employee model using the 'id' as the foreign key
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id');
    }

    /**
     * Define a one-to-many relationship with the Intervention model
     */
    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'registrationNum');
    }
  
    public function getInterventionByWeek($year, $month)
    {
        $result = [0, 0, 0, 0];

        $interventionsByWeek = $this->interventions()
            ->whereYear('dateTimeVisit', $year)
            ->whereMonth('dateTimeVisit', $month)
            ->whereNotNull('dateTimeVisit')
            ->get();

        foreach ($interventionsByWeek as $intervention) {
            if ($intervention->isCompleted()) {
                $week = Carbon::parse($intervention->dateTimeVisit)->weekOfMonth;
                $week = $week === 5 ? 4 : $week;

                if ($week >= 1 && $week <= 4) {
                    $result[$week - 1]++;
                }
            }
        }
        return $result;
    }

    public function getKilometersByWeek($year, $month)
    {
        $result = [0, 0, 0, 0];

        $interventionsByWeek = $this->interventions()
            ->whereYear('dateTimeVisit', $year)
            ->whereMonth('dateTimeVisit', $month)
            ->whereNotNull('dateTimeVisit')
            ->get();

        foreach ($interventionsByWeek as $intervention) {
            if ($intervention->isCompleted()) {
                $week = Carbon::parse($intervention->dateTimeVisit)->weekOfMonth;
                $week = $week === 5 ? 4 : $week;

                if ($week >= 1 && $week <= 4) {
                    $result[$week - 1] += $intervention->client->distanceKm;
                }
            }
        }
        return $result;
    }

    public function getTimeSpentByWeek($year, $month)
    {
        $result = [0, 0, 0, 0];

        $interventionsByWeek = $this->interventions()
            ->whereYear('dateTimeVisit', $year)
            ->whereMonth('dateTimeVisit', $month)
            ->whereNotNull('dateTimeVisit')
            ->get();

        foreach ($interventionsByWeek as $intervention) {
            if ($intervention->isCompleted()) {
                $week = Carbon::parse($intervention->dateTimeVisit)->weekOfMonth;
                $week = $week === 5 ? 4 : $week;

                if ($week >= 1 && $week <= 4) {
                    $result[$week - 1] += $intervention->materials->sum('pivot.passingTime');
                }
            }
        }
        return $result;
    }
}