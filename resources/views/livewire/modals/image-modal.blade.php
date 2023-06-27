<div>
    <div wire:ignore.self class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ $image }}" alt="Modal Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        document.addEventListener('livewire:load', function () {
        Livewire.on('openImageModal', function () {
            $('#imageModal').modal('show');
        });
    });
</script>