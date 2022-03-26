@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/news/css/news.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/css/app.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/daterange/daterangepicker.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
    <div class="bravo-news">
        @php
            $title_page = setting_item_with_lang("news_page_list_title");
            if(!empty($custom_title_page)){
                $title_page = $custom_title_page;
            }
        @endphp
        <div class="bg-img-hero text-center mb-5 mb-lg-8" @if($bg = setting_item("news_page_list_banner")) style="background-image: url({{get_file_url($bg,'full')}})" @endif >
            <div class="container space-top-xl-3 py-6 py-xl-0">
                <div class="row justify-content-center py-xl-4">
                    <div class="py-xl-10 py-5">
                        <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">{{ $title_page }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter mb-0">
                                <li class="breadcrumb-item font-size-14"><a class="text-white" href="{{ url("/") }}">{{ __("Home") }}</a></li>
                                <li class="breadcrumb-item custom-breadcrumb-item font-size-14 text-white active" aria-current="page">{{ $title_page }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-6 mb-lg-8 pt-lg-1">
            <div class="container mb-5 mb-lg-9 pb-lg-1">
                <div class="row">
                    <div class="col-lg-8 col-xl-9">
                        <div class="mb-5 pb-1">
                            @if($rows->count() > 0)
                                @foreach($rows as $row)
                                    @include('News::frontend.layouts.details.news-loop')
                                @endforeach
                            @else
                                <div class="alert alert-danger">
                                    {{__("Sorry, but nothing matched your search terms. Please try again with some different keywords.")}}
                                </div>
                            @endif
                        </div>
                        @if($rows->total() > 0)
                            <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">{{ __("Showing :from - :to of :total",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
                        @endif
                        {{$rows->appends(request()->query())->links()}}
                    </div>
                    <div class="col-lg-4 col-xl-3">
                        @include('News::frontend.layouts.details.news-sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

 
  