<div class="d-inline col-3">
    @can('edit '.$route)
        <a href="{{route($route.'.edit', $id)}}"><i
                class="fas fa-edit"></i></a>
    @endcan
</div>
