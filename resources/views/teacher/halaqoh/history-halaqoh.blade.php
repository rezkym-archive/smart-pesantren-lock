{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row justify-content-md-center"> {{-- justify-content-md-center --}}
        <div class="col-lg-12">
            @include('pages.teacher.halaqoh._halaqoh-history');
        </div>
    </div>
@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    {{-- <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js?v=7.2.8') }}"></script>
    {{ $dataTable->scripts() }}
@endsection

@push('scripts')

@endpush
