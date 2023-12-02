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
            'datetimevisit' => 'required'
        ]);

        $intervention = Intervention::findOrFail($id);

        $intervention->dateTimeVisit = $request->input('datetimevisit');

        $intervention->save();

        return redirect()->route('interventions.index')->with('success', 'Intervention sheet successfully updated');
    }
}