<?php

namespace App\Livewire;

use App\Http\Resources\AuthorResource;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', ['authors' => AuthorResource::collection(User::all())]);
    }
}
