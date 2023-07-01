<?php

namespace App\Http\Livewire\App;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Avatar extends Component
{

    public $avatar;


    protected $listeners = ['avatarChanged'];

    public function render()
    {
        $this->avatar = Auth::user()->avatar;
        return view('livewire.app.avatar');
    }

    public function avatarChanged(){

    }
}
