@extends('layout.layout')
@section('title', __('general.profile'))
@section('content')
    <!-- header path for this page send page name -->
    <x-content-header pageName="{{__('general.profile')}}"></x-content-header>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="{{asset('general/user.jpg')}}"
                                     alt="{{auth()->user()->user_name}}">
                            </div>

                            <h3 class="profile-username text-center">{{auth()->user()->user_name}}</h3>

                            <p class="text-muted text-center">{{auth()->user()->email}}</p>
                            {{--                            <ul class="list-group list-group-unbordered mb-3">--}}
                            {{--                                <li class="list-group-item">--}}
                            {{--                                    <b>{{__('seller.count_views')}}</b> <a class="float-right">{{auth()->user()->company->total_viewers}}</a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="list-group-item">--}}
                            {{--                                    <b>{{__('seller.count_products')}}</b> <a class="float-right">{{auth()->user()->company->total_products}}</a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="list-group-item">--}}
                            {{--                                    <b>{{__('seller.count_rfq')}}</b> <a class="float-right">{{auth()->user()->company->total_rfq}}</a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                            {{--                            <a href="#" class="btn btn-primary btn-block"><b>{{auth()->user()->company->total_rating.'  '}}</b>  <i class="fas fa-star text-warning"></i></a>--}}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#updateProfile"
                                                        data-toggle="tab">{{__('general.update_profile')}}</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- tab-pane -->
                                <div class="tab-pane active" id="updateProfile">
                                    <form id="quickForm" class="form-horizontal"
                                          action="{{route('admins.update.profile')}}"
                                          method="post">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName"
                                                   class="col-sm-2 col-form-label">{{__('general.attributes.user_name')}}</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="user_name"
                                                       value="{{old('user_name')?old('user_name'):auth()->user()->user_name}}"
                                                       class="form-control @error('user_name') is-invalid @enderror"
                                                       id="inputName"
                                                       placeholder="{{__('general.attributes.user_name')}}">
                                                @error('user_name')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail"
                                                   class="col-sm-2 col-form-label">{{__('general.attributes.email')}}</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       id="inputEmail"
                                                       value="{{old('email')?old('email'):auth()->user()->email}}"
                                                       placeholder="{{__('general.attributes.email')}}">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2"
                                                   class="col-sm-2 col-form-label">{{__('general.attributes.password')}}</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       id="password"
                                                       placeholder="{{__('general.attributes.password')}}"
                                                       autocomplete="off">
                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2"
                                                   class="col-sm-2 col-form-label">{{__('general.attributes.confirmation_password')}}</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="confirmation_password"
                                                       class="form-control @error('confirmation_password') is-invalid @enderror"
                                                       id="inputName2"
                                                       placeholder="{{__('general.attributes.confirmation_password')}}"
                                                       autocomplete="off">
                                                @error('confirmation_password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <x-btn type="danger"></x-btn>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('script')
    <script>
        $(function () {
            $('#quickForm').validate({
                rules: {
                    user_name: {
                        required: true,
                        maxlength: 25
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 70
                    },
                    password: {
                        required: false,
                        minlength: 8,
                        maxlength: 25
                    },
                    confirmation_password: {
                        required: false,
                        minlength: 8,
                        maxlength: 25,
                        equalTo: "#password"
                    }
                },
                messages: {
                    user_name: {
                        required: '{{__('messages.required', ['attr' => __('general.attributes.user_name')])}}',
                        maxlength: '{{__('messages.maxlength', ['num' => 25, 'attr' => __('general.attributes.user_name')])}}'
                    },
                    email: {
                        required: '{{__('messages.required', ['attr' => __('general.attributes.email')])}}',
                        email: '{{__('messages.email', ['attr' => __('general.attributes.email')])}}',
                        maxlength: '{{__('messages.maxlength', ['num' => 70, 'attr' => __('general.attributes.email')])}}',
                    },
                    password: {
                        maxlength: '{{__('messages.maxlength', ['num' => 25 , 'attr' => __('general.attributes.password')])}}',
                        minlength: '{{__('messages.minlength', ['num' => 8 , 'attr' => __('general.attributes.password')])}}'
                    },
                    confirmation_password: {
                        maxlength: '{{__('messages.maxlength', ['num' => 25 , 'attr' => __('general.attributes.confirmation_password')])}}',
                        minlength: '{{__('messages.minlength', ['num' => 8 , 'attr' => __('general.attributes.confirmation_password')])}}',
                        equalTo: '{{__('messages.equalTo', ['attr' => __('general.attributes.password')])}}',
                    }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group .col-sm-10').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        })
    </script>
@endpush
