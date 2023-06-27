<?php

namespace App\Http\Livewire\Managers;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Image;

class ImageManager extends Component
{

    protected $listeners = ['imageAdded'];

    
    public $url;

    public function render()
    {
        $images = Image::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('livewire.managers.image-manager', compact('images'));
    }

    public function imageAdded(){

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
