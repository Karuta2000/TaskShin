<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use App\Models\Project;
use App\Models\Task;

class TaskManager extends Component
{
    public function render()
    {
        $projects = Project::all();
        $activeTasks = Task::where('user_id', Auth::id())->where('completed', 0)->get();
        $closedTasks = Task::where('user_id', Auth::id())->where('completed', 1)->get();
        return view('livewire.task-manager', compact('activeTasks', 'closedTasks', 'projects'));

        return view('livewire.task-manager');
    }
}
