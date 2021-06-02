<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sal_price;
    public $SKU;
    public $stock_status;
    public $quantity;
    public $featured;
    public $image;
    public $newimage;
    public $product_id;

    public function mount($product_slug){
        $product = Product::where('slug',$product_slug)->first();
        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sal_price = $product->sal_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->quantity = $product->quantity;
        $this->featured = $product->featured;
        $this->image = $product->image;
        $this->product_id = $product->id;
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sal_price'=>'numeric',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required',
            'category_id'=>'required'
        ]);
    }


    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sal_price'=>'numeric',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required',
            'category_id'=>'required'
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sal_price = $this->sal_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->quantity = $this->quantity;
        $product->featured = $this->featured;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image = $imageName;
        }
        $product->category_id = $this->category_id;
        $product->save();
        session()->flash('update_product','Product has been Updating successfully...');
        $this->emit('update_product');
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',
            ['categories'=>$categories])
            ->layout('layouts.base');
    }
}
