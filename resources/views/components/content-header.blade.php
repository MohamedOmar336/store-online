<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $pageName?$pageName:__('general.siteName') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if($pageName)
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('general.home')}}</a></li>
                        <li class="breadcrumb-item active">{{$pageName}}</li>
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
