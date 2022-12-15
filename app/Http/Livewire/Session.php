<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Session extends Component
{
    protected $listeners = [
        'blogPostCreated' => 'flash',
        'blogPostUpdated' => 'flash',
        'blogPostDeleted' => 'flash'
    ];

    public function flash( $value )
    {
        session()->flash('message', $value);
        return redirect()->route('home');
    }

    public function clearSession()
    {
        session()->flush();
    }

    public function render()
    {
        return view('livewire.session');
    }
}
