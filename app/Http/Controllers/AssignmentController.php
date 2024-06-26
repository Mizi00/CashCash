<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\Intervention;
use Illuminate\Http\Request;

/**
 * Controller for managing assignments related to interventions.
 */
class AssignmentController extends Controller
{
    /**
     * Display a listing of assignments.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('assignments.index');
    }

    /**
     * Show the form for editing the specified intervention assignment.
     *
     * @param  \App\Models\Intervention  $intervention
     * @return \Illuminate\View\View
     */
    public function edit(Intervention $intervention)
    {
        $technicians = Technician::join('employees', 'technicians.id', '=', 'employees.id')
            ->where('technicians.agencyNum', '=', $intervention->client->agencyNum)
            ->orderBy('employees.firstName')
            ->get();

        return view('assignments.edit', ['intervention' => $intervention, 'technicians' => $technicians]);
    }

    /**
     * Update the specified intervention assignment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Intervention  $intervention
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Intervention $intervention)
    {
        $credentials = $request->validate([
            'registrationNum' => 'required|exists:technicians,id'
        ]);

        // Check if technician is in same agency as client
        $technician = Technician::find($credentials['registrationNum']);
        if ($technician->agencyNum === $intervention->client->agencyNum) 
        {
            $intervention->update($credentials);

            return redirect()->route('assignments.index')->with('success', 'Intervention assigned.');
        }        

        return redirect()->back()->withErrors(['registrationNum' => 'The agencies are not the same.']);
    }
}
