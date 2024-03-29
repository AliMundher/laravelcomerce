<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminAddComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
    }

    public function storeCategory(){
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('success_category',"Category Added Success...");
    }

    public function render()
    {
        return view('livewire.admin.admin-add-component')->layout('layouts.base');
    }
}
