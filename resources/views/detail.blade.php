<x-layout>
  <x-slot name="scripts"></x-slot>
    <div class="relative bg-white lg:h-screen">
      <div class="lg:h-full lg:absolute lg:inset-0">
        <div class="lg:absolute lg:inset-y-0 lg:left-0 lg:w-1/2">
        @if( $post->image )
            <img class="object-cover w-full h-56 lg:absolute lg:h-full" src="{{ Storage::url($post->image) }}" alt="">
        @else
        <img
            class="object-cover w-full h-56 lg:absolute lg:h-full"
            src="https://placeimg.com/1024/540/any" alt="">
        @endif
        </div>
      </div>
      <div class="relative px-4 pt-12 pb-16 sm:px-6 sm:pt-16 lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-2 lg:px-8">
        <div class="lg:col-start-2 lg:pl-8">
          <div class="mx-auto text-base max-w-prose lg:ml-auto lg:mr-0 lg:max-w-lg">
            <h3 class="mt-2 text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl">
              {{ $post->title }}
            </h3>

            <div class="mt-5 prose text-gray-500 prose-indigo">
              {!! $post->content !!}
            </div>
          </div>
        </div>
      </div>
    </div>

</x-layout>
