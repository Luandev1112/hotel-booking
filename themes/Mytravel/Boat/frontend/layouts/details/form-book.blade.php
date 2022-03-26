<div class="mb-4">
    <div class="bravo_single_book_wrap mt-0">
        <div id="bravo_boat_book_app" class="bravo_single_book " v-cloak>
            <div class="border border-color-7 rounded mb-5">
                <div class="border-bottom">
                    <div class="price flex-wrap p-4">
                        <span class="value font-size-18 text-gray-6 font-weight-bold">
                            <div>{{ format_money($row->price_per_hour) }}<small>{{ __("/per hour") }}</small></div>
                            <div>{{ format_money($row->price_per_day) }}<small>{{ __("/per day") }}</small></div>
                        </span>
                    </div>
                </div>
                <div class="nav-enquiry" v-if="is_form_enquiry_and_book">
                    <div class="enquiry-item active" >
                        <span>{{ __("Book") }}</span>
                    </div>
                    <div class="enquiry-item" data-toggle="modal" data-target="#enquiry_form_modal">
                        <span>{{ __("Enquiry") }}</span>
                    </div>
                </div>
                <div class="form-book" :class="{'d-none':enquiry_type!='book'}">
                    <div class="p-4">
                        <div class="form-content">
                            <div class="form-group form-guest-search flex-wrap">
                                <div class="d-block text-gray-1 font-weight-normal mb-0 text-left">
                                    <label>{{__("Return on same-day")}}</label>
                                </div>
                                <div class="mb-0">
                                    <div class="pb-2">
                                        <div class="flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">
                                                {{__('Hours')}} <br>
                                            </span>
                                            <div class="flex-horizontal-center">
                                                <a class="font-size-10 text-dark" href="javascript:;" @click="minusHour()">
                                                    <i class="fa fa-chevron-down"></i>
                                                </a>
                                                <input class="form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center"  type="text"  v-model="hour" min="0">
                                                <a class="font-size-10 text-dark" href="javascript:;" @click="addHour">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block text-gray-1 font-weight-normal mb-0 text-left">
                                    <label>{{__("Return on another day")}}</label>
                                </div>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1 pb-3">
                                        <div class="flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">
                                                {{__('Days')}} <br>
                                            </span>
                                            <div class="flex-horizontal-center">
                                                <a class="font-size-10 text-dark" href="javascript:;" @click="minusDay()">
                                                    <i class="fa fa-chevron-down"></i>
                                                </a>
                                                <input class="form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center"  type="text"  v-model="day" min="0">
                                                <a class="font-size-10 text-dark" href="javascript:;" @click="addDay">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="guest-wrapper d-flex justify-content-between align-items-center border-bottom border-width-2 border-color-1 pb-3">
                                    <div class="flex-grow-1">
                                        <label>{{__("Start Time")}}</label>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="input-number-group">
                                            <select v-model="start_time" class="form-control form-control-sm" @change="startTimeChange()">
                                                @for ( $i = 0 ; $i <= 23 ; $i++)
                                                    <option value="{{ sprintf("%02d", $i) }}:00">{{ sprintf("%02d", $i) }} : 00</option>
                                                    <option value="{{ sprintf("%02d", $i) }}:30">{{ sprintf("%02d", $i) }} : 30</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">{{ __("Select Dates") }}</span>
                            <div class="mb-4">
                                <div class="border-bottom border-width-2 border-color-1 position-relative" data-format="{{get_moment_date_format()}}">
                                    <div  @click="openStartDate" class="start_date d-flex align-items-center w-auto height-40 font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0">
                                        <div v-html="start_date_html"></div>
                                    </div>
                                    @if(!empty($row->min_day_before_booking))
                                        <div class="render check-in-render mb-1">
                                            <small>
                                                @if($row->min_day_before_booking > 1)
                                                    - {{ __("Book :number days in advance",["number"=>$row->min_day_before_booking]) }}
                                                @else
                                                    - {{ __("Book :number day in advance",["number"=>$row->min_day_before_booking]) }}
                                                @endif
                                            </small>
                                        </div>
                                    @endif
                                    <small class="alert-text mt10 mt-2" v-show="message2.content" v-html="message2.content" :class="{'danger':!message2.type,'success':message2.type}"></small>
                                    <input type="text" class="start_date" ref="start_date" style="height: 1px;visibility: hidden;position: absolute;bottom: 0;width: 100%;">
                                </div>
                            </div>

                            <div class="mb-4 border-bottom border-width-2 border-color-1 pb-1" v-if="extra_price.length">
                                <h4 class="flex-center-between mb-1 font-size-16 text-dark font-weight-bold">{{__('Extra prices:')}}</h4>
                                <div class="mb-2" v-for="(type,index) in extra_price">
                                    <div class="extra-price-wrap d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <label><input type="checkbox" v-model="type.enable"> @{{type.name}}</label>
                                            <div class="render" v-if="type.price_type">(@{{type.price_type}})</div>
                                        </div>
                                        <div class="flex-shrink-0">@{{type.price_html}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2" v-if="buyer_fees.length">
                                <div class="extra-price-wrap d-flex justify-content-between" v-for="(type,index) in buyer_fees">
                                    <div class="flex-grow-1">
                                        <label>@{{type.type_name}}
                                            <i class="icofont-info-circle" v-if="type.desc" data-toggle="tooltip" data-placement="top" :title="type.type_desc"></i>
                                        </label>
                                        <div class="render" v-if="type.price_type">(@{{type.price_type}})</div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="unit" v-if='type.unit == "percent"'>
                                            @{{ type.price }}%
                                        </div>
                                        <div class="unit" v-else >
                                            @{{ formatMoney(type.price) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="form-section-total mb-4  list-unstyled  pb-1" v-if="total_price > 0">
                                <li>
                                    <label>{{__("Total")}}</label>
                                    <span class="price">@{{total_price_html}}</span>
                                </li>
                                <li v-if="is_deposit_ready">
                                    <label for="">{{__("Pay now")}}</label>
                                    <span class="price">@{{pay_now_price_html}}</span>
                                </li>
                            </ul>
                            <div v-html="html"></div>
                            <div class="text-center">
                                <button class="btn btn-primary d-flex align-items-center justify-content-center  height-60 w-100 mb-xl-0 mb-lg-1 transition-3d-hover font-weight-bold" @click="doSubmit($event)" :class="{'disabled':onSubmit,'btn-success':(step == 2),'btn-primary':step == 1}" name="submit">
                                    <span class="stop-color-white">{{__("Book Now")}}</span>
                                    <i v-show="onSubmit" class="fa fa-spinner fa-spin ml-1"></i>
                                </button>
                                <div class="alert-text mt-3 text-left" v-show="message.content" v-html="message.content" :class="{'danger':!message.type,'success':message.type}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                        {{ __("Contact Now") }}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

@include("Booking::frontend.global.enquiry-form",['service_type'=>'boat'])
