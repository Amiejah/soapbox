
<div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
    <div class="flex-shrink-0">
        <a href="{{ $post->slug }}">
            @if ( $post->image )
            <img
                class="object-cover w-full h-48"
                src="{{ Storage::url($post->image) }}">
            @else
            <img
                class="object-cover w-full h-48"
                src="https://placeimg.com/1024/540/any">
            @endif
        </a>
    </div>
    <div class="flex flex-col justify-between flex-1 p-6 bg-white">
        <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
                <livewire:edit :post="$post" wire:key="post-{{$post->id}}"/>
            </p>
            <a href="{{ $post->slug }}" class="block mt-2">
                <p class="text-xl font-semibold text-gray-900">{{ $post->title }}</p>
                <p class="mt-3 text-base text-gray-500 line-clamp-3">{!! $post->content !!}</p>
            </a>
        </div>
    </div>
</div>
