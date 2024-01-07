<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $credentials = $request->validate([
            'socialReason' => 'required',
            'sirenNum' => 'required|numeric',
            'apeCode' => 'required',
            'address' => 'required',
            'distanceKm' => 'required|numeric|min:1|max:2000',
            'phoneNumber' => 'required|size:10',
            'faxNum' => 'required|size:10',
            'mailAddress' => "required|email|unique:clients,mailAddress,$client->id,id"
        ]);

        $client->update($credentials);
        
        return redirect()->route('clients.index')->with('success', 'Client successfully updated');
    }
}
