<div>

    <div class="form-group" wire:ignore>
        <label> Nama </label>
        <select class="form-control form-control-solid {{ $errors->has('student') ? ' is-invalid' : '' }}" name="student"
            id="get-student-name">
            <option value selected> Nama Santri </option>

            @foreach ($data as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        @error('student')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror

    </div>


</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#get-student-name').select2();
            $('#get-student-name').on('change', function(e) {
                var data = $('#get-student-name').select2("val");
                @this.set('ottPlatform', data);
            });
        });
    </script>
@endpush
