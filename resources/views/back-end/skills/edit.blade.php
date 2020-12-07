@extends('back-end.layouts.app')

@section('title')
    {{$page_title}}
@endsection


@section('content')
    @component('back-end.layouts.navbar',['nav_title'=>$page_title])
    @endcomponent
    @component('back-end.shared.edit',['page_title'=>$page_title,'page_description'=>$page_description])

        <form action="{{route($routeName.'.update',$row)}}" method="post">
            @method('PATCH')
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Update {{$moduleName}}</button>
            <div class="clearfix"></div>
        </form>

    @endcomponent
@endsection

