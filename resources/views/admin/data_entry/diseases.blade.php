@extends('layouts.backend.app')
@section('title','Madicine')
@push('topcss')
@endpush
@push('css')
@endpush
@push('topjs')
@endpush
@section('content')
    <div class="container">
        <diseases-component></diseases-component>
    </div>
@endsection
@push('js')
@endpush
