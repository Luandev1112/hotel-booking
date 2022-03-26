<div id="flightFormBookModal"  class="js-modal-window u-modal-window max-width-960" data-modal-type="ontarget" data-open-effect="fadeIn" data-close-effect="fadeOut" data-speed="500">
	<div class="card mx-4 mx-xl-0 mb-4 mb-md-0"  v-show="!onLoading">
		<button type="button" class="border-0 width-50 height-50 bg-primary flex-content-center position-absolute rounded-circle mt-n4 mr-n4 top-0 right-0" aria-label="Close" onclick="Custombox.modal.close();">
			<i aria-hidden="true" class="flaticon-close text-white font-size-14"></i>
		</button>
		<!-- Header -->
		<header class="card-header bg-light py-4 px-4">
			<div class="row align-items-center text-center">
				<div class="col-md-auto mb-4 mb-md-0">
					<div class="d-block d-lg-flex flex-horizontal-center">
						<img class="img-fluid mr-3 mb-3 mb-lg-0 max-width-10" :src="flight.airline.image_url??''" alt="Image-Description">
						<div class="font-size-14">@{{flight.title}} | @{{flight.code}}</div>
					</div>
				</div>
				<div class="col-md-auto mb-4 mb-md-0">
					<div class="mx-2 mx-xl-3 flex-content-center align-items-start d-block d-lg-flex">
						<div class="mr-lg-3 mb-1 mb-lg-0">
							<i class="flaticon-aeroplane font-size-30 text-primary"></i>
						</div>
						<div class="text-lg-left">
							<h6 class="font-weight-bold font-size-21 text-gray-5 mb-0" v-html="flight.departure_time_html"></h6>
							<div class="font-size-14 text-gray-5" v-html="flight.departure_date_html"></div>
							<span class="font-size-14 text-gray-1" v-html="flight.airport_from.name"></span>
						</div>
					</div>
				</div>
				<div class="col-md-auto mb-4 mb-md-0">
					<div class="mx-2 mx-xl-3 flex-content-center flex-column">
						<h6 class="font-size-14 font-weight-bold text-gray-5 mb-0" v-html="flight.duration +' hrs'"></h6>
						<div class="width-60 border-top border-primary border-width-2 my-1"></div>
					</div>
				</div>
				<div class="col-md-auto mb-4 mb-md-0">
					<div class="mx-2 mx-xl-3 flex-content-center align-items-start d-block d-lg-flex">
						<div class="mr-lg-3 mb-1 mb-lg-0">
							<i class="d-block rotate-90 flaticon-aeroplane font-size-30 text-primary"></i>
						</div>
						<div class="text-lg-left">
							<h6 class="font-weight-bold font-size-21 text-gray-5 mb-0" v-html="flight.arrival_time_html"></h6>
							<div class="font-size-14 text-gray-5" v-html="flight.arrival_date_html"></div>
							<span class="font-size-14 text-gray-1" v-html="flight.airport_to.name"></span>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header -->
		
		<!-- Body -->
		<div class="card-body py-4 p-md-5">
			<div class="row">
				<div class="col-12 border-bottom mb-3">
					<ul class="d-block d-md-flex justify-content-between list-group list-group-borderless list-group-horizontal list-group-flush no-gutters border-bottom " v-for="(flight_seat,key) in flight.flight_seat" :key="key" v-if="flight_seat.max_passengers >0">
						<li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
							<div class="font-weight-bold text-dark">{{__('Seat type')}}</div>
							<span class="text-gray-1 text-capitalize" v-html="flight_seat.seat_type.name"></span>
						</li>
						<li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
							<div class="font-weight-bold text-dark">{{__('Baggage')}}</div>
							<span class="text-gray-1 text-capitalize" v-html="flight_seat.person"></span>
						</li>
						<li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
							<div class="font-weight-bold text-dark">{{__('Check-in')}}</div>
							<span class="text-gray-1" v-html="flight_seat.baggage_check_in+' Kgs'"></span>
						</li>
						<li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
							<div class="font-weight-bold text-dark">{{__('Cabin')}}</div>
							<span class="text-gray-1" v-html="flight_seat.baggage_cabin+' Kgs'"></span>
						</li>
						<li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
							<div class="font-weight-bold text-dark">{{__('Price')}}</div>
							<span class="text-gray-1" v-html="flight_seat.price_html"></span>
						</li>
						<li class="mr-md-8 mr-lg-8 mb-3 d-flex d-md-block justify-content-between list-group-item py-0">
							<div class="font-weight-bold text-dark">{{__('Number')}}</div>
							<div class="flex-horizontal-center">
								<a class="font-size-10 text-dark" href="javascript:;" @click="minusNumberFlightSeat(flight_seat)">
									<i class="fa fa-chevron-down"></i>
								</a>
								<input class="form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center"  type="text" @change="updateNumberFlightSeat(flight_seat)"  v-model="flight_seat.number" min="1">
								<a class="font-size-10 text-dark" href="javascript:;" @click="addNumberFlightSeat(flight_seat)">
									<i class="fa fa-chevron-up"></i>
								</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-12  col-lg-6 offset-lg-3">
					<div class="alert-text mt-3 text-left" v-show="message.content" v-html="message.content" :class="{'danger':!message.type,'success':message.type}"></div>
					<div class="min-width-250" v-show="total_price">
						<ul class="list-unstyled font-size-1 mb-0 font-size-16">
							<li class="d-flex justify-content-between py-2">
								<span class="font-weight-medium">{{__('Pay Amount')}}</span>
								<span class="font-weight-medium" v-html="total_price_html"></span>
							</li>
							<li class="d-flex justify-content-center py-2 font-size-17 font-weight-bold">
								<a @click="flightCheckOut()" class="btn btn-blue-1 font-size-14 width-135 text-lh-lg transition-3d-hover py-1 text-white">{{__('Book Now')}}</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Body -->
	</div>
</div>