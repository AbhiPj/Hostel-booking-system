@extends('layouts.app')

@section('content')
<div class="mobile-background">
    <div class="mobile-container">

        <div style="width: 30%" class="mobile-form-container">
            <h1 style="text-align: center; margin-top: 30px">Reset Password</h1>
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Reset Password') }}</div>--}}

                <div style="min-height: 60vh" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="mt-5" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3" style="display: flex;flex-direction: column;justify-content: center;align-items: center">

                            <div>
                                <input placeholder="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div  >
                            <div class="row mt-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
