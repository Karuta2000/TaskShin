<?php

namespace App\Http\Livewire\Modals;

use App\Models\Color;
use App\Models\Project;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskModal extends Component
{

    public $task;
    public $allColors;
    public $yourProjects;

    public $newTask = false;

    public function rules()
    {
        return [
            'task.name' => 'required|max:45',
            'task.due' => 'nullable',
            'task.priority' => 'min:1|max:10',
            'task.project_id' => 'nullable',
            'task.color_id' => 'required'
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
        $this->newTask = false;
        $this->emit('openTaskModal');
    }
    
    public function openNewTaskModal()
    {
        $this->task = new Task;
        $this->newTask = true;
        $this->emit('openTaskModal');
    }   

    public function taskSave(){
        $this->validate();
        $this->task->save();
        if($this->newTask){
            $this->emit('boardUpdated');
        }
            $this->emit('taskUpdated');
        $this->emit('closeTaskModal');
    }



}
