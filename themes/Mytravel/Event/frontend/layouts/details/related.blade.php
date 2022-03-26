@if(count($event_related) > 0)
    <div class="bravo-list-event-related mb-8 ">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mt-3">
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-0">{{ __("You might also like...") }}</h2>
        </div>
        <div class="row mt-5">
            @foreach($event_related as $k=>$item)
                <div class="col-md-3">
                    @include('Event::frontend.layouts.search.loop-grid',['row'=>$item,'include_param'=>0])
                </div>
            @endforeach
        </div>
    </div>
@endif
