<div>
    <div class="container">
        <div class="row" style="margin-top:3%">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>All Products</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addproduct')}}"
                                    class="btn btn-success pull-right">Add New Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('success_delete'))
                            <div class="alert alert-success">{{session('success_delete')}}</div>
                        @endif
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>
                                                <img src="{{asset('assets/images/products')}}/{{$product->image}}"
                                                    alt="{{$product->name}}"
                                                    style="width:50px;height: 50px; border:1px solid #555" />
                                            </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->stock_status}}</td>
                                            <td>{{$product->regular_price}}</td>
                                            <td>{{$product->sal_price}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"
                                                    class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="" onclick="confirm('Are you sure you want to delete this product?')||
                                                    event.stopImmediatePropagation()"
                                                    class="btn btn-danger"
                                                    wire:click.prevent="deleteProduct({{$product->id}})">
                                                    <i class="fa fa-remove"></i> Remove
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
