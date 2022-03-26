@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp

<div class="item mb-4">
    <a class="d-block rounded-xs overflow-hidden mb-3" href="{{$row->getDetailUrl()}}">
        @if($row->image_id)
            @if(!empty($disable_lazyload))
                <img src="{{get_file_url($row->image_id,'medium')}}" class="img-fluid w-100" alt="{{$translation->name ?? ''}}">
            @else
                {!! get_image_tag($row->image_id,'medium',['class'=>'img-fluid w-100','alt'=>$row->title]) !!}
            @endif
        @endif
    </a>
    <h6 class="font-size-17 pt-xl-1 font-weight-bold font-weight-bold mb-1 text-gray-6">
        <a href="{{$row->getDetailUrl()}}">
            {!! clean($translation->title) !!}
        </a>
    </h6>
    <a class="text-gray-1" href="{{$row->getDetailUrl()}}">
        <span> {!! get_exceprt($translation->content,70,"...") !!}</span>
    </a>
</div>
