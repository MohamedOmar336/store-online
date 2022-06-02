<div>
    @can('add '.$route)
        @if(!$flag)
            <a href="{{__(route($route.'.create'))}}" class="btn btn-outline-info">
                <i class="fa fa-plus"></i>
                {{__('general.btn.new')}}
            </a>
        @else
            <a href="{{route('paymentTerms.create')}}"
               class="nav-link @if(\Route::is('paymentTerms.create')) active @endif">
                <i class="far fa-circle nav-icon text-warning"></i>
                <p>{{__('general.side.new')}}</p>
            </a>
        @endif
    @endcan
</div>
