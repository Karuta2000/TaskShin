<div class="mb-3">
    <input type="text" wire:model="searchTerm" placeholder="Search tags..." class="form-control">
    <div class="list-group mt-2" style="max-height: 200px; overflow-y: auto;">
        @foreach ($searchResults as $tag)
            <button wire:key="tag-{{ $tag->id }}" wire:click="setTag({{ $tag->id }})" type="button"
                class="list-group-item list-group-item-action{{ in_array($tag->id, $selectedTags) ? ' active' : '' }}">
                {{ $tag->name }}
            </button>
        @endforeach

        <button wire:click="createTag()" type="button"
                class="list-group-item list-group-item-action">
                Create {{ $searchTerm }} tag
            </button>
    </div>
</div>
