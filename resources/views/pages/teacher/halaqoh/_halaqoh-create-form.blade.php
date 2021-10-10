<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Setoran Halaqoh
        </h3>
    </div>
    <!--begin::Form-->
    <!--begin::validation errors-->


    <form class="form" action="{{ route('teacher.halaqoh.store') }}" method="POST">
        @csrf
        <div class="card-body">

            @if ($errors->any())
                <div class="form-group mb-8">
                    <x-metronic.validation-errors />
                </div>
            @elseif (session()->has('message'))
                <x-metronic.notice-style-message :type="session('message')['type']"
                    :message="session('message')['message']" />
            @endif

            <livewire:teacher.halaqoh.get-list-teacher-based-student-name />

            <livewire:surah-list />

            <div class="form-group row">
                <label class="col-form-label col-lg-3 col-sm-12">Ayat</label>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-4">
                            <input type="number" name="ayat_start" value="{{ old('ayat_start') }}"
                                class="form-control form-control-solid {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                                placeholder="Awal" />
                            @error('ayat_start')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <input type="number" name="ayat_end" value="{{ old('ayat_end') }}"
                                class="form-control form-control-solid {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                                placeholder="Akhir" />
                            @error('ayat_end')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>




            <div class="form-group row">
                <label class="ml-5"> Tingakat Kelancaran</label>
                <div class="col-5 col-12">
                    <div>
                        <div class="radio-inline">
                            <label class="radio">
                                <input type="radio" name="fluency_level" value="50" />
                                <span></span>
                                Cukup
                            </label>
                            <label class="radio">
                                <input type="radio" checked="checked" name="fluency_level" value="75" />
                                <span></span>
                                Lancar
                            </label>
                            <label class="radio">
                                <input type="radio" name="fluency_level" value="100" />
                                <span></span>
                                Sangat Lancar
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleTextarea"> Komentar</label>
                <textarea class="form-control form-control-solid {{ $errors->has('comment') ? ' is-invalid' : '' }}"
                    name="comment" rows="3">{{ old('comment') }}</textarea>
                @error('comment')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2"> Setor </button>
            <button type="reset" class="btn btn-secondary"> Ulangi </button>
        </div>
    </form>


</div>
