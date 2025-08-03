<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::all();
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
            'status'         => 'active',
        ]);

        return redirect()->back()->with('success', 'Account created successfully!');
    }

    // ✅ Add login logic here
    public function showLoginForm()
    {
        return view('index');
    }

    // Handle login
   public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = Registration::where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        if ($user->status !== 'active') {
            return back()->with('error', 'Account is deactivated. Please contact admin.');
        }

        session([
            'logged_in' => true,
            'user_id' => $user->id,
            'username' => $user->username,
        ]);

        return redirect()->route('dashboard');
    }

    return back()->with('error', 'Invalid username or password.');
}


    // Show dashboard
public function dashboard()
{
    if (!session()->has('logged_in')) {
        return redirect()->route('login');
    }

    $user = Registration::find(session('user_id')); // get current user
    return view('dashboard', [
        'user' => $user,
    ]);
}


    // Handle logout
    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('login');
    }

    public function updateStatus(Request $request, $id)
{
    $registration = Registration::findOrFail($id);
    $registration->status = $request->status;
    $registration->save();

    return response()->json(['success' => true]);
}

public function destroy($id)
{
    $registration = Registration::findOrFail($id);
    $registration->delete();

    return response()->json(['success' => true]);
}

}

