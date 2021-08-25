@if ($errors->any())
    <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        @if (count($errors->all()) >= 2)
            <ul class="mt-3 mr-6 text-dark">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            <div class="alert-text text-dark"> {{ $errors->first() }} </div>
        @endif


        {{-- {{ dd($errors->all()) }} --}}

        <div class="alert-close ml-auto">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="ki ki-close"></i></span>
            </button>
        </div>
    </div>
@endif
