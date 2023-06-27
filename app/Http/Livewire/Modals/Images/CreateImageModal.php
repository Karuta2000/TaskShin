<?php

namespace App\Http\Livewire\Modals\Images;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Image;

class CreateImageModal extends Component
{
    public $url;


    protected $listeners = ['openCreateModal', 'closeCreateModal'];

    public function openCreateModal()
    {
        $this->dispatchBrowserEvent('openCreateModal');
    }

    public function render()
    {
        return view('livewire.modals.images.create-image-modal', [
            'url' => $this->url,
        ]);
    }

    public function storeImage(){
        $this->closeCreateModal();
        if($this->url != null){
            $image = New Image;
            $image->url = $this->url;
            $image->user_id = Auth::id();
            $image->save();
            $this->clearForm();
            $this->emit('imageAdded');
        }


    }


    public function closeCreateModal(){
        $this->dispatchBrowserEvent('closeCreateModal');
    }
    
    private function clearForm(){
        $this->url = "";
    }
}
