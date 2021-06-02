<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    protected $lisners = ['refreshcomponent'=>'$refersh'];
    public function render()
    {
        return view('livewire.wishlist-count-component')->layout('layouts.base');
    }
}
