<div style="text-align: left !important">
    <div class="p-2 shadow-sm rounded mb-3 bg-blur">
        <a href="#" wire:click="newNote()" class="btn" style="background: transparent  !important; color: #00A8E8;"><i
                class="fa fa-plus" aria-hidden="true"></i></a>
        <div class="float-right">
            <input type="text" id="searchInput" class="form-control" wire:model="searchTerm"
                    placeholder="Search...">
        </div>
    </div>
    <div class="note-board">
        @foreach ($notes as $note)
            @livewire('cards.note-card', ['note' => $note], key($note->id))
        @endforeach
    </div>
</div>
