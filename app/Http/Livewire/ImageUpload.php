<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;


class ImageUpload extends Component
{
    use WithFileUploads;

    public $files = [];
    public $paths = [];

    public function updatedFiles()
    {

        $this->validate([
            'files.*' => 'image|max:1024', // 1MB Max
        ]);

        foreach ($this->files as $file) {
            $this->paths[] = $file->store('public');
        }
        $this->emitUp('uploadedFiles', $this->paths);
    }

    public function render()
    {
        return view('livewire.image-upload');
    }
}
