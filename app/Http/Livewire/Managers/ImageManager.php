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

    protected $listeners = ['imageAdded', 'imageDeleted'];

    
    public $url;

    public function render()
    {
        if($this->searchTerm == ""){
            $images = Image::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    
        }
        else {
            $images = Image::where('user_id', Auth::id())->WhereHas('tags', function ($query) {
                $query->where('name', 'like', "%".ltrim($this->searchTerm, '#')."%");
            })->orderBy('created_at', 'desc')->get();
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

    public function imageAdded(){

    }

    public function imageDeleted(){
        
    }

    public function storeImage(){
        if($this->url != null){
            $image = New Image;
            $image->url = $this->url;
            $image->user_id = Auth::id();
            $image->save();
            $this->clearForm();
        }
    }

    private function clearForm(){
        $this->url = "";
    }



}
