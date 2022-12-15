<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{
    public Post $post;

    public function edit()
    {
        $this->emit('blogPostEditing', $this->post);
        $this->dispatchBrowserEvent('edit', ['open' => false]);

    }

    public function render()
    {
        return view('livewire.edit');
    }

}
