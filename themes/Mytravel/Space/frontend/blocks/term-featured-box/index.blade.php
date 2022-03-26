@if(!empty($list_term))
    <div class="bravo-featured-box bg-gray-2">
        <div class="container space-1">
            @if(!empty($title))
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mt-lg-10">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-0"> {{$title}}</h2>
            </div>
            @endif
            <div class="row mb-2">
                @foreach($list_term as $item)
                    <?php
                        $image_url = get_file_url($item->image_id, 'full');
                        $page_search = Modules\Space\Models\Space::getLinkForPageSearch(false , [ 'terms[]' =>  $item->id] );
                    ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="rounded-xs mb-5">
                            <a class="d-block" href="{{ $page_search }}">
                                <div class="bg-img-hero gradient-overlay-half-bg-white transition-3d-hover shadow-hover-2 max-height-200" style="background-image: url({{asset('/images/space-background.jpg')}});">
                                    <div class="text-center py-5">
                                        <i class="{{$item->icon}} font-size-50 text-red-lighter-1"></i>
                                        <h6 class="font-size-17 font-weight-bold text-gray-3 mt-2">{{$item->name}}</h6>
                                        <span class="font-size-14 font-weight-normal text-gray-1">{{ __(':num :text',['num' => count($item->space),'text' => (count($item->space) > 1) ? 'Listings' : 'Listing']) }}</span>
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
