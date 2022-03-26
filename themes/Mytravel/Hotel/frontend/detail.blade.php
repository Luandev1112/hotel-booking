@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
    <div class="bravo_detail_hotel">
        <div class="border-bottom mb-3">
            @include('Layout::parts.bc')
        </div>
        <div class="bravo_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        @php $review_score = $row->review_data @endphp
                        @include('Hotel::frontend.layouts.details.hotel-detail')

                        @include('Hotel::frontend.layouts.details.hotel-rooms')

                        @include('Hotel::frontend.layouts.details.hotel-attributes')

                        @include('Hotel::frontend.layouts.details.hotel-rules-policy')

                        @includeIf("Hotel::frontend.layouts.details.hotel-surrounding")

                        @if($row->map_lat && $row->map_lng)
                            <div class="border-bottom py-4 pb-6">
                                <h5 class="font-size-21 font-weight-bold text-dark mb-4">
                                    {{ __("Location") }}
                                </h5>
                                <div class="location-map">
                                    <div id="map_content"></div>
                                </div>
                            </div>
                        @endif

                        @include('Hotel::frontend.layouts.details.hotel-review')
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="mb-4">
                            <div class="flex-horizontal-center">
                                <ul class="ml-n1 list-group list-group-borderless list-group-horizontal custom-social-share">
                                    <li class="list-group-item px-1 py-0">
                                        <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                                            <span class="height-45 width-45 border rounded border-width-2 flex-content-center cursor-pointer">
                                                <i class="flaticon-like font-size-18"></i>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-1 py-0">
                                        <a id="shareDropdownInvoker{{$row->id}}"
                                           class="dropdown-nav-link dropdown-toggle d-flex height-45 width-45 border rounded border-width-2 flex-content-center"
                                           href="javascript:;" role="button" aria-controls="shareDropdown{{$row->id}}" aria-haspopup="true" aria-expanded="false" data-unfold-event="hover"
                                           data-unfold-target="#shareDropdown{{$row->id}}" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300" data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp" data-unfold-animation-out="fadeOut">
                                            <i class="flaticon-share font-size-18 text-dark"></i>
                                        </a>
                                        <div id="shareDropdown{{$row->id}}" class="dropdown-menu dropdown-unfold dropdown-menu-right mt-0 px-3 min-width-3" aria-labelledby="shareDropdownInvoker{{$row->id}}">
                                            <a class="btn btn-icon btn-pill btn-bg-transparent transition-3d-hover  btn-xs btn-soft-dark  facebook mb-3" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
                                                <span class="font-size-15 fa fa-facebook-f btn-icon__inner"></span>
                                            </a>
                                            <br/>
                                            <a class="btn btn-icon btn-pill btn-bg-transparent transition-3d-hover  btn-xs btn-soft-dark  twitter" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                                                <span class="font-size-15 fa fa-twitter btn-icon__inner"></span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                @if($row->getReviewEnable())
                                    @if($review_score)
                                        <div class="flex-horizontal-center ml-2">
                                            <div class="badge-primary rounded-xs px-1">
                                                <span class="badge font-size-18 px-2 py-2 mb-0 text-lh-inherit">{{$review_score['score_total']}}/5 </span>
                                            </div>
                                            <div class="ml-2 text-lh-1">
                                                <div class="ml-1">
                                                    <h4 class="text-primary font-size-14 font-weight-bold mb-0">{{$review_score['score_text']}}</h4>
                                                    <span class="text-gray-1 font-size-12">({{$review_score['total_review']}} {{ $review_score['total_review'] > 1 ? __('Reviews') : __('Review') }})</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @include('Hotel::frontend.layouts.details.hotel-form-enquiry')
                        <div class="mb-4">
                            <div class="border border-color-7 rounded mb-5">
                                <div class="border-bottom">
                                    @if($row->discount_percent)
                                        <div class="sale-box">
                                            <div class="ribbon ribbon--red">{{ __("SAVE :text",['text'=>$row->discount_percent]) }}</div>
                                        </div>
                                    @endif
                                    <div class="p-4">
                                        <span class="font-size-14">{{ __("From") }}</span>
                                        <span class="font-size-24 text-gray-6 font-weight-bold ml-1">
                                            <small class="font-size-16 text-decoration-line-through text-danger">
                                               {{ $row->display_sale_price }}
                                            </small>
                                            {{ $row->display_price }}
                                            <span class="font-size-14"> / {{__('night')}}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="px-2 pt-2">
                                        @if($row->map_lat && $row->map_lng)
                                            <a target="_blank" href="https://www.google.com/maps/place/{{$row->map_lat}},{{$row->map_lng}}/@<?php echo $row->map_lat ?>,{{$row->map_lng}},{{!empty($row->map_zoom) ? $row->map_zoom : 12}}z" class="d-block border rounded mb-4">
                                                <img class="img-fluid" src="{{  url("/images/map.jpg") }}" alt="{{__('Address-Description')}}">
                                            </a>
                                            <div class="flex-horizontal-center mb-4">
                                                <div class="border-primary border rounded-xs px-3 text-lh-1dot7 py-1">
                                                    <span class="font-size-21 font-weight-bold px-1 mb-0 text-lh-inherit text-primary">@if($review_score) {{$review_score['score_total']}} @endif</span>
                                                </div>

                                                <div class="ml-2 text-lh-1">
                                                    <div class="ml-1">
                                                        <h4 class="text-primary font-size-17 font-weight-bold mb-0">{{__('Exceptional')}}</h4>
                                                        <span class="text-gray-1 font-size-14">{{__('Location rating score')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($translation->address)
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="flaticon-placeholder-1 font-size-25 text-primary mr-3 pr-1"></i>
                                                <h6 class="mb-0 font-size-14 text-gray-1">
                                                    <a href="#">{{__('Better than 99% of properties in ').$translation->address }}</a>
                                                </h6>
                                            </div>
                                        @endif
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="flaticon-medal font-size-25 text-primary mr-3 pr-1"></i>
                                            <h6 class="mb-0 font-size-14 text-gray-1">
                                                <a href="#">{{__('Exceptional location - Inside city center')}}</a>
                                            </h6>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="flaticon-home font-size-25 text-primary mr-3 pr-1"></i>
                                            <h6 class="mb-0 font-size-14 text-gray-1">
                                                <a href="#">{{__('Popular neighborhood')}}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('Tour::frontend.layouts.details.vendor')
                        @include('Booking::frontend/booking/booking-why-book-us')
                    </div>
                </div>
                <div class="row end_tour_sticky">
                    <div class="col-md-12">
                        @include('Hotel::frontend.layouts.details.hotel-related')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            "use strict"
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {}
                    });
                }
            });
            @endif
        });

        //Review
        $('.sfeedbacks_form .sspd_review .far').each(function () {
            var list = $(this).parent(),
                listItems = list.children(),
                itemIndex = $(this).index(),
                parentItem = list.parent();
            $(this).on('hover',function() {
                for (var i = 0; i < listItems.length; i++) {
                    if (i <= itemIndex) {
                        $(listItems[i]).addClass('hovered');
                    } else {
                        break;
                    }
                }
                $(this).on('click',function() {
                    for (var i = 0; i < listItems.length; i++) {
                        if (i <= itemIndex) {
                            $(listItems[i]).addClass('selected');
                        } else {
                            $(listItems[i]).removeClass('selected');
                        }
                    }
                    parentItem.children('.review_stats').val(itemIndex + 1);
                });
            }, function () {
                listItems.removeClass('hovered');
            });
        });


    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
			no_date_select:'{{__('Please select Start and End date')}}',
            no_guest_select:'{{__('Please select at least one guest')}}',
            load_dates_url:'{{route('space.vendor.availability.loadDates')}}',
            name_required:'{{ __("Name is Required") }}',
            email_required:'{{ __("Email is Required") }}',
        };
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/hotel/js/single-hotel.js?_ver='.config('app.version')) }}"></script>
@endsection
