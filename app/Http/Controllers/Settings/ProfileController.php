<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function edit()
    {
        return view('settings.profile', [
            'user' => auth()->user()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $picture = $request->profile_picture;
        $picture->move(public_path('upload'), $fileName = 'profile-picture.jpeg');
        
        $profileData = $request->validated();
        $profileData['profile_picture'] = $fileName;

        $request->user()->update($profileData);

        return back()->with('message', 'Profile has been updated successfully');
    }
}
