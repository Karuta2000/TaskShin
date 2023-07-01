<div style="text-align: left !important">
    @if ($settings['panel'])
        <div class="p-2 shadow-sm rounded mb-3 bg-blur">
            <a href="#" wire:click="newNote()" class="btn"
                style="background: transparent  !important; color: #00A8E8;"><i class="fa fa-plus"
                    aria-hidden="true"></i></a>
            <div class="float-right">
                <input type="text" id="searchInput" class="form-control" wire:model="searchTerm"
                    placeholder="Search...">
            </div>
        </div>
    @endif
    <div class="note-board">
        @if ($settings['newNote'])
            <div class="board-item" wire:click="newNote()">
                <a href="#">
                    <div class="new-item"></div>
                </a>
            </div>
        @endif


        @foreach ($notes as $note)
            @livewire('cards.note-card', ['note' => $note], key($note->id))
        @endforeach
    </div>
</div>
