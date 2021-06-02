<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $max_price;
    public $min_price;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_price = 1;
        $this->max_price = 1000;
    }

    // public function store($id,$name,$regular_price){
    //     Cart::instance('cart')->add($id,$name,1,$regular_price)->associate("App\Models\Product");
    //     session()->flash('success_message','Item Added In Cart');
    //     return redirect()->route('product.cart');
    // }


    public function addToWishList($product_id, $product_name, $product_price){
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshcomponent');
    }

    public function removeFromWishList($product_id){
        foreach(Cart::instance('wishlist')->contents() as $item){
            if($item->id == $product_id){
                Cart::instance('wishlist')->remove($item->rowId);
                $this->emitTo('wishlist-count-component','refreshcomponent');
                return;
            }
        }
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting === "date"){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])
                ->orderBy('created_at',"DESC")
                ->paginate($this->pagesize);
        }
        else if($this->sorting === "price"){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])
                ->orderBy('regular_price',"ASC")
                ->paginate($this->pagesize);
        }
        else if($this->sorting === "price-desc"){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])
                ->orderBy('regular_price',"DESC")
                ->paginate($this->pagesize);
        }
        else{
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])
                ->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.shop-component',
            [
                'products' => $products,
                'categories'=>$categories,
            ])->layout('layouts.base');
    }
}
