@if($list_item)
<div class="bravo-testimonial testimonial-block testimonial-v1 border-bottom border-color-8">
    <div class="container space-1">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto my-3">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">
                {{$title}}
            </h2>
        </div>
        <!-- Slick Carousel -->
        <div class="travel-slick-carousel u-slick u-slick--equal-height u-slick-bordered-primary u-slick--gutters-3 mb-4 pb-1" data-slides-show="3" data-center-mode="true" data-autoplay="true" data-speed="3000" data-pagi-classes="text-center u-slick__pagination mb-0 mt-n6" data-responsive='[ { "breakpoint": 992, "settings": { "slidesToShow": 2 } }, { "breakpoint": 768, "settings": { "slidesToShow": 1 } } ]'>
            @foreach($list_item as $item)
                <?php $avatar_url = get_file_url($item['avatar'], 'full') ?>
                <div class="item my-10">
                    <!-- Testimonials -->
                    <div class="card rounded-xs border-color-7 w-100">
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <div class="mb-5">
                                    <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">{{$item['name']}}</h6>
                                    <span class="text-blue-lighter-1 font-size-normal">{{$item['position'] ?? ''}}</span>
                                </div>
                                <figure id="quote1">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="56px" height="48px" class="injected-svg js-svg-injector" data-parent="#quote1">
                                        <text kerning="auto" font-family="Lato" fill="rgb(235, 240, 247)" font-weight="bold" font-size="150px" x="0px" y="109.401px">“</text>
                                    </svg>
                                </figure>
                            </div>
                            <p class="mb-0 text-gray-1 font-italic text-lh-inherit">
                                {{$item['desc']}}
                            </p>
                        </div>
                        <div class="card-img z-index-2 mb-3">
                            <div class="ml-3">
                                <img class="img-fluid rounded-circle" src="{{$avatar_url}}" alt="{{$item['name']}}">
                            </div>
                        </div>
                    </div>
                    <!-- End Testimonials -->
                </div>
            @endforeach
        </div>
        <!-- End Slick Carousel -->
    </div>
</div>
@endif
