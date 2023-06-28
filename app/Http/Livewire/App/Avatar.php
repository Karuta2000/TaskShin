<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class Avatar extends Component
{

    public $avatar;


    protected $listeners = ['avatarChanged'];

    public function render()
    {
        return view('livewire.app.avatar');
    }

    public function avatarChanged(){

    }
}
