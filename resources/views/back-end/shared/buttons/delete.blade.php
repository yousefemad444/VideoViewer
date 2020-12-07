<form action="{{route($routeName.'.destroy',$row)}}" method="post" id="delete-form" style="display: inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-link btn-sm">
        <i class="material-icons">close</i>
        <div class="ripple-container"></div></button>
</form>
