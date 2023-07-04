<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProfileSettings;
use App\Models\UserPreferences;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        /*$profile = ProfileSettings::where('user_id', $user->id)->first();

        if(!$profile){
            $profile = new ProfileSettings;
            $profile->user_id = $user->id;
            $profile->save();
        }*/
        

        event(new Registered($user));

        Auth::login($user);

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

        return redirect(RouteServiceProvider::HOME);
    }
}
