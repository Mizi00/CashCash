<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;

class InterventionController extends Controller
{
    public function index() 
    {        
        return view('interventions.index');
    }

    public function edit($id)
    {
        $intervention = Intervention::findOrFail($id);

        return view('interventions.edit', compact('intervention'));
    }

    public function update(Request $request, $id)
    {
        // Check form fields
        $credentials = $request->validate([

        ]);

        $intervention = Intervention::findOrFail($id);
    }
}
