<?php

namespace App\Http\Livewire\App\Layout;

use Livewire\Component;

class Main extends Component
{

    public $route;

    public function render()
    {
        return view('livewire.app.layout.main');
    }

}
