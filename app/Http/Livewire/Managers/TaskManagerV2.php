<?php

namespace App\Http\Livewire\Managers;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class TaskManagerV2 extends Component
{

    public $searchTerm;

    public $closedTasks = false;

    public $project;

    public $sortBy;

    public $tasks;

    public $user;

    protected $listeners = ['boardUpdated', 'taskSaved'];

    public function render()
    {
        $this->getTasks();

        $this->user->preferences->taskSortBy = $this->sortBy;
        $this->user->preferences->save();

        return view('livewire.managers.task-manager-v2');
    }

    public function mount(){
        $this->user = User::findOrFail(Auth::id());
        $this->sortBy = Auth::user()->preferences->taskSortBy;
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

    public function boardUpdated(){
        
    }

    public function taskSaved(){

    }

    public function getTasks(){
        if($this->project != null){
            if($this->closedTasks){
                $this->tasks = Task::where('user_id', Auth::id())->where('project_id', $this->project->id)->orderBy($this->sortBy, $this->getSorting($this->sortBy))->get();
            }
            else{
                $this->tasks = Task::where('user_id', Auth::id())->where('project_id', $this->project->id)->where('completed', 0)->orderBy($this->sortBy, $this->getSorting($this->sortBy))->get();
            }
        }
        else{
            if($this->closedTasks == true){
                $this->tasks = Task::where('user_id', Auth::id())->where('name', 'LIKE', '%'.$this->searchTerm.'%')->orderBy($this->sortBy, $this->getSorting($this->sortBy))->get();
            }
            else{
                $this->tasks = Task::where('user_id', Auth::id())->where('name', 'LIKE', '%'.$this->searchTerm.'%')->where('completed', 0)->orderBy($this->sortBy, $this->getSorting($this->sortBy))->orderBy('due', 'asc')->get();
            }
        }
    }

}
