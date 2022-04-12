@extends('layouts.app')

@section('content')
<div class="mobile-background">
    <div class="mobile-container">
        <div style="width: 30%" class="mobile-form-container">
{{--            <div class="mt-5 card" style="width: 80%; margin: auto; height: 70vh">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}
                <h1 style="text-align: center; margin-top: 30px">Login</h1>


                <div style="min-height: 60vh" class="card-body">
                    <form class="mt-5" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3" style="display: flex;flex-direction: column;justify-content: center;align-items: center">
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>--}}
                            <div>
                                <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3" style="display: flex;flex-direction: column;justify-content: center;align-items: center">
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

                            <div >
                                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-md-6" style="margin-top: 20px">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="margin-left: 30px; margin-top: 20px" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <br>
                                <br>
                            @if (Route::has('password.request'))
                                    <a style="margin-left: 62px; margin-top: 30px" class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4">
                            <a href="/user" class="btn btn-primary">Continue as guest</a>
                        </div>
                    </form>
                </div>
{{--            </div>--}}
        </div>
    </div>

</div>
@endsection
