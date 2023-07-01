<?php

namespace App\Http\Livewire\Managers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Image;
use Livewire\WithPagination;

class ImageManager extends Component
{

    use WithPagination;

    public $searchTerm = "";

    public $user; 
    public $sortBy;

    protected $listeners = ['imageAdded', 'imageDeleted'];

    public $url;

    public function render()
    {

        $this->user->preferences->imageSortBy = $this->sortBy;
        $this->user->preferences->save();

        if ($this->searchTerm == "") {
            $images = Image::where('user_id', Auth::id())->orderBy($this->sortBy, $this->getSorting($this->sortBy))->get();
        } else {
            $images = Image::where('user_id', Auth::id())->WhereHas('tags', function ($query) {
                $query->where('name', 'like', "%" . ltrim($this->searchTerm, '#') . "%");
            })->orderBy($this->sortBy, $this->getSorting($this->sortBy))->get();
        }


        $perPage = 20;
        $currentPage = $this->page ?: 1;


        $paginator = new LengthAwarePaginator(
            $images->forPage($currentPage, $perPage),
            $images->count(),
            $perPage,
            $currentPage,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]

        );

        return view('livewire.managers.image-manager', [
            'images' => $paginator
        ]);
    }

    public function mount(){
        $this->user = Auth::user();
        $this->sortBy = $this->user->preferences->imageSortBy;
    }

    public function imageAdded()
    {
    }

    public function imageDeleted()
    {
        $this->render();
    }

    public function storeImage()
    {
        if ($this->url != null) {
            $image = new Image;
            $image->url = $this->url;
            $image->user_id = Auth::id();
            $image->save();
            $this->clearForm();
        }
    }

    private function clearForm()
    {
        $this->url = "";
    }

    private function getSorting($atribute){
        $sortByAsc = [];

        if(in_array($atribute, $sortByAsc)) {
            return 'asc';
        }
        else {
            return 'desc';
        }

    }
}
