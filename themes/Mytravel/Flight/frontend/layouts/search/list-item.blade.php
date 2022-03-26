<div class="row  pt-5 pt-xl-8 mb-5 mb-xl-9 pb-xl-1">
    <div class="col-lg-3 col-md-12">
        @include('Flight::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">
        <div class="bravo-list-item">
            <div class="d-flex justify-content-between align-items-center mb-4 topbar-search">
                <h3 class="font-size-21 font-weight-bold mb-0 text-lh-1">
                    @if($rows->total() > 1)
                        {{ __(":count flights found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count flight found",['count'=>$rows->total()]) }}
                    @endif
                </h3>
                <div class="control">
                    @include('Flight::frontend.layouts.search.orderby')
                </div>
            </div>
            <div class="list-item" id="flightFormBook">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            <div class="col-md-6 col-xl-4">
                                @include('Flight::frontend.layouts.search.loop-grid')
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Flight not found")}}
                        </div>
                    @endif
                </div>
            </div>
            @include('Flight::frontend.layouts.search.modal-form-book')

        @if($rows->total() > 0)
                <div class="text-center text-md-left font-size-14 mb-3 text-lh-1">{{ __("Showing :from - :to of :total Flights",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</div>
            @endif
            {{$rows->appends(request()->query())->links()}}
        </div>
    </div>
</div>
