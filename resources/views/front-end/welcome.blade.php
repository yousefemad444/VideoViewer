@extends('front-end.layouts.app')
@section('title','Home')
@section('content')
    @include('front-end.homepage-sections.home-header')
    @include('front-end.homepage-sections.videos')
    @include('front-end.homepage-sections.statics')
   @include('front-end.homepage-sections.contact-us')
@endsection
