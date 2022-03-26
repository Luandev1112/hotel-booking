<div class="mb-4">
    <div class="bravo_single_book_wrap">
        <div id="bravo_tour_book_app" class="bravo_single_book " v-cloak>
            <div class="border border-color-7 rounded mb-5">
                <div class="border-bottom">
                    @if($row->discount_percent)
                        <div class="sale-box">
                            <div class="ribbon ribbon--red">{{ __("SAVE :text",['text'=>$row->discount_percent]) }}</div>
                        </div>
                    @endif
                    <div class="p-4">
                        <span class="font-size-14">{{ __("From") }}</span>
                        <span class="font-size-24 text-gray-6 font-weight-bold ml-1">
                        <small class="font-size-16 text-decoration-line-through text-danger">
                           {{ $row->display_sale_price }}
                        </small>
                        {{ $row->display_price }}
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
                        <span class="d-block text-gray-1 font-weight-normal mb-0 text-left">{{ __("Start Date") }}</span>
                        <div class="mb-4">
                            <div class="border-bottom border-width-2 border-color-1 position-relative" data-format="{{get_moment_date_format()}}">
                                <div  @click="openStartDate" class="start_date d-flex align-items-center w-auto height-40 font-size-16 shadow-none font-weight-bold form-control hero-form bg-transparent border-0 flatpickr-input p-0">
                                    @{{start_date_html}}
                                </div>
                                <input type="text" class="start_date" ref="start_date" style="height: 1px;visibility: hidden;position: absolute;bottom: 0;width: 100%;">
                            </div>
                        </div>
                        <div class="" v-if="person_types">
                            <div class="form-group form-guest-search" v-for="(type,index) in person_types">
                                <span class="d-block text-gray-1 font-weight-normal mb-2 text-left">@{{type.name}}</span>
                                <div class="mb-4">
                                    <div class="border-bottom border-width-2 border-color-1 pb-1">
                                        <div class="flex-center-between mb-1 text-dark font-weight-bold">
                                            <span class="d-block">
                                                @{{type.desc}} <br>
                                                <small>@{{type.display_price}} {{__("per person")}}</small>
                                            </span>
                                            <div class="flex-horizontal-center">
                                                <a class="font-size-10 text-dark" href="javascript:;" @click="minusPersonType(type)">
                                                    <i class="fa fa-chevron-down"></i>
                                                </a>
                                                <input class="form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center"
                                                       type="text" v-model="type.number" min="1" @change="changePersonType(type)">
                                                <a class="font-size-10 text-dark" href="javascript:;" @click="addPersonType(type)">
                                                    <i class="fa fa-chevron-up"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div class="mb-4">
                                <div class="border-bottom border-width-2 border-color-1 pb-1">
                                    <div class="flex-center-between mb-1 text-dark font-weight-bold">
                                        <span class="d-block">
                                            {{__("Guests")}}
                                        </span>
                                        <div class="flex-horizontal-center">
                                            <a class="font-size-10 text-dark" href="javascript:;" @click="minusGuestsType()">
                                                <i class="fa fa-chevron-down"></i>
                                            </a>
                                            <input class="form-control h-auto width-30 font-weight-bold font-size-16 shadow-none bg-tranparent border-0 rounded p-0 mx-1 text-center" type="text"  v-model="guests" min="1">
                                            <a class="font-size-10 text-dark" href="javascript:;" @click="addGuestsType()">
                                                <i class="fa fa-chevron-up"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                        {{ __("Contact Now") }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@include("Booking::frontend.global.enquiry-form",['service_type'=>'tour'])
