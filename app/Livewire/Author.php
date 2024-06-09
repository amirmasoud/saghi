<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Author extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.author');
    }
}
