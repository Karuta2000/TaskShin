<?php

namespace App\Http\Livewire\App\Settings;

use App\Models\UserPreferences;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Preferences extends Component
{

    public $preferences;

    protected function rules()
    {
        return [
            'preferences.color_id' => 'required',
            'preferences.priority' => 'required',
            'preferences.project_id' => 'nullable',
            'preferences.setDate' => 'boolean',
        ];
    }


    public function render()
    {
        return view('livewire.app.settings.preferences');
    }

    public function mount(){
        $this->preferences = UserPreferences::where('user_id', Auth::id())->first();
    }

    public function save(){
        $this->validate();

        if ($this->preferences['project_id'] == '') {
            $this->preferences['project_id'] = null;
        }
        $this->preferences->save();
        $this->emit('successMessage', 'Preferences saved successfully.');
    }
}
