<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;

    public function updated($fields){
        $this->validateOnly($fields,[
            'code'=> 'required|unique:coupons',
            'type'=> 'required',
            'value'=> 'required|numeric',
            'cart_value'=> 'required|numeric',
            'expiry_date'=> 'required',
        ]);
    }

    public function storeCoupon(){
        $this->validate([
            'code'=> 'required|unique:coupons',
            'type'=> 'required',
            'value'=> 'required|numeric',
            'cart_value'=> 'required|numeric',
            'expiry_date'=> 'required',
        ]);
        $coupon = new Coupon();
        $coupon->code = $this->code;
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('message','Coupon has been created Successfully...');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')
            ->layout('layouts.base');
    }
}
