<?php

namespace App\Http\Livewire\App\Settings;

use Livewire\Component;

class Nav extends Component
{

    public $pages = [];
    public $activePage;
    
    public function render()
    {
        return view('livewire.app.settings.nav');
    }

    public function mount($pages, $activePage){
        $this->pages = $pages;
        $this->activePage = $activePage;
    }

    public function changePage($newPage){
        $this->activePage = $newPage;
        $this->emit('pageChanged', $newPage);
    }
}
