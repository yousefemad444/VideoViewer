@extends('front-end.layouts.app')
@section('title',$video->name)

@section('meta_keywords',$video->meta_keywords)
@section('meta_description',$video->meta_desc)

@section('content')
    <div class="section section-buttons">
        <div class="container">
            <div class="title">
                <h1>{{$video->name}}</h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @php $url=getYoutubeId($video->youtube) @endphp
                    @isset($url)
                        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/{{$url}}" frameborder="0"
                                allowfullscreen></iframe>
                        <br>
                    @endisset
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 d-flex">
                        <p class="mr-2">
                            <i class="nc-icon nc-box mr-1"></i> :{{$video->user->name}}
                        </p>
                        <p class="mr-2">
                            <i class="nc-icon nc-calendar-60"></i> :{{$video->created_at}}
                        </p>
                        <p class="mr-2">
                            <i class="nc-icon nc-box mr-1"></i> :<a
                                href="{{route('front.category',$video->category->id)}}">{{$video->category->name}}</a>
                        </p>
                    </div>
                    <p>
                        {{$video->desc}}
                    </p>

                    <p>
                        @foreach($video->tags as $tag)
                            <a href="{{route('front.tags',$tag->id)}}"> <span
                                    class="badge badge-primary">{{$tag->name}}</span></a>
                        @endforeach
                    </p>
                    <p>
                        @foreach($video->skills as $skill)
                            <a href="{{route('front.skill',$skill->id)}}"><span
                                    class="badge badge-info">{{$skill->name}}</span></a>
                        @endforeach
                    </p>
                </div>
            </div>
            <br><br>
            @include('front-end.video.comments')
            @include('front-end.video.create-comment')

        </div>
    </div>
@endsection
