@if ($errors->any() && session()->has('alert-type'))
    <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
        <div class="alert-body">
            @if (count($errors->all()) >= 2)
                <ul class="mt-auto">
                    @foreach ($errors->all() as $error)
                        @if ($error == '')
                        @endif
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @else
                <div class="alert-text text-{{ session()->get('alert-type') }}"> {{ $errors->first() }} </div>
            @endif
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
