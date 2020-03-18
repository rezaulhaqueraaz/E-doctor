@extends('layouts.backend.app')
@section('title','Madicine')
@push('topcss')
@endpush
@push('css')
    <link href="{{asset('backend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend/assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
@endpush
@push('topjs')
@endpush
@section('content')
    <div class="container">
       <madicine-component></madicine-component>
    </div>
@endsection
@push('js')
    <script>
        jQuery(document).ready(function () {
            // Select2
            $(".select2").select2();
        });
    </script>
    <script src="{{asset('backend/assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
@endpush
