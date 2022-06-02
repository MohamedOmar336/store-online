<div>
    <button type="button" class="btn @if($oldStatus == 1) btn-outline-warning @elseif($oldStatus == 2) btn-outline-success @elseif($oldStatus == 3) btn-outline-danger @endif " data-toggle="modal" data-target="#modal-default{{$id}}" >
        {{$name}}
    </button>

    <div class="modal fade" id="modal-default{{$id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('general.actions.changeStatus')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="status-form{{$id}}" action="{{route(explode('.', \Request::route()->getName())[0].'.changeStatus')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="form-group col-12">
                            <label for="status_id">{{__('general.attributes.status_id')}}</label>
                            <select class="form-control selectStatus @error('status_id') is-invalid @enderror"
                                    style="width: 100%;" name="status_id" id="status_id">
                                <option selected disabled value="">{{__('general.select.status')}}</option>
                                @foreach(\App\Models\Status::wheretype('general')->get() as $status)
                                    <option value="{{$status->id}}" @if($status->id == $oldStatus) selected @endif>{{$status['name_'.app()->getLocale()]}}</option>
                                @endforeach
                            </select>
                            @error('status_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"  onclick="event.preventDefault();document.getElementById('status-form'+{{$id}}).submit();" >Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@push('script')
    <script>
        $('.selectStatus').select2();
    </script>
@endpush
