<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
{
    $registrations = Registration::all(); // fetch all registration records
    return view('super.registration', compact('registrations'));
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'completeName'   => 'required|string|max:255',
            'username'       => 'required|string|max:255|unique:registrations,username',
            'phoneNumber'    => 'required|string|max:20',
            'password'       => 'required|string|min:6',
            'location'       => 'required|string',
            'areaLocation'   => 'required|string',
            'areaName'       => 'required|string',
            'position'       => 'required|string|in:superAdmin,admin',
        ]);

       Registration::create([
        'complete_name'  => $validated['completeName'],
        'username'       => $validated['username'],
        'phone_number'   => $validated['phoneNumber'],
        'password'       => Hash::make($validated['password']),
        'location'       => $validated['location'],
        'area_location'  => $validated['areaLocation'],
        'area_name'      => $validated['areaName'],
        'position'       => $validated['position'],
        'status'         => 'active', // set default manually here
    ]);

        return redirect()->back()->with('success', 'Account created successfully!');
    }
}
