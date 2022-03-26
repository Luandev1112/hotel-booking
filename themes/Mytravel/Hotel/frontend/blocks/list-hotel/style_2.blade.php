<div class="bravo-list-hotel product-card-block product-card-v3">
    <div class="container-fluid space-top-2 space-top-lg-2">
        @if(!empty($title))
            <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-4 mt-xl-4">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">{{$title}}</h2>
            </div>
        @endif
        <div class="travel-slick-carousel u-slick u-slick--gutters-3"
                 data-arrows-classes="d-md-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                 data-arrow-left-classes="flaticon-back u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left shadow-5 d-lg-inline-block"
                 data-arrow-right-classes="flaticon-next u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right shadow-5 d-lg-inline-block"
                 data-infinite="true"
                 data-slides-show="5"
                 data-slides-scroll="5"
                 data-center-mode="false"
                 data-pagi-classes="text-center u-slick__pagination mt-5 mb-0"
                 data-responsive='[{
                        "breakpoint": 1025,
                        "settings": {
                        "slidesToShow": 3,
                        "slidesToScroll":3
                    }
                    }, {
                        "breakpoint": 992,
                        "settings": {
                        "slidesToShow": 2,
                        "slidesToScroll":2
                    }
                    }, {
                        "breakpoint": 768,
                        "settings": {
                        "slidesToShow": 1,
                        "slidesToScroll":1,
                        "dots": false
                    }
                    }]'>
                @foreach($rows as $row)
                    @include('Hotel::frontend.layouts.search.loop-grid')
                @endforeach
        </div>
    </div>
</div>
