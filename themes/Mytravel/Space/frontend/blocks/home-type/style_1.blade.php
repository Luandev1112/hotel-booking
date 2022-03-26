@if(!empty($list_item))
    <div class="bravo-home-type bg-gray-2">
        <div class="container space-2">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">{{$title}}</h2>
            </div>
            <div class="row mb-2">
                @foreach($list_item as $item)
                    <div class="col-md-6 col-xl-3">
                        <div class="rounded-xs mb-5 mb-xl-0">
                            <a class="d-block" href="{{ $item['link'] ?? '#' }}">
                                <div class="bg-img-hero gradient-overlay-half-bg-white transition-3d-hover shadow-hover-2 max-height-200" style="background-image: url({{get_file_url($item['bg_image']) ?? ''}});">
                                    <div class="text-center py-5">
                                        <i class="{{ $item['icon'] ?? '' }} font-size-50 text-red-lighter-1"></i>
                                        <h6 class="font-size-17 font-weight-bold text-gray-3 mt-2">{{$item['title'] ?? ''}}</h6>
                                        <span class="font-size-14 font-weight-normal text-gray-1">{{ $item['sub_title'] ?? '' }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
