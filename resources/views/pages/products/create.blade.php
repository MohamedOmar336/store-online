@extends('layout.layout')
@section('title', __('general.products'))
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dist/css/steper.css') }}">
@endsection
@section('content')
    <x-content-header pageName="{{__('general.products')}} - {{__('general.actions.new')}}"></x-content-header>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <!-- card -->
                <div class="col-md-1"></div>
                <!-- left column -->
                <div class="col-md-10">
                    <!-- jquery validation -->
                    <div class="card card-gray">
                        <div class="card-header">
                            <h3 class="card-title">{{__('general.products')}} -
                                <small>{{__('general.actions.new')}}</small>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <section class="signup-step-container">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wizard">
                                            <div class="wizard-inner">
                                                <div class="connecting-line"></div>
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li role="presentation" class="active">
                                                        <a href="#step1" data-toggle="tab" aria-controls="step1"
                                                           role="tab" aria-expanded="true"><span
                                                                class="round-tab">1 </span>
                                                            <i>{{__('general.steps.relations')}}</i></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <form class="login-box" role="form" id="quickForm"
                                                  action="{{route('products.store')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="tab-content" id="main_form">
                                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="name_en">{{__('general.attributes.name_en')}}</label>
                                                                <input type="text" name="name_en"
                                                                       class="form-control @error('name_en') is-invalid @enderror"
                                                                       id="name_en"
                                                                       placeholder="{{__('general.attributes.name_en')}}"
                                                                       value="{{old('name_en')}}">
                                                                @error('name_en')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="name_ar">{{__('general.attributes.name_ar')}}</label>
                                                                <input type="text" name="name_ar"
                                                                       class="form-control @error('name_ar') is-invalid @enderror"
                                                                       id="name_ar"
                                                                       placeholder="{{__('general.attributes.name_ar')}}"
                                                                       value="{{old('name_ar')}}">
                                                                @error('name_ar')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-12">
                                                                <label
                                                                    for="description_en">{{__('general.attributes.description_en')}}</label>
                                                                <textarea id="description_en" type="text"
                                                                          name="description_en"
                                                                          class="form-control @error('description_en') is-invalid @enderror"
                                                                          placeholder="{{__('general.attributes.description_en')}}">
                                                            {{old('description_en')}}
                                                            </textarea>
                                                                @error('description_en')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-12">
                                                                <label
                                                                    for="description_ar">{{__('general.attributes.description_ar')}}</label>
                                                                <textarea id="description_ar" type="text"
                                                                          name="description_ar"
                                                                          class="form-control @error('description_ar') is-invalid @enderror"
                                                                          placeholder="{{__('general.attributes.description_ar')}}">
                                                            {{old('description_ar')}}
                                                            </textarea>
                                                                @error('description_ar')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            
                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                        for="default_price">{{__('general.attributes.default_price')}}</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">$</span>
                                                                    </div>
                                                                    <input type="number" name="default_price"
                                                                           class="form-control @error('default_price') is-invalid @enderror"
                                                                           id="default_price"
                                                                           min="0"
                                                                           placeholder="{{__('general.attributes.default_price')}}"
                                                                           value="{{old('default_price') ?old('default_price'): 0 }}">
                                                                </div>
                                                                @error('default_price')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="image">{{__('general.attributes.image')}}</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file"
                                                                               class="custom-file-input @error('image') is-invalid @enderror"
                                                                               id="image" name="image">
                                                                        <label class="custom-file-label"
                                                                               for="image">{{__('general.choose_file')}}</label>
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">{{__('general.upload')}}</span>
                                                                    </div>
                                                                </div>
                                                                @error('image')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <x-btn type="primary"
                                                                name="{{__('general.btn.submit')}}">
                                                        </x-btn>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <div class="col-md-1"></div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('script')
    <!-- create -->
    <script src="{{ asset('assets/dist/js/steper.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            $('#description_en').summernote();
            $('#description_ar').summernote();

            $('#quickForm').validate({
                rules: {
                    name_en: {
                        required: true,
                        maxlength: 25
                    },
                    name_ar: {
                        required: true,
                        maxlength: 25
                    },
                    description_en: {
                        required: true
                    },
                    description_ar: {
                        required: true
                    },
                    company_id: {
                        required: true,
                    },
                    category_id: {
                        required: true
                    },
                    status_id: {
                        required: true
                    },
                    unit_id: {
                        required: true
                    },
                    tag_ids: {
                        required: true
                    },
                    image: {
                        required: true,
                        accept: "image/jpg,image/jpeg,image/png,image/gif"
                    },
                },
                messages: {
                    name_en: {
                        required: '{{__('messages.required' , ['attr' => __('general.attributes.name_en')])}}',
                        maxlength: '{{__('messages.maxlength', ['num' => 25 , 'attr' => __('general.attributes.name_en')])}}'
                    },
                    name_ar: {
                        required: '{{__('messages.required' , ['attr' => __('general.attributes.name_ar')])}}',
                        maxlength: '{{__('messages.maxlength', ['num' => 25 ,'attr' => __('general.attributes.name_ar')])}}'
                    },
                    description_en: {
                        required: '{{__('messages.required' , ['attr' => __('general.attributes.description_en')])}}',
                    },
                    description_ar: {
                        required: '{{__('messages.required' , ['attr' => __('general.attributes.description_ar')])}}',
                    },
                    company_id: {
                        required: '{{__('messages.required' , ['attr' => __('general.attributes.company_id')])}}',
                    },
                    category_id: {
                        required: '{{__('messages.required' , ['attr' => __('general.attributes.category_id')])}}',
                    },
                    status_id: {
                        required: '{{__('messages.required', ['attr' => __('general.attributes.status')])}}',
                    },
                    unit_id: {
                        required: '{{__('messages.required', ['attr' => __('general.attributes.unit_id')])}}',
                    },
                    tag_ids: {
                        required: '{{__('messages.required', ['attr' => __('general.attributes.tag_ids')])}}',
                    },
                    image: {
                        required: '{{__('messages.required', ['attr' => __('general.attributes.images')])}}',
                        accept: '{{__('messages.accept', ['values' => "jpg|jpeg|png|svg" ,'attr' => __('general.attributes.images')])}}'
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endpush
