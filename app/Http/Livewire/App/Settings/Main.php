<?php

namespace App\Http\Livewire\App\Settings;

use Livewire\Component;

class Main extends Component
{

    public $pages;
    public $activePage;

    protected $listeners = ['pageChanged'];

    public function render()
    {
        return view('livewire.app.settings.main');
    }
    
    public function mount(){
        $this->pages = ['user', 'profile', 'password', 'avatar', 'preferences'];
        $this->activePage ='user';
    }

    public function pageChanged($newPage){
        $this->activePage = $newPage;
    }
}
