<div>
    <div class="container">
        <div class="row" style="margin-top:3%;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Add New Category</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.categories')}}"
                                    class="btn btn-success pull-right"
                                    >All Categories</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('success_category'))
                            <div class="alert alert-success">{{session('success_category')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCategory()">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Category Name" name="name"
                                        wire:model="name" wire:keyUp="generateSlug()">
                                    @error('name') <p class="text-red-600 text-capitalize">{{$message}} @enderror</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Category Name" name="slug" wire:model="slug">
                                    @error('slug') <p class="text-red-600 text-capitalize">{{$message}} @enderror</p>
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
