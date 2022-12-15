<x-layout>
  <x-slot name="scripts"></x-slot>
    <section class="w-full">
      <div class="relative px-4 pt-16 pb-20 bg-gray-50 sm:px-6 lg:px-8 lg:pt-24 lg:pb-28">
        <div class="absolute inset-0">
          <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative mx-auto max-w-7xl">
          <div class="text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">From the blog</h2>
            <p class="max-w-2xl mx-auto mt-3 text-xl text-gray-500 sm:mt-4">
              Some interesting articles about something interesting
            </p>
          </div>
          <div
            class="pt-6 text-center"
            x-data>
            <button
              type="button"
              x-on:click="$store.sidebar.toggle()"
              class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Submit New Post
            </button>
            <x-sidebar/>
          </div>

          <livewire:post.index />

        </div>


      </div>
    </section>
</x-layout>
