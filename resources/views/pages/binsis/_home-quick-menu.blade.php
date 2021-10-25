{{-- Mixed Widget 1 --}}

<div class="card card-custom bg-gray-100 {{ @$class }}">
    {{-- Header --}}
    <div class="card-header border-0 bg-danger py-5">
        <h3 class="card-title font-weight-bolder text-white"> Assalamualaikum </h3>
    </div>
    {{-- Body --}}
    <div class="card-body p-0 position-relative overflow-hidden">
        {{-- Chart --}}
        <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>

        {{-- Stats --}}
        <div class="card-spacer mt-n25">
            {{-- Row --}}
            <div class="row m-0">
                <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                    {{ Metronic::getSVG('media/svg/icons/Media/Equalizer.svg', 'svg-icon-3x svg-icon-warning d-block my-2') }}
                    <a href="#" class="text-warning font-weight-bold font-size-h6">
                        Prestasi Baru
                    </a>
                </div>
                @if (Route::has('binsis.violation.create'))
                    <div class="col bg-light-primary px-6 py-8 rounded-xl mb-7">
                        {{ Metronic::getSVG('media/svg/icons/Communication/Add-user.svg', 'svg-icon-3x svg-icon-primary d-block my-2') }}
                        <a href="{{ route('binsis.violation.create') }}"
                            class="text-primary font-weight-bold font-size-h6 mt-2">
                            Pelanggaran Baru
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
