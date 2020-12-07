@extends('back-end.layouts.app')

@section('title')
    {{$page_title}}
@endsection


@section('content')
    @component('back-end.layouts.navbar',['nav_title'=>$page_title])
    @endcomponent
    @component('back-end.shared.edit',['page_title'=>$page_title,'page_description'=>$page_description])
            @include('back-end.'.$folderName.'.form')
    @endcomponent
@endsection

