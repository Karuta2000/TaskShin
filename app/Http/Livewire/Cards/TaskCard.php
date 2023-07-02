<?php

namespace App\Http\Livewire\Cards;

use Livewire\Component;

class TaskCard extends Component
{

    public $task;
    public $editingTitle = false;

    public $title;


    protected $rules = [
        'task.completed' => 'boolean',
    ];

    protected $listeners = ['taskUpdated'];

    public function render()
    {
        return view('livewire.cards.task-card');
    }

    public function complete(){
        if($this->task->completed == 0){
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

    public function editTitle(){
        $this->editingTitle = true;
        $this->title = $this->task->name;
    }

    public function taskUpdated(){
        
    }

}
