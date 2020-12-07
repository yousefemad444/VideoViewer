@extends('back-end.layouts.app')
@section('title')
    Home Page
@endsection


@section('content')
    @component('back-end.layouts.navbar',['nav_title'=>"Home Page"])
    @endcomponent

    @include('back-end.home-sections.statics')
    @include('back-end.home-sections.latest-comments')
@endsection

@push('js')
@endpush
