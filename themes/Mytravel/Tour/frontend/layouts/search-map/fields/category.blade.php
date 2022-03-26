<div class="item filter-item">
    <div class="col dropdown-custom px-0">
        <?php
        $cat_ids = Request::query('cat_id');
        $cat_name = "";
        $list_cat_json = [];
        $traverse = function ($categories, $prefix = '') use (&$traverse, &$list_cat_json , &$cat_name , $cat_ids) {
            foreach ($categories as $category) {
                $translate = $category->translateOrOrigin(app()->getLocale());
                if (!empty($cat_ids[0]) and $cat_ids[0] == $category->id){
                    $cat_name = $translate->name;
                }
                $list_cat_json[] = [
                    'id' => $category->id,
                    'title' => $prefix . ' ' . $translate->name,
                ];
                $traverse($category->children, $prefix . '-');
            }
        };
        $traverse($tour_category);
        ?>
        <span class="d-block text-gray-1 text-left font-weight-normal">{{ $field['title'] ?? "" }}</span>
        <div class="flex-horizontal-center border-bottom border-width-2 border-color-1 d-flex">
            <i class="flaticon-backpack d-flex align-items-center mr-2 font-size-24 text-primary"></i>
            <div class="smart-search">
                <input type="text" class="smart-select parent_text form-control border-0 font-weight-bold font-size-16" readonly placeholder="{{__("All Category")}}" value="{{ $cat_name }}" data-default="{{ json_encode($list_cat_json) }}">
                <input type="hidden" class="child_id" name="cat_id[]" value="{{ $cat_ids[0] ?? "" }}">
            </div>
        </div>
    </div>
</div>