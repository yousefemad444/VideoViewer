@extends('front-end.layouts.app')
@section('title',$category->name)

@section('meta_keywords',$category->meta_keywords)
@section('meta_description',$category->meta_desc)

@section('content')
<div class="section section-buttons">
    <div class="container">
        <div class="title">
            <h2>{{$category->name}}</h2>
        </div>
        @include('front-end.shared.video-row')
    </div>
</div>
@endsection
