<?php

namespace App\Http\Livewire\Cards;

use Livewire\Component;

class TaskCard extends Component
{

    public $task;
    public $completed;

    protected $rules = [
        'task.completed' => 'boolean',
    ];

    public function render()
    {

        return view('livewire.cards.task-card');
    }

    public function mount(){
        $this->completed = $this->task->completed;
    }


    public function complete(){
        if($this->completed == 0){
            $this->task->completed = 0;
        }
        else{
            $this->task->completed = 1;
        }
        $this->task->save();
        $this->emit('boardUpdated');
    }

    public function delete(){
        $this->task->delete();
        $this->emit('boardUpdated');
    }
}
