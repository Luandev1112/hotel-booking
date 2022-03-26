<div class="position-relative">
    <div class="row">
        @if($translation->include)
            <div class="col-md-6 mb-4">
                <div class="font-weight-bold text-dark mb-3">{{ __("Price Includes") }}</div>
                @foreach($translation->include as $item)
                    <div class="flex-horizontal-center mb-3 text-gray-1">
                        <i class="flaticon-tick mr-3 font-size-16 text-primary"></i>
                        {{$item['title']}}
                    </div>
                @endforeach
            </div>
        @endif
        @if($translation->exclude)
            <div class="col-md-6 mb-4">
                <div class="font-weight-bold text-dark mb-3">{{ __("Price Excludes") }}</div>
                @foreach($translation->exclude as $item)
                    <div class="flex-horizontal-center mb-3 text-gray-1">
                        <i class="flaticon-close mr-3 font-size-16 text-danger"></i>
                        {{$item['title']}}
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>