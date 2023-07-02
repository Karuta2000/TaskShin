<?php

namespace App\Http\Livewire\App\Settings;

use App\Models\ProfileSettings;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Profile extends Component
{

    public $profile;

    protected function rules()
    {
        return [
            'profile.banner' => 'required',
            'profile.sex' => Rule::in(['Male', 'Female']),
            'profile.description' => 'nullable',
            'profile.birthday' => 'nullable|date',
            'profile.color_id' => 'required|numeric',
        ];
    }

    public function render()
    {
        return view('livewire.app.settings.profile');
    }

    public function mount(){
        $this->profile = ProfileSettings::where('user_id', Auth::id())->first();
    }

    public function save(){
        $this->validate();
        $this->profile->save();
        $this->emit('successMessage', 'Profile saved successfully.');
    }
}
