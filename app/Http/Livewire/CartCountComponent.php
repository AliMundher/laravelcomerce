<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCountComponent extends Component
{
    protected $lisners = ['refreshcomponent'=>'$refersh'];
    public function render()
    {
        return view('livewire.cart-count-component')->layout('layouts.base');
    }
}
