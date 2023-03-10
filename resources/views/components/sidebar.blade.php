<div
    class="relative z-10"
    aria-labelledby="slide-over-title"
    role="dialog"
    aria-modal="true"
    x-cloak
    x-show="$store.sidebar.open">
  <!-- Background backdrop, show/hide based on slide-over state. -->
  <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

  <div class="fixed inset-0 overflow-hidden">
    <div class="absolute inset-0 overflow-hidden">
      <div class="fixed inset-y-0 right-0 flex max-w-full pl-10 pointer-events-none">
        <!--
          Slide-over panel, show/hide based on slide-over state.

          Entering: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-full"
            To: "translate-x-0"
          Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
            From: "translate-x-0"
            To: "translate-x-full"
        -->
        <div class="w-screen max-w-md pointer-events-auto">
          <div class="flex flex-col h-full py-6 overflow-y-scroll bg-white shadow-xl">
            <div class="px-4 sm:px-6">
              <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Submit new post</h2>
                <div class="flex items-center ml-3 h-7">
                  <button
                    type="button"
                    x-on:click="$store.sidebar.toggle()"
                    class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="sr-only">Close panel</span>
                    <!-- Heroicon name: outline/x-mark -->
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="relative flex-1 px-4 mt-6 sm:px-6">
              <!-- Replace with your content -->
              <div class="absolute inset-0 px-4 sm:px-6">
                <div class="h-full" aria-hidden="true">
                    <div class="text-left">
                      <livewire:post.form />
                    </div>
                </div>
              </div>
              <!-- /End replace -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
