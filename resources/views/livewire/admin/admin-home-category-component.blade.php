<div>
    <div class="container">
        <div class="row" style="margin-top:3%">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Manage Home Categories</h4>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Chose Category</label>
                                <div class="col-md-4">
                                    <Select class="form-control sel_categories" wire:ignor
                                        name="categories[]" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </Select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">No of Products</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="nunmberofproducts">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button class="btn btn-primary">Save</button>
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
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change', function(e){
                var data = $('.sel_categories').select2('val');
                @this.set('selected_categories',data);
            });
        });
    </script>
@endpush('scripts')
