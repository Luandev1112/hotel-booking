@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/boat/css/boat.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
@endsection
@section('content')
    <div class="bravo_search_boat">
        <div class="container">
            @include('Boat::frontend.layouts.search.list-item')
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/boat/js/boat.js?_ver='.config('app.version')) }}"></script>
@endsection
