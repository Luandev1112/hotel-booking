<div class="bravo-contact-block">
    <div class="bg-img-hero text-center mb-5 mb-lg-8" style="background-image: url('{{ get_file_url(setting_item("page_contact_image"),"full") }}');">
        <div class="container space-top-xl-3 py-6 py-xl-0">
            <div class="row justify-content-center py-xl-4">
                <!-- Info -->
                <div class="py-xl-10 py-5">
                    <h1 class="font-size-40 font-size-xs-30 text-white font-weight-bold mb-0">{{ setting_item_with_lang("page_contact_title") }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-no-gutter justify-content-center mb-0">
                            <li class="breadcrumb-item font-size-14"> <a class="text-white" href="{{ url("/") }}">{{ __("Home") }}</a> </li>
                            <li class="breadcrumb-item custom-breadcrumb-item font-size-14 text-white active" aria-current="page">{{ setting_item_with_lang("page_contact_title") }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @if(!empty($contact_lists = setting_item("page_contact_lists")))
        @php  $contact_lists = json_decode($contact_lists,true) @endphp
        <div class="border-bottom border-color-8 pb-6 pb-lg-8 mb-5 mb-lg-7">
            <div class="container pb-1">
                <div class="row">
                    @foreach( $contact_lists as $item)
                        <div class="col-md-6 col-lg-4">
                            <div class="mb-5 mb-lg-0 text-center text-md-left">
                                <h6 class="text-gray-3 font-weight-bold font-size-21">{{ $item['title'] }}</h6>
                                <div class="mb-3 mb-md-5">
                                    <p class="mb-1 text-gray-1">{!! clean($item['address']) !!}</p>
                                </div>
                                <div class="mb-1">
                                    <p class="mb-1 text-gray-1">{{ $item['phone'] }}</p>
                                    <p class="mb-0 text-gray-1">{{ $item['email'] }}</p>
                                </div>
                                <a class="d-inline-block" href="{{ $item['link_map'] }}">
                                    <div class="border-bottom border-primary font-weight-normal font-size-14 text-primary">
                                        {{ __("View On Map") }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="border-bottom border-color-8 pb-6 pb-lg-9 mb-6 mb-lg-8">
        <div class="container mb-10">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto my-3">
                <h2 class="section-title text-black font-size-30 font-weight-bold mb-5 pb-xl-1">{{ __("Sends us a Message") }}</h2>
            </div>
            <div class="comment-section max-width-810 mx-auto">
                <form method="post" action="{{ route("contact.store") }}"  class="bravo-contact-block-form">
                    {{csrf_field()}}
                    <div style="display: none;">
                        <input type="hidden" name="g-recaptcha-response" value="">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-5">
                            <div class="js-form-message">
                                <input type="text" class="form-control" name="name" placeholder="{{ __("Name") }}" >
                            </div>
                        </div>
                        <div class="col-sm-6 mb-5">
                            <div class="js-form-message">
                                <input type="email" class="form-control" name="email" placeholder="{{ __("Email") }}" >
                            </div>
                        </div>
                        <div class="col-sm-12 mb-5">
                            <div class="js-form-message">
                                <div class="input-group">
                                    <textarea class="form-control" rows="6" cols="77" name="message" placeholder="{{ __('Message') }}"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{recaptcha_field('contact')}}
                        </div>
                        <div class="col d-flex justify-content-lg-start">
                            <button type="submit" class="btn rounded-xs bg-blue-dark-1 text-white height-51 width-190 transition-3d-hover">
                                {{ __("Send Message") }}
                                <i class="fa fa-spinner fa-pulse fa-fw"></i>
                            </button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <div class="form-mess"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="iframe_map">
            {!! ( setting_item("page_contact_iframe_google_map")) !!}
        </div>
    </div>
</div>