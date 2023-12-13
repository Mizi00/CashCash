<?php

namespace App\Http\Controllers;

use App\Models\Technician;
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

        return view("techstats.show", [
            'technician' => $technician,
            'date' => $credentials['monthyear']
        ]);
    }
}
