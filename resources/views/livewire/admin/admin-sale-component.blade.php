<div>
    <div class="container">
        <div class="row" style="margin-top:3%">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Sale Settings</h4>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success">{{session('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent='updateDate()'>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">In Active</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Date</label>
                                <div class="col-md-4">
                                    <input type="text" id="sale-date" wire:model="sale_date"
                                        class="form-control input-md"
                                        placeholder="YYYY/MM/DD H:M:S">
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
            $('#sale-date').datetimepicker({
                format: 'Y-MM-DD h:m:s',
            }).on('dp.hide', function(e){
                var data = $('#sale-date').val();
                console.log(data)
                @this.set('sale_date',data);
            })
        });
    </script>
@endpush
