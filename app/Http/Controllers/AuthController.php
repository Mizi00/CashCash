<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display the login form.
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Attempt to authenticate an employee based on provided credentials
     */
    public function login(Request $request)
    {
        // Check form fields
        $credentials = $request->validate([
            'mailAddress' => ['required', 'email'],
            'password' => ['required']
        ]);

        // We try to authenticate the employee
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('stats');
        }

        // If the employee could not be authenticated
        return back()->with('error', 'Incorrect information provided');
    }

    /**
     * Log the authenticated employee out of the application
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
