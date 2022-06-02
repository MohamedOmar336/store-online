<div class="d-inline col-3">
    <a class="text-danger" id="update-form{{$id}}">
        <i id="statusIcon{{$id}}"  class="fas @if($status) fa-check-circle text-success @else fa-times-circle text-danger @endif fa-2x cursor-pointer"></i>
    </a>
</div>
@push('script')
    <script>
        $('#update-form{{$id}}').on('click',function(){
            Swal.fire({
                title: '{{__('messages.update_status')}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{__('general.btn.update')}}',
                cancelButtonText: '{{__('general.btn.cancel')}}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'{{route($route.'.changeStatus')}}',
                        type:'POST',
                        data:{'id':'{{$id}}' , 'status':'{{$status}}' ,"_token": "{{ csrf_token() }}"},
                        success:function (response){


                            if(response.data === true){
                                $('#statusIcon'+{{$id}}).removeClass('fa-times-circle text-danger');
                                $('#statusIcon'+{{$id}}).addClass('fa-check-circle text-success ' );
                            }else if(response.data === false) {
                                $('#statusIcon'+{{$id}}).removeClass('fa-check-circle text-success ' );
                                $('#statusIcon'+{{$id}}).addClass('fa-times-circle text-danger');
                            }
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
