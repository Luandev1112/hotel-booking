<?php
	if (empty($inputName)){
	    $inputName = 'location_id';
	}
;?>
<div class="item">
	<!-- Input -->
	<span class="d-block text-gray-1  font-weight-normal mb-0 text-left">
		{{ $field['title'] ?? "" }}
	</span>
	<div class="mb-4">
		<div class="input-group border-bottom-1 py-2">
			<i class="flaticon-pin-1 d-flex align-items-center mr-2 text-primary font-weight-semi-bold"></i>
			<?php
			$location_name = "";
			$list_json = [];
			$traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name,$inputName) {
				foreach ($locations as $location) {
					$translate = $location->translateOrOrigin(app()->getLocale());
					if (Request::query($inputName) == $location->id) {
						$location_name = $translate->name;
					}
					$list_json[] = [
							'id'    => $location->id,
							'title' => $prefix.' '.$translate->name,
					];
					$traverse($location->children, $prefix.'-');
				}
			};
			$traverse($list_location);
			?>
			<div class="smart-search border-0 p-0 form-control  height-40  bg-transparent">
				<input type="text" class="smart-search-location parent_text  font-weight-bold font-size-16 shadow-none hero-form font-weight-bold border-0 p-0 " {{ ( empty(setting_item("flight_location_search_style")) or setting_item("flight_location_search_style") == "normal" ) ? "readonly" : ""  }} placeholder="{{__("Where are you going?")}}" value="{{ $location_name }}" data-onLoad="{{__("Loading...")}}"
					   data-default="{{ json_encode($list_json) }}">
				<input type="hidden" class="child_id" name="{{$inputName}}" value="{{Request::query($inputName)}}">
			</div>
		</div>
	</div>
	<!-- End Input -->
</div>