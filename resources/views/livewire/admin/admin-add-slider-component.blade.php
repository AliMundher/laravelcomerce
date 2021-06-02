<div>
    <div class="container">
        <div class="row" style="margin-top:3%">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Add New Slider</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}"
                                    class="btn btn-success pull-right">All Slides</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success">{{Session::get('message')}}</div>
                        @endif
                        <form wire:submit.prevent="addSlide" class="form-horizontal"
                            enctype="multipart/form-data" id="form_slider">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Title" name="title" required wire:model='title'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">SubTitle</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="SubTitle" name="subtitle" required wire:model="subtitle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Price" name="price" required wire:model="price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md"
                                        placeholder="Link" name="subtitle"  required wire:model="link">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" name="file" class="input-file" wire:model="image">
                                    @if ($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select name="" class="form-control" wire:model="status">
                                        <option value="0">In Active</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Create Slide</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
