

<div>

    <div class="form-group" wire:ignore>
        <label> Surah </label>
        <select class="form-control form-control-solid {{ $errors->has('surah') ? ' is-invalid' : '' }}" name="surah"
            id="surah-list">
            <option value selected> Nama Surah </option>
            @foreach ($surah as $item)
                    <option value="{{ $item->id }}">{{ $item->ayat_name }}</option>
                @endforeach
        </select>
        @error('surah')
            <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#surah-list').select2();
            $('#surah-list').on('change', function(e) {
                var data = $('#surah-list').select2("val");
                @this.set('ottPlatform', data);
            });
        });
    </script>
@endpush
