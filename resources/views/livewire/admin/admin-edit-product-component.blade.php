<div>
    <div class="container">
        <div class="row" style="margin-top:3%;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Edit Product</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.product')}}"
                                    class="btn btn-success pull-right"
                                    >All Products</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('update_product'))
                            <div class="alert alert-success">{{session('update_product')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data"
                            wire:submit.prevent="updateProduct()" id="form_update_product">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Product Name" name="name"
                                        wire:model="name" wire:keyUp="generateSlug()" >
                                    @error('name') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Product Name" name="slug" wire:model="slug">
                                    @error('slug') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4">
                                    <textarea type="text" class="form-control input-md"
                                        placeholder="Sort Description" name="sort_description"
                                        wire:model="short_description">
                                    </textarea>
                                    @error('short_description') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>
                                <div class="col-md-4">
                                    <textarea type="text" class="form-control input-md"
                                        placeholder="Description" name="description" wire:model="description" >
                                    </textarea>
                                    @error('description') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Regular Price" name="regular_price"
                                        wire:model="regular_price" >
                                    @error('regular_price') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Sal Price" name="sal_price"
                                        wire:model="sal_price" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="SKU" name="sku"
                                        wire:model="SKU" >
                                    @error('SKU') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock Status</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="stock_status">
                                        <option value="instock">In Stock</option>
                                        <option value="outofstock">Out of Stock</option>
                                    </select>
                                    @error('stock_status') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Features</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image of Product</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file"
                                        name="image"
                                        wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120" alt="">
                                    @else
                                        <img src="{{asset('assets/images/products')}}/{{$image}}"
                                            width="120" alt="">
                                    @endif
                                    @error('image') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Qunatity</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Quantity" name="quantity"
                                        wire:model="quantity" >
                                    @error('quantity') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class='text-red-600'>{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
