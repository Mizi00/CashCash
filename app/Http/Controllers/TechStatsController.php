<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TechStatsController extends Controller
{
    public function index()
    {
        return view("techstats.index");

    }

    public function show(Request $request)
    {
        $credentials = $request->validate([
            'registrationNum' => 'required|exists:technicians,id',
            'monthyear' => 'required|date_format:Y-m|before:today'
        ]);

        $technician = Technician::findOrFail($credentials['registrationNum']);

        $date = Carbon::createFromFormat('Y-m', $credentials['monthyear']);

        $interventionsByWeek = $technician->getInterventionByWeek($date->year, $date->month);
        $timeSpentByWeek = $technician->getTimeSpentByWeek($date->year, $date->month);
        $kilometersByWeek = $technician->getKilometersByWeek($date->year, $date->month);

        return view("techstats.show", [
            'technician' => $technician,
            'date' => $credentials['monthyear'],
            'interventionsByWeek' => $interventionsByWeek,
            'timeSpentByWeek' => $timeSpentByWeek,
            'kilometersByWeek' => $kilometersByWeek
        ]);
    }
}