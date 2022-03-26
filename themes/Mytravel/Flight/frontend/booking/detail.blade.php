@php
    $lang_local = app()->getLocale();
    $service_translation = $service;
@endphp
<div class="shadow-soft bg-white rounded-sm booking-review">
    <div class="pt-5 pb-3 px-5 border-bottom">
        <a href="#" class="d-block mb-3">
            <img class="img-fluid rounded-xs" src="{{$service->airline->image_url}}" alt="{{$service->airline->name}}">
        </a>
        <a href="#" class="text-dark font-weight-bold mb-1">{{__(':from to :to',['from'=>$service->airportFrom->name,'to'=>$service->airportTo->name])}}</a>
        <div class="flex-content-center flex-column mb-1">
            <h6 class="font-size-14 font-weight-bold text-gray-5 mb-0">{{__(":duration hrs",['duration'=>$service->duration])}}</h6>
            <div class="width-60 border-top border-primary border-width-2 my-1"></div>
        </div>
        <div class="flex-horizontal-center justify-content-between">
            <div class="flex-horizontal-center">
                <div class="mr-2">
                    <i class="flaticon-aeroplane font-size-30 text-primary"></i>
                </div>
                <div class="text-lh-sm ml-1">
                    <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">{{$service->departure_time->format('H:i')}}</h6>
                    <span class="font-size-14 font-weight-normal text-gray-1">{{$service->airportFrom->name}}</span>
                </div>
            </div>
            <div class="text-center d-none d-md-block d-lg-none">
                <div class="mb-1">
                    <h6 class="font-size-14 font-weight-bold text-gray-5 mb-0">{{__(":duration hrs",['duration'=>$service->duration])}}</h6>
                </div>
            </div>
            <div class="flex-horizontal-center">
                <div class="mr-2">
                    <i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary"></i>
                </div>
                <div class="text-lh-sm ml-1">
                    <h6 class="font-weight-bold font-size-21 text-gray-5 mb-0">{{$service->arrival_time->format("H:i")}}</h6>
                    <span class="font-size-14 font-weight-normal text-gray-1">{{$service->airportTo->name}}</span>
                </div>
            </div>
        </div>
    </div>
    <div id="basicsAccordionBooking">
        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
            <div class="card-header card-collapse bg-transparent border-0" >
                <h5 class="mb-0">
                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark" data-toggle="collapse" data-target="#basicsCollapseDetail">
                        {{ __("Booking Detail") }}
                        <span class="card-btn-arrow font-size-14 text-dark"><i class="fa fa-chevron-down"></i></span>
                    </button>
                </h5>
            </div>
            <div id="basicsCollapseDetail" class="collapse show" data-parent="#basicsAccordionBooking">
                <div class="card-body px-4 pt-0">
                    
                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                        @if($booking->start_date)
                            <li class="d-flex justify-content-between py-2">
                                <div class="label">{{ __("Start Date") }}</div>
                                <div class="val">
                                    {{display_date($booking->start_date)}}
                                </div>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <div class="label">{{ __("Duration") }}</div>
                                <div class="val">{{human_time_diff($booking->end_date,$booking->start_date)}}</div>
                            </li>
                        @endif
                        @php
                        $flight_seat = $booking->getJsonMeta('flight_seat')@endphp
                        @if(!empty($flight_seat))
                            @foreach($flight_seat as $type)
                                @if(!empty($type['number']))
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label">{{$type['seat_type']['name']}}:</div>
                                    <div class="val">
                                        {{$type['number']}}
                                    </div>
                                </li>
                                    @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="card rounded-0 border-top-0 border-left-0 border-right-0">
            <div class="card-header card-collapse bg-transparent border-0" id="basicsHeadingFour">
                <h5 class="mb-0">
                    <button type="button" class="btn btn-link border-0 btn-block d-flex justify-content-between card-btn py-3 px-4 font-size-17 font-weight-bold text-dark" data-toggle="collapse" data-target="#basicsCollapsePayment">
                        {{ __("Payment") }}
                        <span class="card-btn-arrow font-size-14 text-dark"><i class="fa fa-chevron-down"></i></span>
                    </button>
                </h5>
            </div>
            <div id="basicsCollapsePayment" class="collapse show">
                <div class="card-body px-4 pt-0">
                    <ul class="list-unstyled font-size-1 mb-0 font-size-16">
                        @php $flight_seat = $booking->getJsonMeta('flight_seat')@endphp
                        @php $person_types = $booking->getJsonMeta('person_types') @endphp
                        @if(!empty($flight_seat))
                            @foreach($flight_seat as $type)
                                @if(!empty($type['number']))
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label">{{ $type['seat_type']['name']}}: {{$type['number']}} * {{format_money($type['price'])}}</div>
                                    <div class="val">
                                        {{format_money($type['price'] * $type['number'])}}
                                    </div>
                                </li>
                                @endif
                            @endforeach
                        @endif
                        @php $extra_price = $booking->getJsonMeta('extra_price') @endphp
                        @if(!empty($extra_price))
                            <li class="d-flex justify-content-between py-2">
                                <div class="font-size-16 font-weight-bold">
                                    {{__("Extra Prices:")}}
                                </div>
                            </li>
                            @foreach($extra_price as $type)
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label">{{$type['name_'.$lang_local] ?? __($type['name'])}}:</div>
                                    <div class="val">
                                        {{format_money($type['total'] ?? 0)}}
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @php $discount_by_people = $booking->getJsonMeta('discount_by_people')@endphp
                        @if(!empty($discount_by_people))
                            <li class="d-flex justify-content-between py-2">
                                <div class="font-size-16 font-weight-bold">
                                    {{__("Discounts:")}}
                                </div>
                            </li>
                            @foreach($discount_by_people as $type)
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label">
                                        @if(!$type['to'])
                                            {{__('from :from guests',['from'=>$type['from']])}}
                                        @else
                                            {{__(':from - :to guests',['from'=>$type['from'],'to'=>$type['to']])}}
                                        @endif
                                        :
                                    </div>
                                    <div class="val">
                                        - {{format_money($type['total'] ?? 0)}}
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @php
                            $list_all_fee = [];
                            if(!empty($booking->buyer_fees)){
                                $buyer_fees = json_decode($booking->buyer_fees , true);
                                $list_all_fee = $buyer_fees;
                            }
                            if(!empty($vendor_service_fee = $booking->vendor_service_fee)){
                                $list_all_fee = array_merge($list_all_fee , $vendor_service_fee);
                            }
                        @endphp
                        @if(!empty($list_all_fee))
                            @foreach ($list_all_fee as $item)
                                @php
                                    $fee_price = $item['price'];
                                    if(!empty($item['unit']) and $item['unit'] == "percent"){
                                        $fee_price = ( $booking->total_before_fees / 100 ) * $item['price'];
                                    }
                                @endphp
                                <li class="d-flex justify-content-between py-2">
                                    <div class="font-size-16 font-weight-bold">
                                        {{__("Fee:")}}
                                    </div>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label">
                                        {{$item['name_'.$lang_local] ?? $item['name']}}
                                        <i class="icofont-info-circle" data-toggle="tooltip" data-placement="top" title="{{ $item['desc_'.$lang_local] ?? $item['desc'] }}"></i>
                                        @if(!empty($item['per_person']) and $item['per_person'] == "on")
                                            : {{$booking->total_guests}} * {{format_money( $fee_price )}}
                                        @endif
                                    </div>
                                    <div class="val">
                                        @if(!empty($item['per_person']) and $item['per_person'] == "on")
                                            {{ format_money( $fee_price * $booking->total_guests ) }}
                                        @else
                                            {{ format_money( $fee_price ) }}
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @includeIf('Coupon::frontend/booking/checkout-coupon')
                        <li class="d-flex justify-content-between py-2">
                            <div class="label">{{__("Total:")}}</div>
                            <div class="val">{{format_money($booking->total)}}</div>
                        </li>
                        @if($booking->status !='draft')
                            <li class="d-flex justify-content-between py-2">
                                <div class="label">{{__("Paid:")}}</div>
                                <div class="val">{{format_money($booking->paid)}}</div>
                            </li>
                            @if($booking->paid < $booking->total )
                                <li class="d-flex justify-content-between py-2">
                                    <div class="label">{{__("Remain:")}}</div>
                                    <div class="val">{{format_money($booking->total - $booking->paid)}}</div>
                                </li>
                            @endif
                        @endif
                        @include ('Booking::frontend/booking/checkout-deposit-amount')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>