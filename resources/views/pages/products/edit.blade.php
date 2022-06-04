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
                                <small>{{__('general.actions.edit')}}</small>
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
                                                    <li role="presentation" class="disabled">
                                                        <a href="#step2" data-toggle="tab" aria-controls="step2"
                                                           role="tab" aria-expanded="false"><span
                                                                class="round-tab">2</span>
                                                            <i>{{__('general.steps.definitions')}}</i></a>
                                                    </li>
                                                    <li role="presentation" class="disabled">
                                                        <a href="#step3" data-toggle="tab" aria-controls="step3"
                                                           role="tab"><span class="round-tab">3</span>
                                                            <i>{{__('general.steps.images')}}</i></a>
                                                    </li>
                                                    <li role="presentation" class="disabled">
                                                        <a href="#step4" data-toggle="tab" aria-controls="step4"
                                                           role="tab"><span class="round-tab">4</span>
                                                            <i>{{__('general.steps.variations')}}</i></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <form class="login-box" role="form" id="quickForm"
                                                  action="{{route('products.update', $record->id)}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="tab-content" id="main_form">
                                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="company_id">{{__('general.attributes.company_id')}}</label>
                                                                <select
                                                                    class="form-control select2 @error('company_id') is-invalid @enderror"
                                                                    style="width: 100%;" name="company_id"
                                                                    id="company_id">
                                                                    <option selected disabled
                                                                            value="">{{__('general.select.company')}}</option>
                                                                    @foreach($companies as $company)
                                                                        <option
                                                                            value="{{$company->id}}">{{$company->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('company_id')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="category_id">{{__('general.attributes.category_id')}}</label>
                                                                <select
                                                                    class="form-control select2 @error('category_id') is-invalid @enderror"
                                                                    style="width: 100%;" name="category_id"
                                                                    id="category_id">
                                                                    <option selected disabled
                                                                            value="">{{__('general.select.category')}}</option>
                                                                    @foreach($categories as $category)
                                                                        <option
                                                                            value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline pull-right">
                                                            <li>
                                                                <button type="button" class="default-btn prev-step">
                                                                    {{__('general.btn.back')}}
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="default-btn next-step">
                                                                    {{__('general.btn.continue')}}
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="step2">
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="name_en">{{__('general.attributes.name_en')}}</label>
                                                                <input type="text" name="name_en"
                                                                       class="form-control @error('name_en') is-invalid @enderror"
                                                                       id="name_en"
                                                                       placeholder="{{__('general.attributes.name_en')}}"
                                                                       value="{{old('name_en')?old('name_en'):$record->name_en}}">
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
                                                                       value="{{old('name_ar')?old('name_ar'):$record->name_ar}}">
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
                                                            {{old('description_en')?old('description_en'):$record->description_en}}
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
                                                            {{old('description_ar')?old('description_ar'):$record->description_ar}}
                                                            </textarea>
                                                                @error('description_ar')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline pull-right">
                                                            <li>
                                                                <button type="button"
                                                                        class="default-btn next-step">{{__('general.btn.continue')}}</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="step3">
                                                        <div class="row">
                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="unit_id">{{__('general.attributes.unit_id')}}</label>
                                                                <select
                                                                    class="form-control select2 @error('unit_id') is-invalid @enderror"
                                                                    style="width: 100%;" name="unit_id" id="unit_id">
                                                                    <option selected disabled
                                                                            value="">{{__('general.select.unit')}}</option>
                                                                    @foreach($units as $unit)
                                                                        <option
                                                                            value="{{$unit->id}}">{{$unit->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('unit_id')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="tag_ids">{{__('general.attributes.tag_ids')}}</label>
                                                                <select
                                                                    class="form-control select2 @error('tag_ids.*') is-invalid @enderror"
                                                                    style="width: 100%;" name="tag_ids[]" id="tag_ids"
                                                                    multiple>
                                                                    @foreach($tags as $tag)
                                                                        <option
                                                                            value="{{$tag->id}}">{{$tag->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('tag_ids.*')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="status_id">{{__('general.attributes.status_id')}}</label>
                                                                <select
                                                                    class="form-control select2 @error('status_id') is-invalid @enderror"
                                                                    style="width: 100%;" name="status_id"
                                                                    id="status_id">
                                                                    <option selected disabled
                                                                            value="">{{__('general.select.status')}}</option>
                                                                    @foreach($statuses as $status)
                                                                        <option
                                                                            value="{{$status->id}}">{{$status->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('status_id')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <ul class="list-inline pull-right">
                                                            <li>
                                                                <button type="button" class="default-btn prev-step">
                                                                    {{__('general.btn.back')}}
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="default-btn next-step">
                                                                    {{__('general.btn.continue')}}
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="tab-pane" role="tabpanel" id="step4">
                                                        <div class="row">
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

                                                            <div class="form-group col-md-6 col-12">
                                                                <label
                                                                    for="image">{{__('general.attributes.images')}}</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" multiple
                                                                               class="custom-file-input @error('images.*') is-invalid @enderror"
                                                                               id="images" name="images[]">
                                                                        <label class="custom-file-label"
                                                                               for="image">{{__('general.choose_files')}}</label>
                                                                    </div>
                                                                    <div class="input-group-append">
                                                                        <span
                                                                            class="input-group-text">{{__('general.upload')}}</span>
                                                                    </div>
                                                                </div>
                                                                @error('images.*')
                                                                <div class="invalid-feedback">
                                                                    {{$message}}
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <ul class="list-inline pull-right">
                                                            <li>
                                                                <button type="button" class="default-btn prev-step">
                                                                    {{__('general.btn.back')}}
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <x-btn type="primary"
                                                                       name="{{__('general.btn.submit')}}">
                                                                </x-btn>
                                                            </li>
                                                        </ul>
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
                        required: false,
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
