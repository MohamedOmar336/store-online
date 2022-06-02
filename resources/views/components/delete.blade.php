<div class="d-inline col-3">
    @can('delete '.$route)
        <a class="text-danger" id="delete-form{{$id}}">
            <i id="statusIcon{{$id}}" class="fas fa-trash"></i>
        </a>
    @endcan
</div>
@push('script')
    <script>
        $('#delete-form{{$id}}').on('click',function(){
            Swal.fire({
                title: '{{__('messages.update_status')}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('general.btn.submit')}}',
                cancelButtonText: '{{__('general.btn.cancel')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'{{route($route.'.destroy', $id)}}',
                        type:'DELETE',
                        data:{'id':'{{$id}}' ,"_token": "{{ csrf_token() }}"},
                        success:function (response){
                            $('#row{{$id}}').remove();

                            var bool = '{!!session()->has('success')!!}'?'{!!session()->has('success')!!}':0;
                            if (bool === '1') {
                                if('{{app()->getLocale()}}' == 'ar'){
                                    toastr.options.rtl = true;
                                    toastr.options.positionClass = 'toast-top-left';
                                }
                                toastr.success('{!! session('success') !!}')
                            }

                         }
                    })
                }
            })


        });

    </script>
@endpush
