<div class="flex flex-col justify-between flex-1">
    <div class="divide-y divide-gray-200">
        <div class="pt-6 pb-5 space-y-6">
            <form wire:submit.prevent="save" class="pt-6 pb-5 space-y-6">
                @csrf
                <div>
                    <label for="post-title" class="block text-sm font-medium text-gray-900">Post title</label>
                    <div class="mt-1">
                        <input wire:model.defer="post.title" type="text" placeholder="Post title" name="project-name" value="{{ old('post.title') }}" id="post-title"
                            class="@error('post.title')border border-red-300 @enderror block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('post.title')
                            <p class="mt-1 text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <x-editor wire:model.defer="post.content" :text="$post->content" :error="$errors->first('post.content')"/>
                </div>
                <div>
                    <livewire:image-upload wire:model.defer="post.images" />
                </div>
                <div>
                    @if($editing)
                        <a href="#"
                            type="button"
                            wire:click.prevent="deletePost"
                            class="inline-flex items-center rounded border border-transparent bg-red-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Delete
                        </a>

                        <button type="submit" class="inline-flex items-center rounded border border-transparent bg-indigo-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Edit post
                        </button>
                    @else
                        <button type="submit" class="inline-flex items-center rounded border border-transparent bg-indigo-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Submit form
                        </button>
                    @endif

                </div>
            </form>
        </div>
    </div>
</div>
