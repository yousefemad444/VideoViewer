@extends('back-end.layouts.app')

@section('title')
    {{$page_title}}
@endsection


@section('content')
    @component('back-end.layouts.navbar',['nav_title'=>$page_title])
    @endcomponent

    @component('back-end.shared.create',['page_title'=>$page_title,'page_description'=>$page_description])
        <form action="{{route($routeName.'.store')}}" method="post">
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Add {{$moduleName}}</button>
            <div class="clearfix"></div>
        </form>
    @endcomponent
@endsection

