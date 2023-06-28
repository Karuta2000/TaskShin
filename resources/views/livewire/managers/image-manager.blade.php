<div>


    <div class="p-2 shadow-sm rounded mb-3 bg-blur">
        <div class="d-flex align-items-center justify-content-between">
            <div class="input-group flex-grow-2" style="margin-right: 30%">
                <input type="text" id="searchInput" class="form-control" wire:model="url" placeholder="Add..."
                    style="width: 150px;">
                <a href="#" wire:click="storeImage()" class="btn btn-light text-left border-0"
                    style="text-align: left !important; background: #0d1b20 !important; color: #00A8E8">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                </a>
            </div>
    
            <div class="input-group flex-grow-2" style="margin-left: 30%">
                <input type="text" id="searchInput" class="form-control" wire:model="searchTerm"
                    style="{{ \Illuminate\Support\Str::startsWith($searchTerm, '#') ? 'background-color: #BBC2E2' : '' }}"
                    placeholder="Search...">
            </div>
        </div>
    </div>
    
    

    <div class="gallery">

        @foreach ($images as $image)
            <div class="gallery-item"
                wire:click="$emit('openImageModal', '{{ $image->url }}', '{{ $image->id }}')">
                <img src="{{ $image->url }}" class="shadow">
            </div>
        @endforeach

    </div>

    {{ $images->links('livewire.pagination') }}

    @livewire('modals.image-modal')

</div>
