<div>

  <livewire:session/>
  <div class="flex flex-row gap-4 mt-4">
    <div>
      <input type="search" wire:model="search" placeholder="Search by title or content">
    </div>


    <div class="flex items-center">
        <div class="flex items-center">
          <button wire:click="sortBy('created_at')" class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
            Sort by date
          </button>
          <x-sort-icon
            field="created_at"
            :sortField="$sortField"
            :sortAsc="$sortAsc"
          />
        </div>
    </div>
  </div>

  <div class="grid max-w-lg gap-5 mx-auto mt-12 lg:max-w-none lg:grid-cols-3">
    @foreach ($posts as $post)
      <x-post.card :post="$post" wire:key="card-{{ $post->id }}" />
    @endforeach
  </div>
  <div>
    {{ $posts->links() }}
  </div>

</div>
