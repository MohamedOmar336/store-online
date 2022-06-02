<hr class="w-100">
<div class="col-12 h3">{{__('general.seo')}}</div>
<div class="form-group col-md-6 col-12">
    <label
        for="title_en">{{__('general.attributes.title_en')}}</label>
    <input type="text" name="title_en"
           class="form-control @error('title_en') is-invalid @enderror"
           id="title_en"
           placeholder="{{__('general.attributes.title_en')}}"
           value="{{old('title_en')?old('title_en'):$title_en}}">
    @error('title_en')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-group col-md-6 col-12">
    <label
        for="title_ar">{{__('general.attributes.title_ar')}}</label>
    <input type="text" name="title_ar"
           class="form-control @error('title_ar') is-invalid @enderror"
           id="title_ar"
           placeholder="{{__('general.attributes.title_ar')}}"
           value="{{old('title_ar')?old('title_ar'):$title_ar}}">
    @error('title_ar')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-group col-12">
    <label
        for="desc_en">{{__('general.attributes.description_en')}}</label>
    <textarea id="desc_en"
              name="desc_en"
              class="form-control @error('desc_en') is-invalid @enderror"
              placeholder="{{__('general.attributes.description_en')}}">
            {{old('desc_en')?old('desc_en'):$desc_en}}
        </textarea>
    @error('desc_en')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-group col-12">
    <label
        for="desc_ar">{{__('general.attributes.description_ar')}}</label>
    <textarea id="desc_ar" type="text"
              name="desc_ar"
              class="form-control @error('desc_ar') is-invalid @enderror"
              placeholder="{{__('general.attributes.description_ar')}}">
            {{old('desc_ar')?old('desc_ar'):$desc_ar}}
        </textarea>
    @error('desc_ar')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
@push('script')
    <script>
        $(function () {
            $('#desc_en').summernote();
            $('#desc_ar').summernote();

            $('#name_ar').on('keyup', function () {
                $('#title_ar').val($('#name_ar').val())
            });
            $('#name_en').on('keyup', function () {
                $('#title_en').val($('#name_en').val())
            });
            // $('#description_ar').on('keyup', function () {
            //     $('#desc_ar').html($('#description_ar').code());
            // });
            // $('.card-block').on('keyup', function () {
            //     $('#desc_en').val($('.card-block').val())
            // });
        });

    </script>
@endpush
