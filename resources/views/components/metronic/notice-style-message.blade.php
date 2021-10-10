@if (session()->has('message'))
    <div class="alert alert-custom alert-notice alert-light-{{ $type }} fade show" role="alert">
        <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
        <div class="alert-text text-dark"> {{ $message }} </div>

        <div class="alert-close ml-auto">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
