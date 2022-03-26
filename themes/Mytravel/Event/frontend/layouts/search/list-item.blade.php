<div class="row">
    <div class="col-lg-3 col-md-12">
        @include('Event::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="d-flex justify-content-between align-items-center mb-4 topbar-search">
                <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1">
                    @if($rows->total() > 1)
                        {{ __(":count events found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count event found",['count'=>$rows->total()]) }}
                    @endif
                </h3>
                <div class="control">
                    @include('Event::frontend.layouts.search.orderby')
                </div>
            </div>
            <div class="list-item">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            <div class="col-md-6 col-xl-4 mb-3 mb-md-4 pb-1">
                                @include('Event::frontend.layouts.search.loop-grid')
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Event not found")}}
                        </div>
                    @endif
                </div>
            </div>
            @if($rows->total() > 0)
                <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">{{ __("Showing :from - :to of :total events",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
            @endif
            {{$rows->appends(request()->query())->links()}}
        </div>
    </div>
</div>
