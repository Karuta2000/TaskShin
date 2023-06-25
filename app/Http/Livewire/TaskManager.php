<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class TaskManager extends Component
{

    public $name;
    public $description;
    public $due;
    public $project_id;
    public $taskId;

    public $searchTerm;

    public $closedTasks;

    public $project;
    public $deleteNotify;

    public $priority;

    public $sortBy = 'name';

    public function render()
    {
        if($this->project != null){
            if($this->closedTasks){
                $tasks = Task::where('user_id', Auth::id())->where('project_id', $this->project->id)->orderBy($this->sortBy, $this->getSorting($this->sortBy))->get();
            }
            else{
                $tasks = Task::where('user_id', Auth::id())->where('project_id', $this->project->id)->where('completed', 0)->orderBy($this->sortBy, $this->getSorting($this->sortBy))->get();
            }
            $this->project_id = $this->project->id;
        }
        else{
            if($this->closedTasks){
                $tasks = Task::where('user_id', Auth::id())->where('name', 'LIKE', '%'.$this->searchTerm.'%')->orderBy($this->sortBy, $this->getSorting($this->sortBy))->get();
            }
            else{
                $tasks = Task::where('user_id', Auth::id())->where('name', 'LIKE', '%'.$this->searchTerm.'%')->orderBy($this->sortBy, $this->getSorting($this->sortBy))->orderBy('due', 'asc')->get();
            }
        }
        $projects = Project::where('user_id', Auth::id())->get();

        return view('livewire.task-manager', compact('tasks', 'projects'));

    }


    public function createTask(){
        $this->name = null;
        $this->description = null;
        $this->due = null;
        $this->taskId = null;
        $this->priority = 1;
        $this->project_id = null;
    }

    public function storeTask(){
        $task = new Task;
        $task->name = $this->name;
        $task->description = $this->description;
        $task->due = $this->due;
        $task->project_id = $this->project_id;
        $task->user_id = Auth::id();
        $task->priority = $this->priority;
        $task->save();
    }

    public function editTask($taskId){
        $task = Task::where('id', $taskId)->first();
        $this->name = $task->name;
        $this->description = $task->description;
        $this->due = $task->due;
        $this->taskId = $taskId;
        $this->project_id = $task->project_id;
        $this->priority = $task->priority;
    }

    public function updateTask(){

        $task = Task::where('id', $this->taskId)->first();
        $task->name = $this->name;
        $task->description = $this->description;
        $task->due = $this->due;
        $task->project_id = $this->project_id;
        $task->priority = $this->priority;
        $task->save();
    }


    public function completeTask($taskId){
        $task = Task::where('id', $taskId)->first();

        if($task->completed){
            $task->completed = 0;
        }
        else{
            $task->completed = 1;
        }
        $task->save();
    }

    public function deleteTask($taskId){
        $task = Task::where('id', $taskId)->first();
        $this->taskId = $task->id;
        if(!$this->deleteNotify){
            $task->delete();
            $this->render();
        }
    }

    public function destroyTask(){
        $task = Task::where('id', $this->taskId)->first();
        $task->delete();
    }




    private function getSorting($atribute){
        $sortByAsc = ['name'];

        if(in_array($atribute, $sortByAsc)) {
            return 'asc';
        }
        else {
            return 'desc';
        }

    }

}
