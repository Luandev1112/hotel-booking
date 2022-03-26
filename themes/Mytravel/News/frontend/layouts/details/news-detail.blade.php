@php $translation = $row->translateOrOrigin(app()->getLocale()); @endphp
<div class="mb-4">
    @if($image_tag = get_image_tag($row->image_id,'full',['alt'=>$translation->title,'class'=>'img-fluid mb-4 rounded-xs w-100']))
        <a class="d-block" href="{{$row->getDetailUrl()}}">
            {!! $image_tag !!}
        </a>
    @endif
    <h5 class="font-weight-bold font-size-21 text-gray-3">
        <a href="{{$row->getDetailUrl()}}">{!! clean($translation->title) !!}</a>
    </h5>
    <div class="mb-3">
        <a class="mr-3 pr-1" href="#">
            <span class="font-weight-normal text-gray-3">{{ display_date($row->updated_at)}}</span>
        </a>
        @php $category = $row->getCategory; @endphp
        @if(!empty($category))
            @php $t = $category->translateOrOrigin(app()->getLocale()); @endphp
            <a href="{{$category->getDetailUrl(app()->getLocale())}}">
                <span class="font-weight-normal">{{$t->name ?? ''}}</span>
            </a>
        @endif
    </div>
    <p class="mb-0 text-lh-lg">
        {!! $translation->content !!}
    </p>
    <div class="space-between">
        @if (!empty($tags = $row->getTags()) and count($tags) > 0)
            <div class="tags">
                {{__("Tags:")}}
                @foreach($tags as $tag)
                    @php $t = $tag->translateOrOrigin(app()->getLocale()); @endphp
                    <a href="{{ $tag->getDetailUrl(app()->getLocale()) }}" class="tag-item"> {{$t->name ?? ''}} </a>
                @endforeach
            </div>
        @endif
        <div class="share"> {{__("Share")}}
            <a class="facebook share-item" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" original-title="{{__("Facebook")}}"><i class="fa fa-facebook fa-lg"></i></a>
            <a class="twitter share-item" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" original-title="{{__("Twitter")}}"><i class="fa fa-twitter fa-lg"></i></a>
        </div>
    </div>
</div>