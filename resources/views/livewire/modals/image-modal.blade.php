<div>

    <div wire:ignore.self class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @if ($shownImage != null)
                        <img src="{{ $image }}" alt="Modal Image" class="img-fluid w-100">

                </div>
                <div class="modal-footer">
                    <span class="badge text-bg-primary"> <i class="fa fa-eye" aria-hidden="true"></i>
                        {{ $shownImage->views }}</span>
                    <span class="badge text-bg-primary">{{ $shownImage->added() }}</span>

                    <div class="dropdown m-0">
                        <button class="btn btn-sm btn-link" type="button" id="image{{ $image }}Actions"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="image{{ $shownImage->id }}Actions">
                            <li><a class="dropdown-item" href="#" onclick="callLivewireMethod('setAvatar')">
                                <i class="fa fa-user" aria-hidden="true"></i> Set avatar
                            </a>
                            </li>
                            <li><a class="dropdown-item" href="#"
                                    onclick="callLivewireMethod('delete')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                            </li>
                            <div class="dropdown-divider mb-0"></div>
                            <div>
                                @livewire('app.images.tag-management')
                            </div>
                        </ul>
                    </div>

                </div>
                @endif
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
