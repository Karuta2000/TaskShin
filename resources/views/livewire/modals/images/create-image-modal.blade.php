<div class="modal fade" id="createImageModal" tabindex="-1" role="dialog" aria-labelledby="createImageModalLabel"
    aria-hidden="true" wire:ignore>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="addImageModalLabel">New Image</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">URL</label>
                    <input type="text" class="form-control" id="url" name="url" wire:model="url" required>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button type="button" wire:click="storeImage()" class="btn btn-primary" data-dismiss="modal"
                    aria-label="Close" id="closeModalButton">Add</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('openCreateModal', function() {
                $('#createImageModal').modal('show');
            });
        });

    </script>
</div>
