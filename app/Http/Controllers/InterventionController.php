<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class InterventionController extends Controller
{
    /**
     * Display a listing of interventions
     */
    public function index() 
    {        
        return view('interventions.index');
    }

    /**
     * Display the specified intervention
     */
    public function show(Intervention $intervention)
    {
        return view('interventions.show', compact('intervention'));
    }

    /**
     * Show the form for editing the specified intervention
     */
    public function edit(Intervention $intervention)
    {
        return view('interventions.edit', compact('intervention'));
    }

    /**
     * Update the specified intervention in database
     */
    public function update(Request $request, Intervention $intervention)
    {
        // Check form fields
        $credentials = $request->validate([
            'dateTimeVisit' => 'required|date',
            'registrationNum' => [
                Rule::requiredIf($intervention->technician !== null),
                'exists:technicians,id'
            ]
        ]);

        // Update the intervention with the validated credentials.
        $intervention->update($credentials);

        // Update materials
        foreach ($request->input('materials') as $materialId => $materialData)
        {
            // Find the material in the intervention's materials collection based on the given material ID.
            $material = $intervention->materials()->find($materialId);

            // Validate passingTime and commentWorks for the material
            $materialValidation = Validator::make($materialData, [
                'passingTime' => 'required|numeric',
                'commentWorks' => 'required|string'
            ]);

            // Updating passingTime and commentWorks attributes for the material
            $intervention->materials()->updateExistingPivot($materialId, [
                'passingTime' => $materialData['passingTime'],
                'commentWorks' => $materialData['commentWorks']
            ]);
        }

        // If the validations are correct, then redirect to the list of interventions.
        return redirect()->route('interventions.index')->with('success', 'Intervention sheet successfully updated');
    }
}