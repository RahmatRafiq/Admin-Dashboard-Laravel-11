<?php

namespace App\Http\Controllers;

use App\Models\AboutApp;
use Illuminate\Http\Request;

class AboutAppController extends Controller
{
    /**
     * Display and edit the profile.
     */
    public function index()
    {
        // Assuming there's only one profile to be edited
        $aboutApp = AboutApp::first();

        return view('applications.mbkm.about-mbkms.index', compact('AboutApp'));
    }

    /**
     * Update the profile in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'program_name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'nullable|string|max:255',
            'eligibility' => 'nullable|string|max:255',
            'benefits' => 'nullable|string|max:255',
            'contact_email' => 'nullable|string|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'contact_address' => 'nullable|string|max:255',
        ]);

        // Assuming there's only one profile to be edited
        $aboutApp = AboutApp::first();

        if ($aboutApp) {
            $aboutApp->update($request->all());
            $message = 'About MBKM updated successfully.';
        } else {
            AboutApp::create($request->all());
            $message = 'About MBKM created successfully.';
        }

        return redirect()->route('about-mbkms.index')
            ->with('success', $message);
    }
}
