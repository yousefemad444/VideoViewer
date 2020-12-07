@extends('front-end.layouts.app')

@section('content')
<div class="section section-buttons">
    <div class="container">
        <div class="title">
            <h2>Latest Videos</h2>
            @if (request()->has('search') && request()->search !='')
                <p class="mt-3">
                    you are search on <strong>{{request()->search}}</strong> | <a href="{{route('home')}}">Reset</a>
                </p>

            @endif
        </div>
        @include('front-end.shared.video-row')
    </div>
</div>
@endsection
