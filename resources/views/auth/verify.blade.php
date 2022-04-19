@extends('layouts.app')

@section('content')
<div class="mobile-background">
    <div class="mobile-container">
        <div style="width: 30%" class="mobile-form-container">

            <h1 style="text-align: center; margin-top: 30px">{{ __('Verify Your Email Address') }}</h1>

                <div style="min-height: 60vh" class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 mt-2 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
