<div>



    <div class="py-2 shadow-sm rounded mb-3 bg-blur">

        <div class="input-group col-2">
            <input type="text" id="searchInput" class="form-control" wire:model="url" placeholder="Add..." style="background-color: #FFFFFF">
            <a href="#" wire:click="storeImage()" class="btn btn-light text-left border-0"
                style="text-align: left !important; background: #0d1b20  !important; color: #00A8E8">
                <i class="fa fa-plus" aria-hidden="true"></i></a>

        </div>
    </div>




    <div class="gallery">

        @foreach ($images as $image)
            <div class="gallery-item" wire:click="$emit('openImageModal', '{{ $image->url }}')">
                <img src="{{ $image->url }}" class="shadow">
            </div>
        @endforeach

    </div>


</div>

@livewire('modals.image-modal')
