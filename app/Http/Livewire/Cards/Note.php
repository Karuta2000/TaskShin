<?php

namespace App\Http\Livewire\Cards;

use Livewire\Component;

class Note extends Component
{
    public $note;

    public function render()
    {
        return view('livewire.cards.note');
    }
}
