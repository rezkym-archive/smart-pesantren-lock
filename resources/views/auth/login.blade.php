@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Login basic -->
            <div class="card mb-0">
                <div class="card-body">
                    <a href="#" class="brand-logo">
                        <h2 class="brand-text text-primary ms-1"> Point of Sale </h2>
                    </a>

                    <h4 class="card-title mb-1">{{ __('locale.Welcome') }}! 👋</h4>

                    <x-alert />
                    
                    <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-1">
                            <label for="login-email" class="form-label">{{ __('locale.Email') }}</label>
                            <input type="text" class="form-control" id="login-email" name="email"
                                placeholder="mail@example.com" aria-describedby="login-email" tabindex="1" autofocus />
                        </div>

                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password"></label>
                                @if (Route::has('password.request'))
                                    <a href="{{ url('auth/forgot-password-basic') }}">
                                        <small>{{ __('locale.Forgot Password') }}</small>
                                    </a>
                                @endif

                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="login-password"
                                    name="password" tabindex="2" placeholder="...." aria-describedby="login-password" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" tabindex="4">{{ __('locale.Login') }}</button>
                    </form>

                    @if (Route::has('register'))
                        <p class="text-center mt-2">
                            <span>{{ __('locale.Dont have an account?') }}?</span>
                            <a href="{{ route('register') }}">
                                <span>{{ __('locale.Register here') }}</span>
                            </a>
                        </p>
                    @endif
                </div>
            </div>
            <!-- /Login basic -->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/pages/auth-login.js')) }}"></script>
@endsection
