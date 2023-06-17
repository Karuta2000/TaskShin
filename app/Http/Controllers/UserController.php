<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showSettings()
    {
        return view('users.settings');
    }

    public function dashboard(){
        

        if (Auth::check()) {
            $tags = Tag::all();
            return view('dashboard', compact('tags'));
        }
        return view('homepage');
        
    }
    /**
     * Update the user's name and password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'profile_photo_path' => 'nullable',
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ]);

        $user->name = $request->name;

        $user->profile_photo_path = $request->profile_photo_path;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Your changes have been saved.');
    }
}
