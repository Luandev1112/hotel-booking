@if($row->getBookingEnquiryType() === "enquiry")
    <div class="bravo_single_book_wrap mb-4 @if(setting_item('hotel_enable_inbox')) has-vendor-box @endif">
        <div class="bravo_single_book">
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
            <div class="form-head">
                <div class="price">
                    <span class="label">
                        {{__("from")}}
                    </span>
                    <span class="value">
                        <span class="onsale">{{ $row->display_sale_price }}</span>
                        <span class="text-lg">{{ $row->display_price }}</span>
                    </span>
                </div>
            </div>
            <div class="form-send-enquiry" v-show="enquiry_type=='enquiry'">
                <button class="btn btn-primary" data-toggle="modal" data-target="#enquiry_form_modal">
                    {{ __("Contact Now") }}
                </button>
            </div>
        </div>
    </div>
@endif