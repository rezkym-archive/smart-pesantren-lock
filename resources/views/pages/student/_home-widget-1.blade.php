{{-- Mixed Widget 1 --}}

<div class="card card-custom bg-gray-100 {{ @$class }}">
    {{-- Header --}}
    <div class="card-header border-0 bg-danger py-5">
        <h3 class="card-title font-weight-bolder text-white"> Hi, {{ explode(" ", auth()->user()->name)[0] }} </h3>
    </div>
    {{-- Body --}}
    <div class="card-body p-0 position-relative overflow-hidden">
        {{-- Chart --}}
        <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom bg-danger" style="height: 200px"></div>

        {{-- Stats --}}
        <div class="card-spacer mt-n25">
            {{-- Row --}}
            <div class="row m-0">
                <div class="col-md-6 bg-light-primary px-6 py-8 rounded-xl offset-md-3">
                    {{ Metronic::getSVG("media/svg/icons/Communication/Add-user.svg", "svg-icon-3x svg-icon-primary d-block my-2") }}
                    <a href="{{ route('student.mutabaah.create') }}" class="text-primary font-weight-bold font-size-h6 mt-2">
                        Mutabaah Yaumiyah
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>