@extends('front-end.layouts.app')
@section('title','Login')
@section('content')

    <div class="container" style="margin-top: 80px; margin-bottom: -60px">
        <div class="row">
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="card card-register">
                    <h3 class="title mx-auto">Login</h3>
                    <div class="social-line text-center">
{{--                        <a href="#pablo" class="btn btn-neutral btn-facebook btn-just-icon mt-0">--}}
{{--                            <i class="fa fa-facebook-square"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#pablo" class="btn btn-neutral btn-google btn-just-icon mt-0">--}}
{{--                            <i class="fa fa-google-plus"></i>--}}
{{--                        </a>--}}
{{--                        <a href="#pablo" class="btn btn-neutral btn-twitter btn-just-icon mt-0">--}}
{{--                            <i class="fa fa-twitter"></i>--}}
{{--                        </a>--}}
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label>Email</label>
                        <div class="input-group form-group-no-border">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="nc-icon nc-email-85"></i>
                                </span>
                            </div>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="forgot">
                            <input  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label  for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button class="btn btn-danger btn-block btn-round" type="submit">Login</button>
                    </form>
                    @if (Route::has('password.request'))
                        <div class="forgot">
                            <a href="{{ route('password.request') }}" class="btn btn-link btn-danger">Forgot password?</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

