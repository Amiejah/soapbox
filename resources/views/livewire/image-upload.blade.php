
<div>
    <div
        class="flex flex-col items-center justify-center"
        x-data="drop_file_component()">
        <div
            class="flex flex-col items-center justify-center py-6 border-2 border-dashed rounded w-96"
            x-bind:class="droppingFile ? 'bg-gray-400 border-gray-500' : 'border-gray-500 bg-gray-200'"
            x-on:drop="droppingFile = false"
            x-on:drop.prevent="handleFileDrop($event)"
            x-on:dragover.prevent="droppingFile = true"
            x-on:dragleave.prevent="droppingFile = false">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <div class="text-center" wire:loading.remove wire.target="file">Drop Your File Here</div>
            <div class="mt-1" wire:loading.flex wire.target="file">
                <svg class="w-5 h-5 mr-3 -ml-1 text-gray-700 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <div>Processing File</div>
            </div>
        </div>
        @if(!empty($files))
            <div class="flex flex-col gap-4 mt-4">
                    @foreach ( $files as $file )
                        <img src="{{ $file->temporaryUrl() }}" alt="">
                    @endforeach
            </div>
        @endif

    </div>

    <script>
        function drop_file_component() {
            return {
                droppingFile: false,
                handleFileDrop(e) {
                    if (event.dataTransfer.files.length > 0) {
                        const files = e.dataTransfer.files;
                        @this.uploadMultiple('files', files,
                            (uploadedFilename) => {}, () => {}, (event) => {}
                        )
                    }
                }
            };
        }
    </script>
</div>
