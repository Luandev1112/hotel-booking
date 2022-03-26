@if($translation->itinerary)
    <div class="border-bottom  border-top py-4">
        <h5 class="font-size-21 font-weight-bold text-dark mb-4">
            {{__("Itinerary")}}
        </h5>
        <div id="itinerary">
            @foreach($translation->itinerary as $key=>$item)
                <div class="card border-0 mb-3">
                    <div class="card-header border-bottom-0 p-0">
                        <h5 class="mb-0">
                            <button type="button" class="collapse-link btn btn-link btn-block d-flex align-items-md-center font-weight-bold p-0" data-toggle="collapse" data-target="#itinerary_{{$key}}">
                                <div class="text-primary font-size-22 mb-3 mb-md-0 mr-3">
                                    <i class="fa fa-circle-o"></i>
                                </div>
                                <div class="text-primary flex-shrink-0">{{$item['title']}} <span class="px-2">-</span> </div>
                                <h6 class="font-weight-bold text-gray-3 text-left mb-0">{{$item['desc']}}</h6>
                            </button>
                        </h5>
                    </div>
                    <div id="itinerary_{{$key}}" class="collapse @if($key == 0 ) show @endif" data-parent="#itinerary">
                        <div class="card-body">
                            <p class="mb-0">
                                {!! clean($item['content']) !!}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif