<?php

namespace App\Http\Livewire\Modals;

use App\Models\Color;
use App\Models\Project;
use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskModal extends Component
{

    public $task;

    public $title;
    public $due_date;
    public $priority = 1;
    public $project;

    public $color = 1;
    
    public $allColors;
    public $yourProjects;


    public function rules()
    {
        return [
            'title' => 'required|max:45',
        ];
    }


    protected $listeners = ['openEditTaskModal', 'openNewTaskModal'];

    public function render()
    {
        $this->allColors = Color::all();
        $this->yourProjects = Project::where('user_id', Auth::id())->get();
        return view('livewire.modals.task-modal');
    }

    public function openEditTaskModal($taskId)
    {
        $this->task = Task::findOrFail($taskId);
        $this->setInputs();
        $this->emit('openTaskModal');
    }
    
    public function openNewTaskModal()
    {
        $this->task = null;
        $this->emit('openTaskModal');
    }

    private function setInputs(){
        $this->title = $this->task->name;
        $this->due_date = $this->task->due;
        $this->priority = $this->task->priority;
        $this->project = $this->task->project_id;
        $this->color = $this->task->color_id;
    }
    

    public function taskSave(){
        $this->validate();
        if($this->task == null){
            $this->task = new Task;
            $this->task->user_id = Auth::id();
        }
        $this->task->name = $this->title;
        $this->task->due = $this->due_date;
        $this->task->priority = $this->priority;
        $this->task->project_id = $this->project;
        $this->task->color_id = $this->color;
        $this->task->save();
        $this->emit('taskUpdated');
        $this->emit('closeTaskModal');
        $this->resetData();
    }


    public function resetData(){
        $this->title = "";
        $this->due_date = "";
        $this->priority = 1;
        $this->project = null;
        $this->color = 1;
    }
}
