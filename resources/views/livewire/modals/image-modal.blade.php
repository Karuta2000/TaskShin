<div>
    <div wire:ignore.self class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ $image }}" alt="Modal Image" class="img-fluid">
                    <div class="dropdown m-0">
                        <button class="btn btn-sm btn-link" type="button" id="image{{ $image }}Actions"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="image{{ $imageId }}Actions">
                            <li><a class="dropdown-item" href="#" onclick="callLivewireMethod('setAvatar')">Set avatar</a>
                            </li>
                            <li><a class="dropdown-item" href="#"  onclick="callLivewireMethod('delete')">Delete</a>
                            </li>
                        </ul>
                    </div>
                    <div class="form-group">
                        @livewire('app.images.tag-management')
                    </div>
                </div>
            </div>

        </div>
    </div>

    
<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('openImageModal', function() {
            $('#imageModal').modal('show');
        });
        Livewire.on('imageDeleted', function() {
        $('#imageModal').modal('hide');
    });

    });

    function callLivewireMethod(method) {
        Livewire.emit(method);
    }
</script>

</div>
