<div class="list-brands">
    <div class="container space-1">
        <div class="row justify-content-between pb-lg-1 text-center text-md-left">
            @if(!empty($list_item))
                @foreach($list_item as $item)
                    <div class="col-12 col-md mb-5">
                        <img class="img-fluid" src="{{ get_file_url($item['image_id'],'full') }}" alt="Image Description">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
