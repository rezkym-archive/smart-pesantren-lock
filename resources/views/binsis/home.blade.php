{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')

    <div class="row"> {{-- justify-content-md-center --}}
        <div class="col-lg-6 col-xxl-4">
            @include('pages.binsis._home-widget-1', ['class' => 'card-stretch gutter-b text-center'])
        </div>
    </div>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
