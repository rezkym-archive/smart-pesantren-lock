{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}

    <div class="row offset-lg-3"> {{-- justify-content-md-center --}}
        <div class="col-lg-7 col-xxl-4">
            @include('pages.student._home-widget-1', ['class' => 'card-stretch gutter-b text-center'])
        </div>

        <div class="col-lg-7 col-xxl-4">
            @include('pages.student._home-widget-2', ['class' => 'card-stretch gutter-b text-center'])
        </div>

    </div>


@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
