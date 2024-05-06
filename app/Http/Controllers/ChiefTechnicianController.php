<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class ChiefTechnicianController extends Controller
{
    public function index() {
        return view('chieftechnicians.index');
    }

    public function show(Technician $technician) {
        return view('chieftechnicians.show', compact('technician'));
    }
}
