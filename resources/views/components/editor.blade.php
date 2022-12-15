
@props(['text' => ''])
<div
  x-data="editor(
    $wire.entangle('{{ $attributes->wire('model')->value() }}')
  )"
  x-init=""
  wire:ignore
  {{ $attributes->whereDoesntStartWith('wire:model') }}>


{{$text}}  {{ $attributes }}
  <template x-if="isLoaded()">
    <div class="inline-flex mb-4 rounded-md shadow-sm isolate">
      <button type="button" @click="toggleHeading({ level: 1 })" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
        H1
      </button>
      <button type="button" @click="toggleBold()" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
        Bold
      </button>
      <button type="button" @click="toggleItalic()" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500">
        Italic
      </button>
    </div>
  </template>
  <div
    x-ref="element"
    wire:model="$wire.entangle('{{ $attributes->wire('model')->value() }}')"
    class="h-[140px] w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
  </div>

  @if($attributes['error'] !== '')
    <p class="mt-1 text-red-500">{{ $attributes['errors'] }}</p>
  @endif

</div>

<style>
  .ProseMirror {
    height: 100%;
    padding: 1rem;
  }
</style>
