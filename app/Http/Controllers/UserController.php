<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProfileSettings;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Task;
use App\Models\Project;
use App\Models\UserPreferences;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUserSettings()
    {
        return view('users.settings.user');
    }

    public function showSettings()
    {
        return view('users.settings.main');
    }

    public function showPasswordSettings()
    {
        return view('users.settings.password');
    }

    public function showProfileSettings()
    {
        return view('users.settings.profile');
    }

    public function showAvatarSettings()
    {
        return view('users.settings.avatar');
    }

    public function showPreferencesSettings()
    {
        return view('users.settings.preferences');
    }


    public function dashboard(){
        
        if (Auth::check()) {
            $tags = Tag::where('user_id', Auth::id())->get();
            $tagCounts = [];
            foreach ($tags as $tag){
                $tagCounts[$tag->name] = $tag->projects->count();
            }

            $tasks = Task::where('user_id', Auth::id())->get();

            $taskCounts = [$tasks->where('completed', 1)->count(), $tasks->where('completed', 0)->count()];

            $projects = Project::where('user_id', Auth::id())->orderBy('created_at', 'desc')->limit(4)->get();


            if(Auth::user()->preferences == null){
                $preferences = new UserPreferences;
                $preferences->user_id = Auth::id();
                $preferences->save();
            }

            if(Auth::user()->profile == null){
                $profile = new ProfileSettings();
                $profile->user_id = Auth::id();
                $profile->save();
            }


            return view('dashboard', compact('tags', 'projects', 'tagCounts', 'taskCounts'));
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
            'password' => ['required', 'string', 'min:8']
        ]);

        $passwordValid = Hash::check($request->password, $user->password);

        if (!$passwordValid) {
            return back()->withErrors(['password' => 'Wrong password']);
        }

        $user->name = $request->name;

        $user->save();

        return redirect()->back()->with('success', 'Your changes have been saved.');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'banner' => 'nullable',
            'sex' => 'required'
        ]);


        $user->profile->banner = $request->banner;

        $user->profile->sex = $request->sex;

        $user->profile->save();

        return redirect()->back()->with('success', 'Your changes have been saved.');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'oldPassword' => ['required', 'string', 'min:8'],
            'newPassword' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $passwordValid = Hash::check($request->oldPassword, $user->password);

        if (!$passwordValid) {
            return back()->withErrors(['oldPassword' => 'Wrong password']);
        }

        $user->password = $request->newPassword;

        $user->save();

        return redirect()->back()->with('success', 'Your changes have been saved.');
    }

    public function updateAvatar(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'avatar' => 'nullable',
        ]);

        $user->avatar = $request->avatar;

        $user->save();

        return redirect()->back()->with('success', 'Your changes have been saved.');
    }

    public function profile(){
        $user = Auth::user();

        return view('users/profile', compact('user'));
    }
}
