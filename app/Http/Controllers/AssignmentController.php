<?php

namespace App\Http\Controllers;

use App\Models\Intervention;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        return view('assignments.index');
    }

    public function edit(Intervention $intervention)
    {
        return view('assignments.edit', ['intervention' => $intervention]);
    }

    public function update(Request $request, Intervention $intervention)
    {
        $credentials = $request->validate([
            'registrationNum' => 'required|exists:technicians,id'
        ]);
        $intervention->update($credentials);
        return redirect()->route('assignments.index')->with('success', 'Intervention assigned.');
    }
}
