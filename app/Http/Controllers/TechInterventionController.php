<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Intervention;

class TechInterventionController extends Controller
{
    public function index()
    {
        $interventions = Auth::user()->Technician->interventions;
        return view("techinterventions.index", ["interventions" => $interventions]);
    }
    public function validateIntervention(Intervention $intervention)
    {
        return view('techinterventions.validate', ['intervention' => $intervention]);
    }
}
