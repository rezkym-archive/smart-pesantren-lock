{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row justify-content-md-center"> {{-- justify-content-md-center --}}
        <div class="col-lg-12">
            @include('pages.student.mutabaah._mutabaah-create-form', ['class' => ''])
        </div>
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
@endsection
