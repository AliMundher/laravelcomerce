<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function removeFromWishList($product_id){
        foreach(Cart::instance('wishlist')->contents() as $item){
            if($item->id == $product_id){
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('wishlist-count-component','refreshcomponent');
                return;
            }
        }
    }

    public function moveProductFromWishListToCart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')
            ->add($item->id, $item->name, $item->price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshcomponent');
        $this->emitTo('cart-count-component','refreshcomponent');
    }

    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
