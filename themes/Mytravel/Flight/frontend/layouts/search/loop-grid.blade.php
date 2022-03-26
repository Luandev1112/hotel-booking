<div class="card w-100 shadow-hover-3 mb-5">
	<a href="#" class="d-block mb-0 mx-1 mt-1 p-3" tabindex="0">
		
		<img class="card-img-top" src="{{$row->airline->image_url}}" alt="{{$row->airline->name}}">
	</a>
	<div class="card-body px-3 pt-0 pb-3 my-0 mx-1">
		<div class="row">
			<div class="col-7">
				<a href="#" class="card-title text-dark font-size-17 font-weight-bold" tabindex="0">{{$row->airportFrom->name}}</a>
			</div>
			<div class="col-5">
				<div class="text-right">
					<h6 class="font-weight-bold font-size-17 text-gray-3 mb-0">{{format_money(@$row->min_price)}}</h6>
					<span class="font-weight-normal font-size-14 d-block text-color-1">{{__('avg/person')}}</span>
				</div>
			</div>
		</div>
	</div>
	<div class="mb-3">
		<div class="border-bottom pb-3 mb-3">
			<div class="px-3">
				<div class="d-flex mx-1">
					<i class="flaticon-aeroplane font-size-30 text-primary mr-3"></i>
					<div class="d-flex flex-column">
						<span class="font-weight-normal text-gray-5">{{__('Take off')}}</span>
						<span class="font-size-14 text-gray-1">{{$row->departure_time->format("D M d H:i A")}}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="border-bottom pb-3 mb-3">
			<div class="px-3">
				<div class="d-flex mx-1">
					<i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary mr-3"></i>
					<div class="d-flex flex-column">
						<span class="font-weight-normal text-gray-5">{{__('Landing')}}</span>
						<span class="font-size-14 text-gray-1">{{$row->arrival_time->format("D M d H:i A")}}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center font-size-14 text-primary mb-3">
			<!-- On Target Modal -->
			<a class="font-size-14 text-gray-1 d-none" href="#ontargetModal{{$row->id}}" data-modal-target="#ontargetModal{{$row->id}}" data-modal-type="ontarget" data-modal-effect="fadein" data-speed="500">{{__('Flight Details')}}</a>
			
			<!-- End On Target Modal -->
		</div>
		<div class="d-flex justify-content-center pl-3 pr-3">
			@if($row->can_book)
			<a @click="openModalBook('{{$row->id}}')" href=""  onclick="event.preventDefault()" class="btn btn-blue-1 font-size-14 width-260 text-lh-lg transition-3d-hover py-1">{{__("Choose")}}</a>
			@else
				<a  href="#"  class="btn btn-warning font-size-14 width-260 text-lh-lg transition-3d-hover py-1 btn-disabled">{{__("Full Book")}}</a>
			@endif
		</div>
	</div>
</div>
