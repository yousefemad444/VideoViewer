@extends('back-end.layouts.app')

@section('title')
    {{$page_title}}
@endsection


@section('content')
    @component('back-end.layouts.navbar',['nav_title'=>$page_title])
    @endcomponent

    @component('back-end.shared.edit',['page_title'=>$page_title,'page_description'=>$page_description])

        <form action="{{route($routeName.'.update',$row)}}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @include('back-end.'.$folderName.'.form')
            <button type="submit" class="btn btn-primary pull-right">Update {{$moduleName}}</button>
            <div class="clearfix"></div>
        </form>
        @slot('md4')
            @php $url=getYoutubeId($row->youtube) @endphp
            @isset($url)
            <iframe width="250"  src="https://www.youtube.com/embed/{{$url}}" frameborder="0" allowfullscreen></iframe>
                <br>
            @endisset
            <img src="{{asset('images/videos/'.$row->image)}}" width="250">
        @endslot
    @endcomponent


    @component('back-end.shared.edit',['page_title'=>'Comments','page_description'=>'here We Can Control Comments'])
        @include('back-end.comments.index')
        @slot('md4')
            @include('back-end.comments.create')
        @endslot
    @endcomponent



@endsection

