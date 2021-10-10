<!--begin::Signup-->
<div class="login-form login-signup pt-11">
    <!--begin::Form-->
    <form class="form" action="{{ route('register') }}" method="POST" novalidate="novalidate"
        id="kt_login_signup_form">
        <!--- begin:Csrf -->
        @csrf
        <!--begin::Title-->
        <div class="text-center pb-8">
            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg"> Daftar</h2>
            {{-- <p class="text-muted font-weight-bold font-size-h4"> </p> --}}
        </div>
        <!--end::Title-->
        <!--begin::Form group-->
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text"
                placeholder="Nama Lengkap" name="name" autocomplete="on" autofocus/>
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group">
            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email"
                placeholder="Email" name="email" autocomplete="on" />
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
                <input type="checkbox" name="terms" value="yes" />
                <a href="#">
                    Syarat dan kondisi
                </a>
                <span></span>
            </label>
        </div>
        <!--end::Form group-->
        <!--begin::Form group-->
        <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3">
            <button type="submit" id="kt_login_signup_submit"
                class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button>
            <button type="button" id="kt_login_signup_cancel"
                class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>
        </div>
        <!--end::Form group-->
    </form>
    <!--end::Form-->
</div>
<!--end::Signup-->
