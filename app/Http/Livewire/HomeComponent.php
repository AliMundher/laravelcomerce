<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\HomeCategory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;


class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $products = Product::orderBy('created_at',"DESC")->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id', $cats)->get();
        $no_of_products = $category->no_of_products;
        $singleProducts = Product::where('sal_price','>',0)->inRandomOrder()->get()->take(8);
        $sale = Sale::find(1);
        return view('livewire.home-component',
            [
                'sliders' =>$sliders,
                'products' =>$products,
                'categories' =>$categories,
                'no_of_products' =>$no_of_products,
                'singleProducts' =>$singleProducts,
                'sale' =>$sale,
            ])->layout('layouts.base');
    }
}
