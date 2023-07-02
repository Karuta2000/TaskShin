<?php

namespace App\Http\Livewire\App\Settings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Avatar extends Component
{

    public $url;

    public function render()
    {  
        return view('livewire.app.settings.avatar');
    }

    public function mount(){
        $this->url = Auth::user()->avatar;
    }

    public function saveAvatar(){
        $user = User::findOrFail(Auth::id());
        $user->avatar = $this->url;
        $user->save();
        $this->emit('avatarChanged');
        $this->emit('successMessage', 'Avatar changed successfully.');
    }



}
