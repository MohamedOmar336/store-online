@extends('layout.layout')
@section('title', __('general.products'))
@section('content')
    <x-content-header pageName="{{__('general.products')}}"></x-content-header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{__(route('products.create'))}}" class="btn btn-outline-info">
                                <i class="fa fa-plus"></i>
                                {{__('general.btn.new')}}</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width:1em">#</th>
                                    <th>{{__('general.attributes.image')}}</th>
                                    <th>{{__('general.attributes.name')}}</th>
                                    <th>{{__('general.attributes.category')}}</th>
                                    <th>{{__('general.attributes.unit')}}</th>
                                    <th>{{__('general.attributes.status')}}</th>
                                    <th style="width:4em">{{__('general.attributes.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><img class="img-fluid img-md" src="{{$record->image}}"></td>
                                        <td>{{$record['name_'.$local]}}</td>
                                        <td>{{$record->category?$record->category['name_'.app()->getLocale()]:''}}</td>
                                        <td>{{$record->unit?$record->unit['name_'.app()->getLocale()]:''}}</td>
                                        <td>{{$record->status?$record->status['name_'.app()->getLocale()]:''}}</td>
                                        <td>
                                            <a href="{{route('products.edit', $record->id)}}"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{route('products.destroy', $record->id)}}" class="text-danger"
                                               onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                                                <form id="delete-form"
                                                      action="{{route('products.destroy', $record->id)}}" method="POST"
                                                      class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th style="width:1em">#</th>
                                    <th>{{__('general.attributes.image')}}</th>
                                    <th>{{__('general.attributes.name')}}</th>
                                    <th>{{__('general.attributes.category')}}</th>
                                    <th>{{__('general.attributes.unit')}}</th>
                                    <th>{{__('general.attributes.status')}}</th>
                                    <th style="width:4em">{{__('general.attributes.actions')}}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('script')

@endpush
