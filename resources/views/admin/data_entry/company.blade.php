@extends('layouts.backend.app')
@section('title','Medicine Company')
@push('topcss')
@endpush

@push('css')

@endpush
@push('topjs')
@endpush
@section('content')
    <div class="container">
        <company-component></company-component>
    </div>
@endsection
@push('js')
@endpush
