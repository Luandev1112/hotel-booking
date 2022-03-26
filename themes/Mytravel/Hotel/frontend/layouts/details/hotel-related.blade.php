@if(count($hotel_related) > 0)
    <!-- Product Cards Ratings With carousel -->
    <div class="product-card-block product-card-v3">
        <div class="space-1">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-4">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">{{__("You might also like...")}}</h2>
            </div>
            <div class="travel-slick-carousel u-slick u-slick--equal-height u-slick--gutters-3"
                 data-slides-show="4"
                 data-slides-scroll="1"
                 data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic v1 u-slick__arrow-classic--v1 u-slick__arrow-centered--y rounded-circle"
                 data-arrow-left-classes="fa fa-chevron-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left"
                 data-arrow-right-classes="fa fa-chevron-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right"
                 data-pagi-classes="d-lg-none text-center u-slick__pagination mt-4"
                 data-responsive='[{
                                "breakpoint": 1025,
                                "settings": {
                                    "slidesToShow": 3
                                }
                            }, {
                                "breakpoint": 992,
                                "settings": {
                                    "slidesToShow": 2
                                }
                            }, {
                                "breakpoint": 768,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }, {
                                "breakpoint": 554,
                                "settings": {
                                    "slidesToShow": 1
                                }
                            }]'>
                @foreach($hotel_related as $k=>$item)
                    @php
                        $translation_item = $item->translateOrOrigin(app()->getLocale());
                    @endphp
                    <div class="js-slide py-3">
                        <div class="card transition-3d-hover shadow-hover-2 w-100 mt-2">
                            <div class="position-relative">
                                <a href="{{$item->getDetailUrl(false)}}" class="d-block gradient-overlay-half-bg-gradient-v5">
                                    @if($item->image_url)
                                        @if(!empty($disable_lazyload))
                                            <img class="card-img-top" src="{{$item->image_url}}" alt="{{$translation_item->title}}">
                                        @else
                                            {!! get_image_tag($item->image_id,'thumb',['class'=>'img-responsive card-img-top','alt'=>$translation_item->title]) !!}
                                        @endif
                                    @endif

                                </a>
                                <div class="position-absolute top-0 right-0 pt-3 pr-3">
                                    <button type="button" class="btn btn-sm btn-icon text-white rounded-circle"  data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Save for later')}}">
                                        <span class="service-wishlist {{$item->isWishList()}}" data-id="{{$item->id}}" data-type="{{$item->type}}">
                                            <span class="flaticon-heart-1 font-size-20"></span>
                                        </span>

                                    </button>
                                </div>
                                @if($translation->address)
                                <div class="position-absolute bottom-0 left-0 right-0">
                                    <div class="px-4 pb-3">
                                        <a href="{{$item->getDetailUrl(false)}}" class="d-block">
                                            <div class="d-flex align-items-center font-size-14 text-white">
                                                <i class="icon flaticon-placeholder mr-2 font-size-20"></i> {{$translation->address}}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="card-body px-4 pt-2 pb-3">
                                @if($item->star_rate)
                                    <div class="mb-2">
                                        <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                                            <div class="green-lighter">
                                                @for ($star = 1 ;$star <= $item->star_rate ; $star++)
                                                    <small class="fa fa-star"></small>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <a href="{{$item->getDetailUrl(false)}}" class="card-title font-size-17 font-weight-medium text-dark">{{$translation_item->title}}</a>
                                @if($review_score)
                                    <div class="mt-2 mb-3">
                                        <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">{{$review_score['score_total']}}/5</span>
                                        <span class="font-size-14 text-gray-1 ml-2">(
                                            @if($review_score['total_review'] > 1)
                                            {{ __(":number reviews",["number"=>$review_score['total_review'] ]) }}
                                            @else
                                            {{ __(":number review",["number"=>$review_score['total_review'] ]) }}
                                            @endif() )


                                        </span>
                                    </div>
                                @endif
                                <div class="mb-0">
                                    <span class="mr-1 font-size-14 text-gray-1">{{__("From")}}</span>
                                    <span class="font-weight-bold">{{ $item->display_price }}</span>
                                    <span class="font-size-14 text-gray-1">{{__("/night")}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endif
