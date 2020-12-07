@extends('front-end.layouts.app')
@section('title','Register')
@section('content')
    <div class="container" style="margin-top: 80px; margin-bottom: -60px">
        <div class="row">
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="card card-register" >
                    <h3 class="title mx-auto">Register</h3>
                    <div class="social-line text-center">

                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <label>Name</label>
                        <div class="input-group form-group-no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="nc-icon nc-single-02"></i>
                                </span>
                            </div>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label>Email</label>
                        <div class="input-group form-group-no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="nc-icon nc-email-85"></i>
                                </span>
                            </div>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label for="password-confirm">Password</label>
                        <div class="input-group form-group-no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="nc-icon nc-key-25"></i>
                                </span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" autocomplete="new-password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <label>Password</label>
                        <div class="input-group form-group-no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="nc-icon nc-key-25"></i>
                                </span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password_confirmation"  autocomplete="new-password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-danger btn-block btn-round" type="submit">Register</button>
                    </form>
                    <div class="forgot">
                        <a href="{{ route('login') }}" class="btn btn-link btn-danger">Already Registered ?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
