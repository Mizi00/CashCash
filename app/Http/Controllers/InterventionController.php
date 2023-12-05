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

    public function show(Intervention $intervention)
    {
        return view('interventions.show', compact('intervention'));
    }

    public function edit(Intervention $intervention)
    {
        return view('interventions.edit', compact('intervention'));
    }

    public function update(Request $request, Intervention $intervention)
    {
        // Check form fields
        $credentials = $request->validate([
            'dateTimeVisit' => 'required|date'
        ]);

        $intervention->update($credentials);

        return redirect()->route('interventions.index')->with('success', 'Intervention sheet successfully updated');
    }
}