<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index() 
    {
        $interventions = Intervention::paginate(10);
        
        return view('interventions.index', compact('interventions'));
    }
}
