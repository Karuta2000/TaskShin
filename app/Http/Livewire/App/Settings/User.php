<?php

namespace App\Http\Livewire\App\Settings;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class User extends Component
{
    public $user;

    public $password;

    protected function rules()
    {
        return [
            'user.email' => 'required',
            'user.name' => ['required', 'string', 'max:255', 'min: 4'],
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = auth()->user();
                    if (!Hash::check($value, $user->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
        ];
    }
    
    public function render()
    {
        return view('livewire.app.settings.user');
    }

    public function mount(){
        $this->user = ModelsUser::findOrFail(Auth::id());
    }


    public function saveChanges()
    {

        $this->validate();

        $passwordValid = Hash::check($this->password, $this->user->password);

        if (!$passwordValid) {
            $this->emit('successMessage', 'error');
            $this->password = "";
        }

        $this->user->save();

        $this->password = "";

        $this->emit('successMessage', 'User saved successfully.');
    }

}
