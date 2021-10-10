{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')

    {{-- If has Role Admin --}}
    @role('admin')
    {{-- Dashboard 1 --}}

    <div class="row"> {{-- justify-content-md-center --}}
        <div class="col-lg-6 col-xxl-4">
            @include('pages.widgets._widget-1', ['class' => 'card-stretch gutter-b text-center'])
        </div>

        <div class="col-lg-6 order-2 order-xxl-1">
            @include('pages.widgets._widget-6', ['class' => 'card-stretch gutter-b'])
        </div>

        {{-- <div class="col-lg-6 col-xxl-4">
                @include('pages.widgets._widget-2', ['class' => 'card-stretch gutter-b'])
            </div>

            <div class="col-lg-6 col-xxl-4">
                @include('pages.widgets._widget-3', ['class' => 'card-stretch card-stretch-half gutter-b'])
                @include('pages.widgets._widget-4', ['class' => 'card-stretch card-stretch-half gutter-b'])
            </div>

            <div class="col-lg-6 col-xxl-4 order-1 order-xxl-1">
                @include('pages.widgets._widget-5', ['class' => 'card-stretch gutter-b'])
            </div>

            <div class="col-xxl-8 order-2 order-xxl-1">
                @include('pages.widgets._widget-6', ['class' => 'card-stretch gutter-b'])
            </div>

            <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
                @include('pages.widgets._widget-7', ['class' => 'card-stretch gutter-b'])
            </div>

            <div class="col-lg-6 col-xxl-4 order-1 order-xxl-2">
                @include('pages.widgets._widget-8', ['class' => 'card-stretch gutter-b'])
            </div>

            <div class="col-lg-12 col-xxl-4 order-1 order-xxl-2">
                @include('pages.widgets._widget-9', ['class' => 'card-stretch gutter-b'])
            </div> --}}
        </div>
    @else
        <div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
            <div class="alert-icon"><i class="flaticon-warning"></i></div>
            <div class="alert-text"> {{ abort(403, 'AKSES TIDAK SETUJUI') }} </div>
            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    @endrole



@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
