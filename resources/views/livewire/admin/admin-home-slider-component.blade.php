<div>
    <div class="container">
        <div class="row" style="margin-top:3%">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>All Slides</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addhomeslider')}}"
                                    class="btn btn-success pull-right">Add New Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>SubTitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($sliders as $slider)
                                        <tr>
                                            <td>{{$slider->id}}</td>
                                            <td>
                                                <img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="120">
                                            </td>
                                            <td>{{$slider->title}}</td>
                                            <td>{{$slider->subtitle}}</td>
                                            <td>{{$slider->price}}</td>
                                            <td>{{$slider->link}}</td>
                                            <td>{{$slider->status === 1 ? 'active' : 'inactive'}}</td>
                                            <td>{{$slider->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.edithomeslider',['slide_id'=>$slider->id])}}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="" class="btn btn-danger"
                                                    wire:click.prevent="deleteSlide({{$slider->id}})">
                                                    <i class="fa fa-remove"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
