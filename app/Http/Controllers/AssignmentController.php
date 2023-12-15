<?php

namespace App\Http\Controllers;

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
        return view('assignments.edit', ['intervention' => $intervention]);
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

        $intervention->update($credentials);

        return redirect()->route('assignments.index')->with('success', 'Intervention assigned.');
    }
}
