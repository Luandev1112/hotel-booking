@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/flight/css/flight.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
@endsection
@section('content')
    <div class="bravo_search_flight">
        <div class="bg-gray-33 py-1">
            <div class="container">
                <div class="border-0">
                    <div class="card-body">
                        @includeIf('Flight::frontend.layouts.search.form-search')
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
            @include('Flight::frontend.layouts.search.list-item')
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/flight/js/flight.js?_ver='.config('app.version')) }}"></script>
    <script>
        $(document).ready(function () {
            $.BCoreModal.init('[data-modal-target]');
        })
    </script>
@endsection