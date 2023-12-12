<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Intervention;
use Illuminate\Support\Facades\Validator;

class TechInterventionController extends Controller
{
    public function index()
    {
        return view("techinterventions.index");
    }
    public function validateIntervention(Intervention $intervention)
    {
        return view('techinterventions.validate', ['intervention' => $intervention]);
    }

    public function update(Request $request, Intervention $intervention)
    {
        if ($request->has('materials') && is_array($request->input('materials'))) {
            foreach ($request->input('materials') as $materialId => $materialData) {
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
        }
        return redirect()->route('techinterventions.index')->with('success', 'Intervention sheet successfully updated');
    }
}
