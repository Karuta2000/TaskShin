<?php

namespace App\Http\Livewire\Cards;

use DeepCopy\f001\B;
use Livewire\Component;

class Project extends Component
{

    public $project;

    public function render()
    {
        return view('livewire.cards.project');
    }

    public function favorite(){
        if($this->project->favorite == 0){
            $this->project->favorite = 1;
        }
        else {
            $this->project->favorite = 0;
        }
        $this->project->save();
         
    }
}
