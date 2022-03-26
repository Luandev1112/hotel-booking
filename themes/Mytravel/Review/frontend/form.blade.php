@if(setting_item($row->type."_enable_review"))
    <div class="bravo-reviews">
        <div class="border-bottom py-4">
            <h5 id="scroll-reviews" class="font-size-21 font-weight-bold text-dark mb-4">
                {{__("Reviews")}}
            </h5>
            @if($review_score)
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="border rounded flex-content-center py-5 border-width-2">
                            <div class="text-center">
                                <h2 class="font-size-50 font-weight-bold text-primary mb-0 text-lh-sm">
                                    {{$review_score['score_total']}}<span class="font-size-20">/5</span>
                                </h2>
                                <div class="font-size-25 text-dark mb-3">{{$review_score['score_text']}}</div>
                                <div class="text-gray-1">{{__("From")}}
                                    @if($review_score['total_review'] > 1)
                                        {{ __(":number reviews",["number"=>$review_score['total_review'] ]) }}
                                    @else
                                        {{ __(":number review",["number"=>$review_score['total_review'] ]) }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            @if($review_score['rate_score'])
                                @foreach($review_score['rate_score'] as $item)
                                    <div class="col-md-6 mb-4">
                                        <h6 class="font-weight-normal text-gray-1 mb-1">
                                            {{$item['title']}}
                                        </h6>
                                        <div class="flex-horizontal-center mr-6">
                                            <div class="progress bg-gray-33 rounded-pill w-100" style="height: 7px;">
                                                <div class="progress-bar rounded-pill" role="progressbar" style="width: {{$item['percent']}}%;" aria-valuenow="{{$item['percent']}}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="ml-3 text-primary font-weight-bold">
                                                {{$item['total']}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div id="stickyBlockEndPoint"></div>
        <div class="border-bottom py-4">
            @if($review_list->total() > 0)
                <h5 class="font-size-21 font-weight-bold text-dark mb-5 mt-3">
                    {{ __("Showing :from - :to of :total total",["from"=>$review_list->firstItem(),"to"=>$review_list->lastItem(),"total"=>$review_list->total()]) }}
                </h5>
            @else
                <h5 class="font-size-21 font-weight-bold text-dark mb-8">
                    {{__("No Review")}}
                </h5>
            @endif
            @if($review_list)
                @foreach($review_list as $item)
                    @php $userInfo = $item->author; @endphp
                    <div class="media flex-column flex-md-row align-items-center align-items-md-start mb-4">
                        <div class="mr-md-5">
                            <a class="d-block" href="#">
                                @if($avatar_url = $userInfo->getAvatarUrl())
                                    <img class="img-fluid mb-3 mb-md-0 rounded-circle avatar-img" src="{{$avatar_url}}" alt="{{$userInfo->getDisplayName()}}">
                                @endif
                            </a>
                        </div>
                        <div class="media-body text-center text-md-left">
                            <div class="mb-4">
                                <h6 class="font-weight-bold text-gray-3">
                                    <a href="#">{{$userInfo->getDisplayName()}}</a>
                                </h6>
                                <div class="font-weight-normal font-size-14 text-gray-9 mb-2">{{display_datetime($item->created_at)}}</div>
                                <div class="d-flex align-items-center flex-column flex-md-row mb-2">
                                    @if($item->rate_number)
                                        <button type="button" class="btn btn-xs btn-primary rounded-xs font-size-14 py-1 px-2 mr-2 mb-2 mb-md-0">{{$item->rate_number}} /5 </button>
                                    @endif
                                    <span class="font-weight-bold font-italic text-gray-3">{{$item->title}}</span>
                                </div>
                                <p class="text-lh-1dot6 mb-0 pr-lg-5">{{$item->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if($review_list->total() > 0)
                <div class="bravo-pagination">
                    {{$review_list->appends(request()->query())->fragment('review-list')->links()}}
                </div>
            @endif
        </div>
        <div class="py-4">
            @if($row->check_enable_review_after_booking() and Auth::id())
                <h5 class="font-size-21 font-weight-bold text-dark mb-6">
                    {{__("Write a review")}}
                </h5>
                <div class="form-wrapper">

                    <form action="{{ route('review.store')}}" class="needs-validation sfeedbacks_form" novalidate method="post">
                        @csrf
                        <div class="row mb-5 mb-lg-0">
                            <div class="col-sm-12">
                                @include('admin.message')
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    @if($tour_review_stats = setting_item($row->type."_review_stats"))
                                        @php $tour_review_stats = json_decode($tour_review_stats) @endphp
                                        @foreach($tour_review_stats as $item)
                                            <div class="col-md-4 mb-6">
                                                <h6 class="font-weight-bold text-dark mb-1">
                                                    {{$item->title}}
                                                </h6>
                                                <input class="review_stats" type="hidden" name="review_stats[{{$item->title}}]">
                                                <span class="font-size-20 letter-spacing-3 sspd_review">
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                    <small class="fa fa-smile-o font-weight-normal"></small>
                                                </span>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-md-4 mb-6">
                                            <h6 class="font-weight-bold text-dark mb-1">
                                                {{__("Review rate")}}
                                            </h6>
                                            <input class="review_stats" type="hidden" name="review_rate">
                                            <span class="font-size-20 letter-spacing-3 sspd_review">
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                                <small class="fa fa-smile-o font-weight-normal"></small>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12 mb-5">
                                <div class="js-form-message">
                                    <input type="text" class="form-control" name="review_title" placeholder="{{__("Title")}}" required data-error-class="u-has-error" data-msg="{{__('Review title is required')}}" data-success-class="u-has-success">
                                    <div class="invalid-feedback">{{__('Review title is required')}}</div>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-5">
                                <div class="js-form-message">
                                    <div class="input-group">
                                        <textarea class="form-control" rows="6" cols="77" name="review_content" placeholder="{{__("Review content")}}" required data-msg="{{__('Review content has at least 10 character')}}" data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                        <div class="invalid-feedback">{{__('Review content has at least 10 character')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center justify-content-lg-start">
                                <button type="submit" id="submit" name="submit" class="btn rounded-xs bg-blue-dark-1 text-white p-2 height-51 width-190 transition-3d-hover">{{__("Leave a Review")}}</button>
                                <input type="hidden" name="review_service_id" value="{{$row->id}}">
                                <input type="hidden" name="review_service_type" value="{{ $row->type }}">
                            </div>
                        </div>

                    </form>
                </div>
            @endif
            @if(!Auth::id())
                <div class="review-message">
                    {!!  __("You must <a href='#login' data-toggle='modal' data-target='#login'>log in</a> to write review") !!}
                </div>
            @endif
        </div>
    </div>
@endif
