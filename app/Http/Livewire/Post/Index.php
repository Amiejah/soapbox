<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $search;
    public $sortField = 'created_at';
    public $sortAsc = false;

    protected $queryString = [
        'search' => ['except'=>''],
        'sortAsc' => ['except'=> false],
        'sortField' => ['except' => 'created_at']
    ];

    // protected $queryString = [
    //     'search',
    //     'sortAsc',
    //     'sortField'
    // ];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {

        if ($this->sortField == $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $posts = Post::where('title', 'like', "%{$this->search}%");
        if ( $this->sortAsc ) {
            $posts->latest($this->sortField);
        }

        $results = $posts->paginate(3);

        return view('livewire.post.index', [
            'posts' => $results,
        ]);
    }

    /**
     * Overriding the paginationView to load a custom pagination file
     */
    public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    }
}
