<div>
    <div class="container">
        <div class="row" style="margin-top:3%;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Add New Coupon</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupons')}}"
                                    class="btn btn-success pull-right"
                                    >All Coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCoupon()">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Coupon Code</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Coupon Code" name="code"
                                        wire:model="code" >
                                    @error('code') <p class="text-red-600 text-capitalize">{{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Coupon Type</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="type">
                                        <option value="">Select</option>
                                        <option value='fixed'>Fixed</option>
                                        <option value='precent'>Precent</option>
                                    </select>
                                    @error('type') <p class="text-red-600 text-capitalize">{{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Coupon Value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Coupon Value" wire:model="value">
                                    @error('value') <p class="text-red-600 text-capitalize">{{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Cart Value</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Cart Value" wire:model="cart_value">
                                    @error('cart_value') <p class="text-red-600 text-capitalize">{{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Expiry Date</label>
                                <div class="col-md-4" wire:ignore>
                                    <input type="text" class="form-control input-md" id="expiry_date"
                                        placeholder="Expiry Date" wire:model="expiry_date">
                                    @error('expiry_date') <p class="text-red-600 text-capitalize">{{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function() {
            $('#expiry_date').datetimepicker({
                format: 'YY-MM-DD'
            })
            .on('dp.change', function(e){
                var data = $('#expiry_date').val();
                @this.set('expiry_date', data);
            })
        });
    </script>
@endpush
