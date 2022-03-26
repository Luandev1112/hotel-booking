@if($list_item)
<div class="bravo-testimonial testimonial-block testimonial-v1">
    <div class="container space-1">
        <div class="pt-7 pb-8">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">
                    {{$title}}
                </h2>
            </div>

            <!-- Slick Carousel -->
            <div class="travel-slick-carousel u-slick u-slick--gutters-3" data-infinite="true" data-autoplay="true" data-speed="3000" data-fade="true"
                 data-pagi-classes="text-center u-slick__pagination mb-0 mt-4"
                 data-responsive='[{
                            "breakpoint": 992,
                               "settings": {
                                 "slidesToShow": 1
                               }
                            }]'>
                @foreach($list_item as $item)
                    <?php $avatar_url = get_file_url($item['avatar'], 'full') ?>
                        <div class="item">
                            <!-- Testimonials -->
                            <div class="d-flex justify-content-center mb-6">
                                <div class="position-relative">
                                    <img class="img-fluid mx-auto" src="{{$avatar_url}}" alt="{{$item['name']}}">
                                    <div class="btn-position btn btn-icon btn-dark rounded-circle d-flex align-items-center justify-content-center height-60 width-60">
                                        <figure id="quote7" class="" style="">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30px" height="21px" margin-top="20px" class="injected-svg js-svg-injector" data-parent="#quote7">
                                                <text kerning="auto" font-family="Lato" fill="rgb(255, 255, 255)" font-weight="bold" font-size="70px" x="0px" y="51.9180000000001px">“</text>
                                            </svg>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="text-gray-1 font-italic text-lh-inherit px-xl-20 mx-xl-15 px-xl-20 mx-xl-18">{{$item['desc']}}</p>
                                <h6 class="font-size-17 font-weight-bold text-gray-6 mb-0">{{$item['name']}}</h6>
                                <span class="text-blue-lighter-1 font-size-normal">{{$item['position']}}</span>
                            </div>
                            <!-- End Testimonials -->
                        </div>
                @endforeach
            </div>
            <!-- End Slick Carousel -->
        </div>
    </div>
</div>
@endif
