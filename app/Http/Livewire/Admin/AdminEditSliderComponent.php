<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;

    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $slider_id;
    public $newimage;

    public function mount($slide_id){
        $slider = HomeSlider::find($slide_id);
        $this->slider_id = $slider->id;
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
    }

    public function updateSlider(){
        $slider = HomeSlider::find($this->slider_id);
        $slider->id = $this->slider_id;
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;
        if($this->newimage){
            $imagename = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('sliders',$imagename);
            $slider->newimage = $imagename;
        }
        $slider->status = $this->status;

        $slider->save();
        session()->flash('message','Slide has been Updating Successfully!');
        // $this->emit('update_slider');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')
            ->layout('layouts.base');
    }
}
