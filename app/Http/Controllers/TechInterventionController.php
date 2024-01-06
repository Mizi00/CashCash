<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TechInterventionController extends Controller
{
    /**
     * Return a view for listing technician's interventions
     */
    public function index()
    {
        return view("techinterventions.index");
    }

    /**
     * Validates an intervention and returns a view for validation.
     */
    public function validateIntervention(Intervention $intervention)
    {
        if ($intervention->isCompleted()) {
            abort(404);
        }

        return view('techinterventions.validate', ['intervention' => $intervention]);
    }


    /**
     * Updates intervention details based on the provided request and intervention instance.
     */
    public function update(Request $request, Intervention $intervention)
    {
        if ($request->has('materials') && is_array($request->input('materials'))) {
            foreach ($request->input('materials') as $materialId => $materialData) {
                // Find the material in the intervention's materials collection based on the given material ID.
                $material = $intervention->materials()->find($materialId);

                // Validate passingTime and commentWorks for the material
                $materialValidation = Validator::make($materialData, [
                    'passingTime' => 'nullable|sometimes|numeric',
                    'commentWorks' => 'nullable|sometimes|min:3'
                ]);

                if ($materialValidation->fails()) {
                    return redirect()->back()->withErrors($materialValidation);
                }

                // Updating passingTime and commentWorks attributes for the material
                $intervention->materials()->updateExistingPivot($materialId, [
                    'passingTime' => $materialData['passingTime'] ?? null,
                    'commentWorks' => $materialData['commentWorks'] ?? null
                ]);
            }
        }
        if ($intervention->isCompleted()) {
            return view('techinterventions.showpdf', compact('intervention'));
        }
        return redirect()->route('techinterventions.index')->with('success', 'Intervention sheet successfully updated');
    }


    /**
     * Generates a PDF for the provided intervention.
     */
    public function generatePDF(Intervention $intervention)
    {
        // Generate pdf content
        $pdfContent = view('interventions.pdf', ['intervention' => $intervention])->render();

        // Create instance of PDF class
        $pdf = PDF::loadHTML($pdfContent);

        // Download the pdf
        return $pdf->download("intervention-$intervention->id.pdf");
    }
}
