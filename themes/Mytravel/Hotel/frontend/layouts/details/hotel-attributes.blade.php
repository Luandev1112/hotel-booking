@php
    $terms_ids = $row->terms->pluck('term_id');
    $attributes = \Modules\Core\Models\Terms::getTermsById($terms_ids);
@endphp
@if(!empty($terms_ids) and !empty($attributes))
    @foreach($attributes as $key => $attribute )
        <div class="border-bottom py-4 position-relative {{$attribute['parent']->slug}} attr-{{$attribute['parent']->id}}">
        @php $translate_attribute = $attribute['parent']->translateOrOrigin(app()->getLocale()) @endphp
        @if(empty($attribute['parent']['hide_in_single']))
            <h5 id="scroll-{{$attribute['parent']->slug}}" class="font-size-21 font-weight-bold text-dark mb-4">
                <h5 id="scroll-specifications" class="font-size-21 font-weight-bold text-dark mb-4">
                    {{ $translate_attribute->name }}
                </h5>
            </h5>

            <ul class="list-group list-group-borderless list-group-horizontal list-group-flush no-gutters row">
                @php $terms = $attribute['child'] @endphp
                @foreach($terms as $term )
                    @php $translate_term = $term->translateOrOrigin(app()->getLocale()) @endphp
                    <li class="col-md-4 mb-5 list-group-item py-0">
                        <i class="{{ $term->icon ?? "icofont-check-circled icon-default" }} mr-3 text-primary font-size-24"></i>{{$translate_term->name}}
                    </li>
                @endforeach
            </ul>
        @endif
        </div>
    @endforeach
@endif


