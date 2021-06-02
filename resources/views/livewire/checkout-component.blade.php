
<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    {{-- Start Billing Address --}}
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input type="text" name="fname" value=""
                                    placeholder="Type Your First Name" wire:model="firstname">
                                @error('firstname') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input type="text" name="lname" value=""
                                    placeholder="Type Your Last Name"  wire:model="lastname">
                                @error('lastname') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input type="email" name="email" value=""
                                    placeholder="Type your Email" wire:model="email">
                                @error('email') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="mobile">Phone number<span>*</span></label>
                                <input type="number" name="mobile" value=""
                                    placeholder="Type 10 digits format" wire:model="mobile">
                                @error('mobile') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="line1">Line1:</label>
                                <input type="text" name="line1" value=""
                                    placeholder="Type Street at apartment number" wire:model="line1">
                                @error('line1') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="line2">Line2:</label>
                                <input type="text" name="line2" value=""
                                    placeholder="Type Street at apartment number" wire:model="line2">
                                @error('line2') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">Town City<span>*</span></label>
                                <input type="text" name="city" value=""
                                    placeholder="Type Your City" wire:model="city">
                                @error('city') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="province">Province</label>
                                <input type="text" name="province" value=""
                                    placeholder="Type Your Province" wire:model="province">
                                @error('province') <spanp class="text-red-600">{{$message}}</spanp> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input type="text" name="country" value=""
                                    placeholder="Type Your Country Name" wire:model="country">
                                @error('country') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="zipcode">ZIP / CodePostal<span>*</span></label>
                                <input type="number" name="zipcode" value=""
                                    placeholder="Type Your Zipcode" wire:model="zipcode">
                                @error('zipcode') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="is_ship_to_different">
                                    <span>Ship to a different address?</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    {{-- End Billing Address --}}
                    <hr>
                    {{-- Start Shipping Address --}}
                    @if ($is_ship_to_different)
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input type="text" name="fname" value=""
                                    placeholder="Type Your First Name" wire:model="s_firstname">
                                    @error('s_firstname') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input type="text" name="lname" value=""
                                    placeholder="Type Your Last Name"  wire:model="s_lastname">
                                    @error('s_lastname') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input type="email" name="email" value=""
                                    placeholder="Type your Email" wire:model="s_email">
                                    @error('s_email') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="mobile">Phone number<span>*</span></label>
                                <input type="number" name="mobile" value=""
                                    placeholder="Type 10 digits format" wire:model="s_mobile">
                                    @error('s_mobile') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="line1">Line1:</label>
                                <input type="text" name="line1" value=""
                                    placeholder="Type Street at apartment number" wire:model="s_line1">
                                    @error('s_line1') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="line2">Line2:</label>
                                <input type="text" name="line2" value=""
                                    placeholder="Type Street at apartment number" wire:model="s_line2">
                                    @error('s_line2') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">Town City<span>*</span></label>
                                <input type="text" name="city" value=""
                                    placeholder="Type Your City" wire:model="s_city">
                                    @error('s_city') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="province">Province</label>
                                <input type="text" name="province" value=""
                                    placeholder="Type Your Province" wire:model="s_province">
                                    @error('s_province') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input type="text" name="country" value=""
                                    placeholder="Type Your Country Name" wire:model="s_country">
                                    @error('s_country') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="zipcode">ZIP / CodePostal<span>*</span></label>
                                <input type="number" name="zipcode" value=""
                                    placeholder="Type Your Zipcode" wire:model="s_zipcode">
                                    @error('s_zipcode') <span class="text-red-600">{{$message}}</span> @enderror
                            </p>
                        </div>
                    </div>
                    @endif
                    {{-- End Shipping Address --}}
                </div>
            </form>
        </div>
        {{-- Start Summary --}}
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    <p class="summary-info"><span class="title">Check / Money order</span></p>
                    <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank"
                                value="cod"   type="radio" wire:model="paymentmode">
                            <span>Cash On Delivery</span>
                            <span class="payment-desc">Order Now Pay Delivery</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa"
                                value="card" type="radio" wire:model="paymentmode">
                            <span>Debit / Cardit Card</span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal"
                                value="paypal" type="radio" wire:model="paymentmode">
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
                        @error('paymentmode') <p class="text-red-600">{{$message}}</p> @enderror
                    </div>
                    @if (session()->has('checkout'))
                        <p class="summary-info grand-total">
                            <span>Grand Total</span>
                            <span class="grand-total-price">${{session()->get('checkout')['total']}}</span>
                        </p>
                    @endif
                    <button type="submit" class="btn btn-medium">Place order now</button>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed $0</span></p>

                </div>
            </div>
        {{-- End Summary --}}
        </div>
    </div>
</main>
