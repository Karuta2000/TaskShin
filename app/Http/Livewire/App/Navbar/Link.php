<?php

namespace App\Http\Livewire\App\Navbar;

use Livewire\Component;

class Link extends Component
{

    public $route;
    public $icon;

    public function render()
    {
        return view('livewire.app.navbar.link');
    }
}
