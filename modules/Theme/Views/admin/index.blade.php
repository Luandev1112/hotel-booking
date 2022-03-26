@extends('Layout::admin.app')
@section("content")
    <div class="container">
        <div class="d-flex justify-content-between mb20">
            <h1 class="title-bar">{{ __('All Themes')}}</h1>
            <div class="title-actions">
                <a href="{{route('theme.admin.upload')}}" class="btn btn-primary"><i class="fa fa-upload"></i> {{__("Upload")}}</a>
            </div>
        </div>
        @include('admin.message')
        <div class="row">
            @foreach($rows as $theme_id=>$themeClass)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="{{asset("themes/".$theme_id)}}{{$themeClass::$screenshot}}" alt="">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">{{$themeClass::$name}}</h5>
                                <span class="badge badge-secondary">{{$themeClass::$version}}</span>
                            </div>
                            @if(\Modules\Theme\ThemeManager::current() == strtolower($theme_id))
                                <span class="badge badge-success">{{__('Current')}}</span>
                            @else
                                <form action="{{route('theme.admin.activate',['theme'=>$theme_id])}}" method="post">
                                    @csrf
                                    <button class="btn btn-primary">{{__("Activate")}}</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
