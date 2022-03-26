@php $main_color = setting_item('style_main_color','#5191fa');
$style_typo = json_decode(setting_item_with_lang('style_typo',false,"{}"),true);
@endphp


    body{
    @if(!empty($style_typo) && is_array($style_typo))
        @foreach($style_typo as $k=>$v)
            @if($v)
                {{str_replace('_','-',$k)}}:{!! $v !!};
            @endif
        @endforeach
    @endif
    }

    .bravo_wrap .page-template-content .bravo-unmissable-destinations .bravo-list-service .style_2 .item-content .item-title > a:hover,
    .bravo_wrap .page-template-content .bravo-unmissable-destinations .bravo-list-service .style_2 .card-body .title:hover,
    .btn-outline-primary.disabled,
    .btn-outline-primary:disabled,
    .btn-outline-blue-1,
    .btn-outline-blue-1.disabled,
    .btn-outline-blue-1:disabled,
    .btn-link,
    .page-link:hover,
    .list-group-item-action:hover,
    .list-group-item-action:focus,
    .list-group-item-action:active,
    .text-primary,
    .text-blue-1,
    .list-group .active > .list-group-item,
    .list-group-white .list-group-item[href]:hover,
    .list-group-white .list-group-item-action[href]:hover,
    .list-group-flush .list-group-item.active,
    .u-header__navbar-brand-text:focus,
    .u-header__navbar-brand-text:hover,
    .u-header__nav-item:hover .u-header__nav-link,
    .u-header__nav-item:focus .u-header__nav-link,
    .u-header .active > .u-header__nav-link,
    .u-header__sub-menu .active > .u-header__sub-menu-nav-link,
    .u-header__promo-link:hover .u-header__promo-title,
    .u-header__product-banner-title,
    .u-header--sub-menu-dark-bg .u-header__sub-menu-nav-link:hover,
    .u-header--dark-nav-links:not(.bg-dark) .u-header__nav-item:hover .u-header__nav-link,
    .navbar-expand-xs .u-header__banner-caption:hover, .navbar-expand-xs .u-header__banner-caption:focus,
    .navbar-expand-sm .u-header__banner-caption:hover, .navbar-expand-sm .u-header__banner-caption:focus,
    .navbar-expand-md .u-header__banner-caption:hover, .navbar-expand-md .u-header__banner-caption:focus,
    .navbar-expand-lg .u-header__banner-caption:hover, .navbar-expand-lg .u-header__banner-caption:focus,
    .u-header-collapse__nav-link.active,
    .u-header-collapse__submenu-nav-link.active,
    .btn-custom-toggle-primary:hover,
    .btn-custom-toggle-white:not(:disabled):not(.disabled):active, .btn-custom-toggle-white:not(:disabled):not(.disabled).active, .btn-custom-toggle-white:not(:disabled):not(.disabled):active, .btn-custom-toggle-white:not(:disabled):not(.disabled).active,
    .btn-soft-primary,
    .btn-soft-primary[href].disabled, .btn-soft-primary[href]:disabled,
    .btn-soft-primary[type].disabled, .btn-soft-primary[type]:disabled,
    .btn.btn-soft-primary,
    .btn-soft-blue-1,
    .btn-soft-blue-1[href].disabled, .btn-soft-blue-1[href]:disabled,
    .btn-soft-blue-1[type].disabled, .btn-soft-blue-1[type]:disabled,
    .btn.btn-soft-blue-1,
    .btn-text-primary,
    .btn-text-blue-1,
    .brand-primary,
    .brand-primary:focus, .brand-primary:hover,
    .breadcrumb-item:not(.active):hover,
    .breadcrumb-item:not(.active):hover a,
    .card-text-dark:hover,
    .card-btn-arrow,
    .sidenav .from, .sidenav .to,
    .u-sidebar--account__toggle-bg:hover .u-sidebar--account__toggle-text,
    .u-sidebar--account__list-link.active, .u-sidebar--account__list-link:hover,
    .u-sidebar--account__list-link.active .u-sidebar--account__list-icon, .u-sidebar--account__list-link:hover .u-sidebar--account__list-icon,
    .dropdown-item:hover, .dropdown-item.active,
    .footer .list-group-item-action:hover,
    .tab-dropdown.show,
    .tab-dropdown .dropdown-item:hover,
    .custom-dropdown .dropdown-toggle-collapse[aria-expanded=true] span,
    .custom-dropdown .dropdown-toggle-collapse[aria-expanded=true]:before,
    .u-focus-state .input-group-text,
    .bookmark-checkbox-input:checked ~ .bookmark-checkbox-label,
    .u-range-slider-grid .irs-grid-text.current,
    .u-go-to-ver-arrow,
    .u-go-to-modern,
    .u-media-player:hover .u-media-player__icon, .u-media-player:focus .u-media-player__icon,
    .u-media-player__icon--primary,
    .u-video-player__btn:hover .u-video-player__icon, .u-video-player__btn:focus .u-video-player__icon,
    .nav-classic .nav-link:hover,
    .nav-classic .nav-link.active,
    .tab-nav-line .nav-link.active .tabtext,
    .tab-nav-shop .nav-link.active,
    .tab-nav-1-line .nav-link.active .tabtext,
    .tab-nav-1-shop .nav-link.active,
    .tab-nav-1-list .nav-link.active i, .tab-nav-1-list .nav-link.active span,
    .nav-icon .nav-item.active,
    .u-quantity__arrows-inner:hover,
    .u-slick-bordered-primary .slick-current .card .testimonial-quote i,
    .u-slick__arrow,
    .u-slick__arrow-classic,
    .u-slick__arrow-classic--v2,
    .u-slick--pagination-interactive .slick-center .u-slick--pagination-interactive__title,
    .link__icon,
    .text-primary-max-wd,
    .card-title.text-dark:hover,
    .pagination-v2-arrow-color,
    .list-tab .list-link:hover i, .list-tab .list-link:hover span,
    .list-tab .list-link:active i, .list-tab .list-link:active span,
    .u-cubeportfolio .u-cubeportfolio__item.cbp-filter-item-active,
    .u-datatable__thead-icon:hover,
    .u-datepicker .flatpickr-day:focus, .u-datepicker .flatpickr-day:hover,
    .u-datepicker .flatpickr-day.selected,
    .u-datepicker .flatpickr-day.selected:focus.prevMonthDay, .u-datepicker .flatpickr-day.selected:focus.nextMonthDay,
    .u-datepicker .flatpickr-day.selected:hover.prevMonthDay, .u-datepicker .flatpickr-day.selected:hover.nextMonthDay,
    .u-fileuploader-input__icon,
    .u-summernote-editor .note-btn:focus, .u-summernote-editor .note-btn:hover,
    .bravo_wrap #header.js-header-fix-moment .bravo-more-menu, .bravo_wrap #header.header-white .bravo-more-menu,
    .bravo_wrap #header.js-header-fix-moment .bravo_header ul li:hover > a, .bravo_wrap #header.header-white .bravo_header ul li:hover > a,
    .bravo_wrap #header.js-header-fix-moment .bravo_header ul li:hover > .fa, .bravo_wrap #header.header-white .bravo_header ul li:hover > .fa,
    .u-header--bg-transparent.js-header-fix-moment .u-header__navbar-brand-on-scroll .u-header__navbar-brand-text
    {
        color: {{ $main_color }}!important;
    }

    @media (max-width: 576px){
        .u-header--sub-menu-dark-bg-sm .u-header__sub-menu-nav-link:hover
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (min-width: 576px){
        .u-header--dark-nav-links-sm:not(.bg-dark) .u-header__nav-item:hover .u-header__nav-link
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (max-width: 768px){
        .u-header--sub-menu-dark-bg-md .u-header__sub-menu-nav-link:hover
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (min-width: 768px){
        .u-header--dark-nav-links-md:not(.bg-dark) .u-header__nav-item:hover .u-header__nav-link
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (max-width: 992px){
        .u-header--sub-menu-dark-bg-lg .u-header__sub-menu-nav-link:hover
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (min-width: 992px){
        .u-header--dark-nav-links-lg:not(.bg-dark) .u-header__nav-item:hover .u-header__nav-link
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (max-width: 1200px){
        .u-header--sub-menu-dark-bg-xl .u-header__sub-menu-nav-link:hover
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (min-width: 1200px){
        .u-header--dark-nav-links-xl:not(.bg-dark) .u-header__nav-item:hover .u-header__nav-link
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (max-width: 1480px){
        .u-header--sub-menu-dark-bg-wd .u-header__sub-menu-nav-link:hover
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (min-width: 1480px){
        .u-header--dark-nav-links-wd:not(.bg-dark) .u-header__nav-item:hover .u-header__nav-link
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (max-width: 1199.98px) {
        .u-header--bg-transparent.u-scrolled .scroll-icon i,
        .navbar-expand-xl .u-header__banner-caption:hover, .navbar-expand-xl .u-header__banner-caption:focus
        {
            color: {{ $main_color }}!important;
        }
    }

    @media (max-width: 575.98px) {
        .text-primary-max {
            color: {{ $main_color }}!important;
        }
    }
    @media (max-width: 767.98px) {
        .text-primary-max-sm {
            color: {{ $main_color }}!important;
        }
    }
    @media (max-width: 991.98px) {
        .text-primary-max-md {
            color: {{ $main_color }}!important;
        }
    }
    @media (max-width: 1199.98px) {
        .text-primary-max-lg {
            color: {{ $main_color }}!important;
        }
    }
    @media (max-width: 1479.98px) {
        .text-primary-max-xl {
            color: {{ $main_color }}!important;
        }
    }

    .btn-primary, .u-header.js-header-fix-moment .u-header__last-item-btn .btn[class*=-white],
    .btn-primary.disabled, .u-header.js-header-fix-moment .u-header__last-item-btn .disabled.btn[class*=-white], .btn-primary:disabled, .u-header.js-header-fix-moment .u-header__last-item-btn .btn:disabled[class*=-white],
    .btn-blue-1,
    .btn-blue-1.disabled, .btn-blue-1:disabled,
    .btn-outline-primary,
    .btn-outline-primary:hover,
    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .btn-outline-primary:not(:disabled):not(.disabled).active,
    .show > .btn-outline-primary.dropdown-toggle,
    .btn-outline-blue-1:hover,
    .btn-outline-blue-1:not(:disabled):not(.disabled):active,
    .btn-outline-blue-1:not(:disabled):not(.disabled).active,
    .show > .btn-outline-blue-1.dropdown-toggle,
    .custom-control-input:checked ~ .custom-control-label:before,
    .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label:before,
    .nav-pills .nav-link.active,
    .nav-pills .show > .nav-link,
    .page-item.active .page-link,
    .badge-primary,
    .badge-blue-1,
    .progress-bar,
    .list-group-item.active,
    .tooltip-inner,
    .bg-primary,
    .bg-blue-1,
    .custom-social-share a:hover,
    .u-avatar-image:hover .u-avatar-image-overlay,
    .badge-outline-primary,
    .badge-outline-blue-1,
    .btn-primary:not(label.btn),
    .u-header.js-header-fix-moment .u-header__last-item-btn .btn:not(label.btn)[class*=-white],
    .btn-primary:not(label.btn):not([href]):not(:disabled):not(.disabled),
    .u-header.js-header-fix-moment .u-header__last-item-btn .btn:not(label.btn):not([href]):not(:disabled):not(.disabled)[class*=-white],
    .btn-primary:not([href]),
    .u-header.js-header-fix-moment .u-header__last-item-btn .btn:not([href])[class*=-white],
    .btn-primary:not([href]):not([href]):not(:disabled):not(.disabled),
    .u-header.js-header-fix-moment .u-header__last-item-btn .btn:not([href]):not([href]):not(:disabled):not(.disabled)[class*=-white],
    .btn-primary:hover, .u-header.js-header-fix-moment .u-header__last-item-btn .btn:hover[class*=-white],
    .btn-blue-1:not(label.btn),
    .btn-blue-1:not([href]),
    .btn-blue-1:not(label.btn):not([href]):not(:disabled):not(.disabled), .btn-blue-1:not([href]):not([href]):not(:disabled):not(.disabled),
    .btn-blue-1:hover,
    .btn-custom-toggle-primary:not(:disabled):not(.disabled):active, .btn-custom-toggle-primary:not(:disabled):not(.disabled).active, .btn-custom-toggle-primary:not(:disabled):not(.disabled):active, .btn-custom-toggle-primary:not(:disabled):not(.disabled).active,
    .btn-soft-primary[href]:hover, .btn-soft-primary[href]:focus, .btn-soft-primary[href]:active, .btn-soft-primary[href].active,
    .btn-soft-primary[type]:hover, .btn-soft-primary[type]:focus, .btn-soft-primary[type]:active, .btn-soft-primary[type].active,
    .btn-soft-primary[href]:not(:disabled):not(.disabled):active, .btn-soft-primary[href]:not(:disabled):not(.disabled).active,
    .show > .btn-soft-primary[href].dropdown-toggle,
    .btn-soft-primary[type]:not(:disabled):not(.disabled):active, .btn-soft-primary[type]:not(:disabled):not(.disabled).active,
    .show > .btn-soft-primary[type].dropdown-toggle,
    .btn-soft-blue-1[href]:hover, .btn-soft-blue-1[href]:focus, .btn-soft-blue-1[href]:active, .btn-soft-blue-1[href].active,
    .btn-soft-blue-1[type]:hover, .btn-soft-blue-1[type]:focus, .btn-soft-blue-1[type]:active, .btn-soft-blue-1[type].active,
    .btn-soft-blue-1[href]:not(:disabled):not(.disabled):active, .btn-soft-blue-1[href]:not(:disabled):not(.disabled).active,
    .show > .btn-soft-blue-1[href].dropdown-toggle,
    .btn-soft-blue-1[type]:not(:disabled):not(.disabled):active, .btn-soft-blue-1[type]:not(:disabled):not(.disabled).active,
    .show > .btn-soft-blue-1[type].dropdown-toggle,
    .btn-social:hover,
    .btn-social-dark:hover,
    .u-range-slider .irs-bar,
    .u-range-slider .irs-bar-edge,
    .u-go-to,
    .u-hamburger:hover .u-hamburger__inner,
    .u-hamburger:hover .u-hamburger__inner:before, .u-hamburger:hover .u-hamburger__inner:after,
    .u-hamburger--primary .u-hamburger__inner,
    .u-hamburger--primary .u-hamburger__inner:before, .u-hamburger--primary .u-hamburger__inner:after,
    .u-hamburger--primary:hover .u-hamburger__inner,
    .u-hamburger--primary:hover .u-hamburger__inner:before, .u-hamburger--primary:hover .u-hamburger__inner:after,
    .js-header-fix-moment .u-hamburger--white:hover .u-hamburger__inner,
    .js-header-fix-moment .u-hamburger--white:hover .u-hamburger__inner:before, .js-header-fix-moment .u-hamburger--white:hover .u-hamburger__inner:after,
    .u-media-player:hover .u-media-player__icon--primary, .u-media-player:focus .u-media-player__icon--primary,
    .u-media-viewer__icon,
    .list-pagination .page-item .page-link:hover,
    .list-pagination-1 .page-item .page-link:hover,
    .custom-pagination .page-link:hover,
    .tab-nav-rounded .nav-link.active .icon:before,
    .tab-nav-square .nav-link.active,
    .tab-nav-1-rounded .nav-link.active .icon:before,
    .tab-nav-1-square .nav-link.active,
    .tab-nav-1-inner .nav-link.active,
    .nav-icon .nav-item.active .nav-icon-action,
    .u-slick__arrow:hover,
    .u-slick__arrow-classic:hover,
    .gradient-overlay:after,
    .gradient-overlay-half-bg-blue-light:before,
    .section-title:after,
    .text-hover-primary:hover,
    .u-datepicker .flatpickr-months,
    .u-datepicker .flatpickr-day.today,
    .u-datepicker .flatpickr-day.selected.startRange, .u-datepicker .flatpickr-day.selected.endRange
    {
        background-color: {{ $main_color }}!important;
    }

    .btn-primary, .u-header.js-header-fix-moment .u-header__last-item-btn .btn[class*=-white],
    .btn-primary.disabled, .u-header.js-header-fix-moment .u-header__last-item-btn .disabled.btn[class*=-white], .btn-primary:disabled, .u-header.js-header-fix-moment .u-header__last-item-btn .btn:disabled[class*=-white]
    .btn-blue-1,
    .btn-blue-1.disabled, .btn-blue-1:disabled,
    .btn-outline-primary,
    .btn-outline-primary:hover,
    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .btn-outline-primary:not(:disabled):not(.disabled).active,
    .show > .btn-outline-primary.dropdown-toggle,
    .btn-outline-blue-1,
    .btn-outline-blue-1:hover,
    .btn-outline-blue-1:not(:disabled):not(.disabled):active,
    .btn-outline-blue-1:not(:disabled):not(.disabled).active,
    .show > .btn-outline-blue-1.dropdown-toggle,
    .custom-control-input:checked ~ .custom-control-label:before,
    .custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label:before,
    .page-item.active .page-link,
    .list-group-item.active,
    .border-primary,
    .border-blue-1,
    .custom-social-share a:hover,
    .btn-primary:not(label.btn),
    .u-header.js-header-fix-moment .u-header__last-item-btn .btn:not(label.btn)[class*=-white],
    .btn-primary:not(label.btn):not([href]):not(:disabled):not(.disabled),
    .u-header.js-header-fix-moment .u-header__last-item-btn .btn:not(label.btn):not([href]):not(:disabled):not(.disabled)[class*=-white],
    .btn-primary:not([href]),
    .u-header.js-header-fix-moment .u-header__last-item-btn .btn:not([href])[class*=-white],
    .btn-primary:not([href]):not([href]):not(:disabled):not(.disabled),
    .u-header.js-header-fix-moment .u-header__last-item-btn .btn:not([href]):not([href]):not(:disabled):not(.disabled)[class*=-white],
    .btn-primary:hover, .u-header.js-header-fix-moment .u-header__last-item-btn .btn:hover[class*=-white],
    .btn-blue-1:not(label.btn),
    .btn-blue-1:not([href]),
    .btn-blue-1:not(label.btn):not([href]):not(:disabled):not(.disabled), .btn-blue-1:not([href]):not([href]):not(:disabled):not(.disabled),
    .btn-blue-1:hover,
    .btn-custom-toggle-primary:hover,
    .btn-custom-toggle-primary:not(:disabled):not(.disabled):active, .btn-custom-toggle-primary:not(:disabled):not(.disabled).active, .btn-custom-toggle-primary:not(:disabled):not(.disabled):active, .btn-custom-toggle-primary:not(:disabled):not(.disabled).active,
    .btn-social:hover,
    .btn-social-dark:hover,
    .checkbox-outline__input:checked ~ .checkbox-outline__label,
    .nav-choose .nav-link.active,
    .tab-nav-rounded .nav-link.active .icon:before,
    .tab-nav-1-rounded .nav-link.active .icon:before,
    .tab-nav-1-inner .nav-link.active,
    .u-slick-bordered-primary .slick-current .card,
    .u-slick__pagination li.slick-active span,
    .u-datepicker .flatpickr-day.selected
    {
        border-color: {{ $main_color }}!important;
    }

    .bs-tooltip-top .arrow:before,
    .bs-tooltip-auto[x-placement^=top] .arrow:before,
    .navbar-expand .u-header__navbar-nav .u-header__sub-menu,
    .navbar-expand-sm .u-header__navbar-nav .u-header__sub-menu,
    .navbar-expand-md .u-header__navbar-nav .u-header__sub-menu,
    .navbar-expand-lg .u-header__navbar-nav .u-header__sub-menu,
    .navbar-expand-xl .u-header__navbar-nav .u-header__sub-menu,
    .navbar-expand-wd .u-header__navbar-nav .u-header__sub-menu
    {
        border-top-color: {{$main_color}}!important;
    }

    .bs-tooltip-right .arrow:before,
    .bs-tooltip-auto[x-placement^=right] .arrow:before
    {
        border-right-color: {{$main_color}};
    }

    .bs-tooltip-bottom .arrow:before,
    .bs-tooltip-auto[x-placement^=bottom] .arrow:before,
    .dropdown-custom .dropdown-nav-link.active,
    .nav-classic .nav-link.active
    {
        border-bottom-color: {{$main_color}};
    }

    .bs-tooltip-left .arrow:before,
    .bs-tooltip-auto[x-placement^=left] .arrow:before,
    .navbar-expand .u-header__sub-menu:not(.u-header__promo),
    .navbar-expand-sm .u-header__sub-menu:not(.u-header__promo),
    .navbar-expand-md .u-header__sub-menu:not(.u-header__promo),
    .navbar-expand-lg .u-header__sub-menu:not(.u-header__promo),
    .navbar-expand-xl .u-header__sub-menu:not(.u-header__promo),
    .navbar-expand-wd .u-header__sub-menu:not(.u-header__promo),
    .u-header-collapse__submenu .u-header-collapse__nav-list,
    .u-header-collapse__submenu-list,
    .custom-dropdown .dropdown-toggle-collapse[aria-expanded=true],
    .tab-nav-list .nav-link.active,
    .tab-nav-list .nav-link.active i, .tab-nav-list .nav-link.active span,
    .tab-nav-1-list .nav-link.active,
    .list-tab .list-link:active
    {
        border-left-color: {{$main_color}};
    }

    .u-slick-bordered-primary .slick-current .card .testimonial-quote text, .u-slick-bordered-primary .slick-current .card .testimonial-quote path,
    .fill-primary
    {
        fill: {{ $main_color }}
    }

    .stop-color-primary
    {
        stop-color: {{ $main_color }}!important;
    }

    .stroke-primary {
        stroke: {{ $main_color }}!important;
    }

    {!! (setting_item('style_custom_css')) !!}
    {!! (setting_item_with_lang_raw('style_custom_css')) !!}
