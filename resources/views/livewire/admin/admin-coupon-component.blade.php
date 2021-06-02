<div>
    <div class="container">
        <div class="row" style="margin-top:3%;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>All Coupons</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcoupon')}}"
                                    class="btn btn-success pull-right">Add New Coupons
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('messag'))
                            <div class="alert alert-success alert-dismissible">
                                {{session('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>Id</th>
                                <th>Coupon Code</th>
                                <th>Coupon Type</th>
                                <th>Coupon Value</th>
                                <th>Cart Value</th>
                                <th>Expiry Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{$coupon->id}}</td>
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->type}}</td>
                                        @if ($coupon->type=='fixed')
                                            <td>${{$coupon->value}}</td>
                                        @else
                                            <td>{{$coupon->value}} %</td>
                                        @endif
                                        <td>{{$coupon->cart_value}}</td>
                                        <td>{{$coupon->expiry_date}}</td>
                                        <td>
                                            <a href="{{route('admin.editcoupon',
                                                ["coupon_id"=>$coupon->id])}}"
                                                class="btn btn-primary " style="margin-right:7px">
                                                <i class="fa fa-edit"></i> Edit Coupon
                                            </a>
                                            <a href="#" onclick="confirm('Are you sure you want to delete this coupon?')||
                                                event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteCoupon({{$coupon->id}})"
                                                class="btn btn-danger ">
                                                <i class="fa fa-remove"></i> Remove Coupon

                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <td>{{$categories->links()}}</td> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
