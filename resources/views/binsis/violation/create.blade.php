{{-- Extends layout --}}
@extends('layouts.app')

{{-- Content --}}
@section('content')

    {{-- Dashboard 1 --}}
    <div class="row justify-content-md-center"> {{-- justify-content-md-center --}}
        <div class="col-lg-12">
            @include('pages.binsis._new-violation')
        </div>
    </div>

@endsection


{{-- Scripts Section --}}
@section('scripts')
    
@endsection
