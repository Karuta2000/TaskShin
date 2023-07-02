<?php

namespace App\Http\Livewire\Managers;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Str;

class ProjectManager extends Component
{

    public $searchTerm;

    public $count;

    public $sortBy;

    public $user;

    public function render()
    {

        $this->user->preferences->projectSortBy = $this->sortBy;
        $this->user->preferences->save();


        if($this->count == null){
            $this->count = 99;
        }

        if (Str::startsWith($this->searchTerm, '#') && strlen($this->searchTerm) > 1) {
            $projects = Project::where('user_id', Auth::id())->WhereHas('tags', function ($query) {
                $query->where('name', 'like', "%".ltrim($this->searchTerm, '#')."%");
            })->orderBy($this->sortBy, 'desc')->limit($this->count)->get();
        } else {
            $projects = Project::where('user_id', Auth::id())->where('name', 'like', '%'.ltrim($this->searchTerm, '#').'%')->orderBy($this->sortBy, 'desc')->limit($this->count)->get();
        }

        return view('livewire.managers.project-manager', ['projects' => $projects]);
    }

    public function mount(){
        $this->user = User::findOrFail(Auth::id());
        $this->sortBy = $this->user->preferences->projectSortBy;
    }

    

    public function openModal($imageUrl)
    {
        $this->emit('openImageModal', $imageUrl);
    }
}
