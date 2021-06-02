<div>
    <div class="container">
        <div class="row" style="margin-top:3%;">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>All Categories</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcategory')}}"
                                    class="btn btn-success pull-right">Add New Category
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('delete_category'))
                            <div class="alert alert-success alert-dismissible">
                                {{session('delete_category')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a href="{{route('admin.editcategory',
                                                ["category_slug"=>$category->slug])}}"
                                                class="btn btn-primary">
                                                <i class="fa fa-edit"></i> E.Category
                                            </a>
                                            <a href="#" onclick="confirm('Are you sure you want to delete this category?')||
                                                event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteCategory({{$category->id}})"
                                                class="btn btn-danger">
                                                <i class="fa fa-remove"></i> R.Category

                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <td>{{$categories->links()}}</td>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
