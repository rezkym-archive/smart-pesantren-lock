<x-guest-layout>

    <!--begin::Signin-->
    <div class="login-form login-signin py-11">

        <!--begin::validation errors-->
        <x-metronic.validation-errors />



        <!--begin::Form-->
        <form class="form" action="{{ route('login') }}" method="POST" novalidate="novalidate"
            id="kt_login_signin_form">
            <!--- begin:Csrf -->
            @csrf

            <!--begin::Title-->
            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg"> Masuk</h2>
                @if (Route::has('register'))
                    <span class="text-muted font-weight-bold font-size-h4">atau
                        <a href="" class="text-primary font-weight-bolder" id="kt_login_signup"> Buat Akun</a>
                    </span>
                @endif
            </div>
            <!--end::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark"> Email</label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="email"
                    autocomplete="off" />
            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5"> Kata sandi</label>
                    @if (Route::has('password.request'))
                        <a href="javascript:;"
                            class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5"
                            id="kt_login_forgot">
                            Lupa kata sandi ?
                        </a>
                    @endif
                </div>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password"
                    name="password" autocomplete="off" />
            </div>
            <!--end::Form group-->
            <!--begin::Action-->
            <div class="text-center pt-2">
                <button id="kt_login_signin_submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3">
                    Masuk
                </button>
            </div>
            <!--end::Action-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signin-->

    <!--begin::Signup-->
    <div class="login-form login-signup pt-11">
        <!--begin::Form-->
        <form class="form" novalidate="novalidate" id="kt_login_signup_form">
            <!--begin::Title-->
            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg"> Daftar</h2>
                {{-- <p class="text-muted font-weight-bold font-size-h4"> </p> --}}
            </div>
            <!--end::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text"
                    placeholder="Nama Lengkap" name="fullname" autocomplete="off" />
            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email"
                    placeholder="Email" name="email" autocomplete="off" />
            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password"
                    placeholder="Kata sandi" name="password" autocomplete="off" />
            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group">
                <label class="checkbox mb-0">
                    <input type="checkbox" name="agree" />
                    <a href="#">
                        Syarat dan kondisi
                    </a>
                    <span></span>
                </label>
            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="button" id="kt_login_signup_submit"
                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
                <button type="button" id="kt_login_signup_cancel"
                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>
            </div>
            <!--end::Form group-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Signup-->

    <!--begin::Forgot-->
    <div class="login-form login-forgot pt-11">
        <!--begin::Form-->
        <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
            <!--begin::Title-->
            <div class="text-center pb-8">
                <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg"> Lupa kata sandi ?</h2>
                <p class="text-muted font-weight-bold font-size-h4"> Masukkan email kamu.</p>
            </div>
            <!--end::Title-->
            <!--begin::Form group-->
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email"
                    placeholder="Email" name="email" autocomplete="off" />
            </div>
            <!--end::Form group-->
            <!--begin::Form group-->
            <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
                <button type="button" id="kt_login_forgot_submit"
                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
                <button type="button" id="kt_login_forgot_cancel"
                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>
            </div>
            <!--end::Form group-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Forgot-->


    {{-- Styles Section --}}
    <x-slot name="styles">
        <link href="{{ asset('css/pages/login/login-2.css') }}" rel="stylesheet" type="text/css" />
    </x-slot>

    {{-- Scripts Section --}}
    <x-slot name="scripts">
        <script src="{{ asset('js/pages/custom/login/login-general.js') }}"></script>
    </x-slot>


</x-guest-layout>
