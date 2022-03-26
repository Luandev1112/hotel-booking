@if(!is_api())
	<div class="bravo_footer mt-4 border-top">
		<div class="main-footer">
			<div class="container">
				<div class="row justify-content-xl-between">
                    @if(!empty($info_contact = clean(setting_item_with_lang('footer_info_text'))))
                        <div class="col-12 col-lg-4 col-xl-3dot1 mb-6 mb-md-10 mb-xl-0">
                            {!! clean($info_contact) !!}
                        </div>
                    @endif
					@if($list_widget_footers = setting_item_with_lang("list_widget_footer"))
                        <?php $list_widget_footers = json_decode($list_widget_footers);?>
						@foreach($list_widget_footers as $key=>$item)
							<div class="col-12 col-md-6 col-lg-{{$item->size ?? '3'}} col-xl-1dot8 mb-6 mb-md-10 mb-xl-0">
								<div class="nav-footer">
                                    <h4 class="h6 font-weight-bold mb-2 mb-xl-4">{{$item->title}}</h4>
                                    {!! clean($item->content) !!}
								</div>
							</div>
						@endforeach
					@endif
                    <div class="col-12 col-md-6 col-lg col-xl-3dot1">
                        <div class="mb-4 mb-xl-2">
                            <h4 class="h6 font-weight-bold mb-2 mb-xl-4">{{ __('Mailing List') }}</h4>
                            <p class="m-0 text-gray-1">{{ __('Sign up for our mailing list to get latest updates and offers.') }}</p>
                        </div>
                        <form action="{{route('newsletter.subscribe')}}" class="subcribe-form bravo-subscribe-form bravo-form">
                            @csrf
                            <div class="input-group">
                                <input type="text" name="email" class="form-control height-54 font-size-14 border-radius-3 border-width-2 border-color-8 email-input" placeholder="{{__('Your Email')}}">
                                <div class="input-group-append ml-3">
                                    <button type="submit" class="btn-submit btn btn-sea-green border-radius-3 height-54 min-width-112 font-size-14">{{__('Subscribe')}}
                                        <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-mess"></div>
                        </form>
                    </div>
				</div>
			</div>
		</div>
        <div class="border-top border-bottom border-color-8 space-1">
            <div class="container">
                <div class="sub-footer d-flex align-items-center justify-content-between">
                    <a class="d-inline-flex align-items-center" href="{{ url('/') }}" aria-label="MyTravel">
                        {!! get_image_tag(setting_item_with_lang('logo_id_2')) !!}
                        <span class="brand brand-dark">{{ setting_item_with_lang('logo_text') }}</span>
                    </a>
                    <div class="footer-select bravo_topbar d-flex align-items-center">
                        <div class="mr-3">
                            @include('Language::frontend.switcher')
                        </div>
                        @include('Core::frontend.currency-switcher')
                    </div>
                </div>
            </div>
        </div>
		<div class="copy-right">
			<div class="container context">
				<div class="row">
					<div class="col-md-12">
						{!! setting_item_with_lang("footer_text_left") ?? ''  !!}
						<div class="f-visa">
							{!! setting_item_with_lang("footer_text_right") ?? ''  !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif
<a class="travel-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed" data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
    <span class="flaticon-arrow u-go-to-modern__inner"></span>
</a>
@include('Layout::parts.login-register-modal')
@include('Layout::parts.chat')
@if(Auth::id())
	@include('Media::browser')
@endif
<link rel="stylesheet" href="{{asset('libs/flags/css/flag-icon.min.css')}}">

{!! \App\Helpers\Assets::css(true) !!}

{{--Lazy Load--}}
<script src="{{asset('libs/lazy-load/intersection-observer.js')}}"></script>
<script async src="{{asset('libs/lazy-load/lazyload.min.js')}}"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function (event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);
</script>
<script src="{{ asset('libs/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('themes/mytravel/libs/jquery-migrate/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('themes/mytravel/libs/header.js') }}"></script>
<script>
    $(document).on('ready', function () {
        $.MyTravelHeader.init($('#header'));
    });
</script>
<script src="{{ asset('libs/lodash.min.js') }}"></script>
<script src="{{ asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>

<script src="{{ asset('themes/mytravel/libs/fancybox/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('themes/mytravel/libs/slick/slick.js') }}"></script>


@if(Auth::id())
	<script src="{{ asset('module/media/js/browser.js?_ver='.config('app.version')) }}"></script>
@endif
<script src="{{ asset('libs/carousel-2/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/moment.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/daterangepicker.min.js") }}"></script>
<script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('themes/mytravel/js/functions.js?_ver='.config('app.version')) }}"></script>
<script src="{{asset('themes/mytravel/libs/custombox/custombox.min.js')}}"></script>
<script src="{{asset('themes/mytravel/libs/custombox/custombox.legacy.min.js')}}"></script>
<script src="{{ asset('themes/mytravel/libs/custombox/window.modal.js') }}"></script>

@if(
    setting_item('tour_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('car_location_search_style')=='autocompletePlace' || setting_item('space_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('event_location_search_style')=='autocompletePlace'
)
	{!! App\Helpers\MapEngine::scripts() !!}
@endif
<script src="{{ asset('libs/pusher.min.js') }}"></script>
<script src="{{ asset('themes/mytravel/js/home.js?_ver='.config('app.version')) }}"></script>

@if(!empty($is_user_page))
	<script src="{{ asset('module/user/js/user.js?_ver='.config('app.version')) }}"></script>
@endif
@if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api()  and !isset($_COOKIE['booking_cookie_agreement_enable']))
	<div class="booking_cookie_agreement p-3 fixed-bottom">
		<div class="container d-flex ">
            <div class="content-cookie">{!! setting_item_with_lang('cookie_agreement_content') !!}</div>
            <button class="btn save-cookie">{!! setting_item_with_lang('cookie_agreement_button_text') !!}</button>
        </div>
	</div>
	<script>
        var save_cookie_url = '{{route('core.cookie.check')}}';
	</script>
	<script src="{{ asset('js/cookie.js?_ver='.config('app.version')) }}"></script>
@endif

{!! \App\Helpers\Assets::js(true) !!}

@yield('footer')

@php \App\Helpers\ReCaptchaEngine::scripts() @endphp
