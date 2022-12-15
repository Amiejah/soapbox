<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Validation\Validator;
use Livewire\Component;

class Form extends Component
{
    public Post $post;
    public $editing = false;
    public $message;

    protected $rules = [
        'post.title' => 'required|string|min:6',
        'post.content' => 'required|string|min:4|max:500',
        'post.image' => 'nullable',
    ];

    protected $listeners = [
        'blogPostEditing',
        'uploadedFiles' => 'uploadedFiles'
    ];


    public function uploadedFiles( $files )
    {
        $this->post->image = $files[0];
    }

    public function blogPostEditing($post)
    {
        $this->post = Post::findOrFail($post['id']);
        $this->editing = true;

    }

    public function mount()
    {
        $this->post = new Post();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetForm()
    {
        $this->post = new Post();
        $this->message = null;
    }

    public function save()
    {
        $this->validate();

        if ($this->editing) {
            $this->post->update();
            $this->emit('blogPostCreated', "Your post has been created, thank you!");
            $this->dispatchBrowserEvent('blogPostCreated');
        } else {
            $this->post->save();
            $this->emit('blogPostUpdated', "Your post has been updated, thank you!");
            $this->dispatchBrowserEvent('blogPostUpdated');
        }

        $this->resetForm();
    }

    public function deletePost()
    {
        $this->post->delete();

        $this->emit('blogPostDeleted', "Your post has been deleted");
        $this->dispatchBrowserEvent('blogPostDeleted');
    }

    public function render()
    {
        return view('livewire.post.form');
    }
}
