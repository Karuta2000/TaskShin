<?php

namespace App\Http\Livewire\Cards;

use Livewire\Component;

class Project extends Component
{

    public $project;

    public function render()
    {
        return view('livewire.cards.project');
    }
}
