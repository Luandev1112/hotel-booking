<div class="d-block d-md-flex flex-center-between align-items-start mb-3">
    <div class="mb-1">
        <div class="mb-2 mb-md-0">
            <h1 class="font-size-23 font-weight-bold mb-1 mr-3">{!! clean($translation->title) !!}</h1>
        </div>
        <div class="d-block d-xl-flex flex-horizontal-center">
            <div class="d-block d-md-flex flex-horizontal-center font-size-14 text-gray-1 mb-2 mb-xl-0">
                @if($translation->address)
                    <i class="icon flaticon-placeholder mr-2 font-size-20"></i> {{$translation->address}}
                @endif
                @if($row->map_lat && $row->map_lng)
                    <a target="_blank" href="https://www.google.com/maps/place/{{$row->map_lat}},{{$row->map_lng}}/@<?php echo $row->map_lat ?>,{{$row->map_lng}},{{!empty($row->map_zoom) ? $row->map_zoom : 12}}z" class="ml-1 d-block d-md-inline">
                        - {{__('View on map')}}
                    </a>
                @endif
            </div>
            @if(setting_item('tour_enable_review'))
                <?php
                $reviewData = $row->getScoreReview();
                $score_total = $reviewData['score_total'];
                ?>
                <div class="ml-2 service-review review-{{$score_total}}">
                    <div class="d-inline-flex align-items-center font-size-17 text-lh-1 text-primary">
                        <div class="list-star green-lighter mr-2">
                            <ul class="booking-item-rating-stars">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <div class="booking-item-rating-stars-active" style="width: {{  $score_total * 2 * 10 ?? 0  }}%">
                                <ul class="booking-item-rating-stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>
                        <span class="text-secondary font-size-14 mt-1">
                        @if($reviewData['total_review'] > 1)
                                {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
                            @else
                                {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
                            @endif
                    </span>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <ul class="list-group list-group-horizontal custom-social-share">
        <li class="list-group-item px-1 border-0">
            <span class="height-45 width-45 border rounded border-width-2 flex-content-center service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                <i class="flaticon-like font-size-18 text-dark"></i>
            </span>
        </li>
        <li class="list-group-item px-1 border-0">
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
</div>
<div class="py-4 border-top border-bottom mb-4">
    <ul class="list-group list-group-borderless list-group-horizontal row">
        @if($row->duration)
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-alarm text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1"> {{duration_format($row->duration,true)}}</div>
            </li>
        @endif
        @if($row->duration)
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-social text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1">{{ __("Max People") }} : {{ $row->max_people }}</div>
            </li>
        @endif
        @if($row->wifi_available)
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-wifi-signal text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1">{{ __("Wifi Available") }}</div>
            </li>
        @endif
        @if($row->date_form_to)
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-month text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1">{{ $row->date_form_to }}</div>
            </li>
        @endif
        @if($row->min_age)
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-user-2 text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1">{{ __('Min Age:') }} {{ $row->min_age }}</div>
            </li>
        @endif
        @if($row->pickup)
            <li class="col-md-4 flex-horizontal-center list-group-item text-lh-sm mb-2 border-0">
                <i class="flaticon-pin text-primary font-size-22 mr-2 d-block"></i>
                <div class="ml-1 text-gray-1">{{ __("Pickup:") }} {{ __("$row->pickup") }}</div>
            </li>
        @endif
    </ul>
</div>
<div class="position-relative">
    <h5 class="font-size-21 font-weight-bold text-dark mb-3">
        {{ __("Description") }}
    </h5>
    <div class="description">
        <?php echo $translation->content ?>
    </div>
</div>
@include('Tour::frontend.layouts.details.tour-include-exclude')
@include('Tour::frontend.layouts.details.tour-attributes')
@include('Tour::frontend.layouts.details.tour-itinerary')
@if($row->map_lat && $row->map_lng)
    <div class="border-bottom py-4">
        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
            {{ __("Location") }}
        </h5>
        <div class="location-map">
            <div id="map_content"></div>
        </div>
    </div>
@endif
@include('Tour::frontend.layouts.details.tour-faqs')
@includeIf("Hotel::frontend.layouts.details.hotel-surrounding")


