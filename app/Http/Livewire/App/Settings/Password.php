<?php

namespace App\Http\Livewire\App\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component
{
    public $password;
    public $newPassword;
    public $newPassword_confirmation;

    protected function rules()
    {
        return [
            'password' => [
                'required',
                function ($attribute, $value, $fail) {
                    $user = auth()->user();
                    if (!Hash::check($value, $user->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'newPassword' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }


    public function render()
    {
        return view('livewire.app.settings.password');
    }

    public function saveChanges()
    {
        $this->validate();

        $user = User::findOrFail(Auth::id());
        $user->password = Hash::make($this->newPassword);
        $user->save();

        $this->resetFields();

        $this->emit('successMessage', 'Password changed successfully.');
    }

    private function resetFields()
    {
        $this->password = null;
        $this->newPassword = null;
        $this->newPassword_confirmation = null;
    }
}
