@php
    use App\Models\Maker;
    use Carbon\Carbon;

    $makers = Maker::query()->with('media')->orderBy('name','asc')->get();
@endphp
<nav class="nav-container">
    <div class="menu-toggle">
        <input type="checkbox" id="toggle" class="input-toggler">
        <label for="toggle" class="menu-toggler">
            <span class="menu-toggler-line"></span>
            <span class="menu-toggler-line line-sp"></span>
            <span class="menu-toggler-line"></span>
        </label>
        <aside class="sidebar">
            <div class="container-fluid h-100">
                <div class="sidebar-menu">
                    <nav class="navbar fixed-top ps-md-3">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img class="navbar-brand-logo" src="{{ settingImage('logo') }}" alt="RoadStone KSA"></a>
                            <div class="d-flex ms-auto">
                                <div class="pe-4">
                                    <a rel="alternate" hreflang="ar"
                                       href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                                       class="lang-link lang-link-ar">
                                        {{ ucfirst('ar') }}
                                    </a>
                                    <span class="curved-line">&sol;</span>
                                    <a rel="alternate" hreflang="en"
                                       href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                                       class="lang-link lang-link-ar">
                                        {{ ucfirst('en') }}
                                    </a>
                                </div>
                                <span class="lang-nav link" href="#">
                                    @if(app()->getLocale() == 'ar')
                                        <img src="{{ settingImage('arabic-flag') }}" alt="Arabic-flag">
                                    @elseif(app()->getLocale() == 'en')
                                        <img src="{{ settingImage('english-flag') }}" alt="english-flag">
                                    @endif
                              </span>
                            </div>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-5 col-lg-3 d-none d-md-block ps-0">
                            <div class="nav-menu-img h-100">
                                <img src="{{ settingImage('menu-image') }}" alt="header menu image"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 col-lg-9 d-md-flex align-items-center">
                            <div class="row menu-container justify-content-between">
                                <div class="col-md-6">
                                    <ul class="sidebar-menu-content-item list-unstyled my-item mt-md-5">
                                        <li class="nav-item">
                                            <a class="nav-link link-active px-3" href="{{ route('home') }}">
                                                {{ trans('website.menu.home') }}
                                            </a>
                                        </li>
                                        <li class="nav-item drowp-item">
                                            <a class="nav-link sup-menu link-active px-3" href="{{ route('tires') }}">
                                                {{ trans('website.menu.tires') }}
                                            </a>
                                            <ul class="drowp-item-container list-unstyled">
                                                @forelse($types as $item)
                                                    <li class="tire-item">
                                                        <a class="tire-link link-active"
                                                           href="{{ route('tires.type', $item->slug) }}">
                                                            {{ $item->name }}
                                                        </a>
                                                    </li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </li>
                                        <li class="nav-item drowp-item">
                                            <a class="nav-link sup-menu link-active px-3"
                                               href="{{ route('retailer') }}">
                                                {{ trans('website.menu.retailers') }}
                                            </a>
                                            <div class="drowp-item-container mt-5 d-flex justify-content-around">
                                                <ul class="list-unstyled">
                                                    @forelse($cities as $item)
                                                        <li class="city-item">
                                                            <a class="city-link link-active"
                                                               href="{{ route('retailer') }}">
                                                                {{ $item->name }}
                                                            </a>
                                                        </li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-active px-3" href="{{ route('about') }}">
                                                {{ trans('website.menu.about') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-active px-3" href="{{ route('blogs') }}">
                                                {{ trans('website.menu.blog') }}
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link link-active px-3" href="{{ route('contact') }}">
                                                {{ trans('website.menu.contact') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-3 d-none d-md-block">
                                    <div class="head-office">
                                        <h5 class="head-office-title">{{ trans('website.menu.head-office') }}</h5>
                                        <p class="head-office-desc">
                                            {!! trans('website.global.company-address') !!}
                                        </p>
                                    </div>
                                    <div class="mobile-number">
                                        <h5 class="mobile-number-title">{{ trans('website.menu.mobile') }}</h5>
                                        <a href="tel:{{ settingText('phone', 'text') }}"
                                           class="mobile-number-content">{{ settingText('phone', 'text') }}</a>
                                    </div>
                                    <div class="email-address">
                                        <h5 class="email-address-title">{{ trans('website.menu.email') }}</h5>
                                        <a href="mailto:{{ settingText('email', 'text') }}"
                                           class="email-address-content">{{ settingText('email', 'text') }}</a>
                                    </div>
                                </div>
                                <div
                                    class="col-12 d-flex flex-column flex-md-row justify-content-between align-self-end align-items-md-baseline position-relative pb-2">
                                    <div class="copy-right text-center">
                                        COPYRIGHT© {{ Carbon::now()->format('Y') }} Arabian Tires Group. ALL
                                        RIGHTS
                                        RESERVED.
                                    </div>
                                    <div class="sidebar-social">
                                        <ul class="social-container list-inline text-center">
                                            <li class="social-item list-unstyled list-inline-item">
                                                <a href="{{ settingText('facebook', 'text') }}">
                                                    <img class="social-icon" src="{{ mix('assets/imgs/facebook.png') }}"
                                                         alt="facebook icon">
                                                </a>
                                            </li>
                                            <li class="social-item list-unstyled list-inline-item">
                                                <a href="{{ settingText('instagram', 'text') }}">
                                                    <img class="social-icon"
                                                         src="{{ mix('assets/imgs/instagram.png') }}"
                                                         alt="instagram icon">
                                                </a>
                                            </li>
                                            <li class="social-item list-unstyled list-inline-item">
                                                <a href="{{ settingText('twitter', 'text') }}">
                                                    <img class="social-icon" src="{{ mix('assets/imgs/twitter.png') }}"
                                                         alt="twitter icon">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-terms">
                                        <ul class="footer-terms list-inline text-center m-0">
                                            <li class="footer-terms-item list-unstyled list-inline-item">
                                                <a class="nav-link menu-link"
                                                   href="{{ route('privacy') }}">{{ trans('website.menu.privacy') }}</a>
                                            </li>
                                            <li class="footer-terms-item list-unstyled list-inline-item">
                                                <a class="nav-link menu-link"
                                                   href="{{ route('terms') }}">{{ trans('website.menu.terms') }}</a>
                                            </li>
                                            {{--                                            <li class="footer-terms-item list-unstyled list-inline-item">--}}
                                            {{--                                                <a class="nav-link menu-link" href="#">Terms Of Conditions</a>--}}
                                            {{--                                            </li>--}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <div class="side-nav">
        <ul class="side-nav-content list-unstyled">
            <li class="side-nav-item nav-item">
                <a class="side-nav-link nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="#">
                    <img src="{{ mix('assets/imgs/svgexport-6 (73).png') }}" class="pb-2" alt="find tire icon">
                    <span class="side-nav-link-title">Find Your Tire</span>
                </a>
            </li>
            <hr class="hr-line">
            <li class="side-nav-item nav-item">
                <a class="side-nav-link nav-link" href="{{ route('retailer') }}">
                    <span class="side-nav-link-title">Find Nearest Retailers</span>
                    <img src="{{ mix('assets/imgs/svgexport-6 (80).png') }}" class="nearset-icon pb-2"
                         alt="find nearset retailers icon">
                </a>
            </li>
        </ul>
        <div class="contact">
            <a class="contact-link" href="{{ settingText('whatsapp', 'text') }}">
                <img src="{{ mix('assets/imgs/whatsappIcon.png') }}" alt="Whatsapp icon">
            </a>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
         data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="container-fluid">
            <div class="modal-dialog">
                <div class="modal-content px-4">
                    <div class="modal-header border-0 pb-0">
                        <h2 class="modal-title " id="staticBackdropLabel">{{ trans('website.search.title') }}</h2>
                        <button type="button" class="btn-modal-close border-0" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="ps-3 py-0">
                        <small class="text-note">{{ trans('website.search.description') }}</small>
                    </div>
                    <div class="modal-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-search btn active ps-0" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true">
                                    {{ trans('website.search.search-maker') }}
                                </button>
                                <button class="nav-search btn" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">
                                    {{ trans('website.search.search-size') }}
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <div class="search-marker">
                                    <form method="get" action="{{ route('search.maker') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="select-marker my-4" id="myModal">
                                                    <select id="maker" name="maker" class="cars-marker form-control">
                                                        {{--                                                        <option value="{{ null }}" selected disabled>--}}
                                                        {{--                                                            Choose a maker--}}
                                                        {{--                                                        </option>--}}
                                                        {{--                                                        @forelse($makers as $item)--}}
                                                        {{--                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>--}}
                                                        {{--                                                        @empty--}}
                                                        {{--                                                        @endforelse--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="owl-carousel owl-theme marker-logo" id="mar">
                                                    @forelse($makers as $item)
                                                        @if($item->image)
                                                            <div class="marker-logo-selector">
                                                                <label for="{{ $item->name }}"
                                                                       class="form-check-label {{ $loop->first ? 'link-active' : '' }}">
                                                                    {{ $item->image->img()->attributes(['alt' => $item->name]) }}
                                                                </label>
                                                                <input id="{{ $item->name }}" class="form-check-car"
                                                                       name="checkCar"
                                                                       type="radio">
                                                            </div>
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="select-model my-4">
                                                    <select id="model" name="model" class="marker-mode form-control">
                                                        {{--                                                        <option value="" selected disabled>Model</option>--}}
                                                        {{--                                                        <option value="1">x1</option>--}}
                                                        {{--                                                        <option value="2">y</option>--}}
                                                        {{--                                                        <option value="3">z</option>--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 modal-footer">
                                                <button type="button" class="btn btn-cancel me-3"
                                                        data-bs-dismiss="modal">cancel
                                                </button>
                                                <button type="search" class="btn btn-search">search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                 aria-labelledby="nav-profile-tab">
                                <div class="search-size">
                                    <small class="text-note">{{ trans('website.search.size-description') }}</small>
                                    <form action="{{ route('search.size') }}" method="get">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="select-marker my-4" id="model-size">
                                                    <select id="width-tire" name="width"
                                                            class="width-size-search form-control">
                                                        {{--                                                        <option value="" selected disabled>Section Width</option>--}}
                                                        {{--                                                        <option value="1">205 or 215 mm</option>--}}
                                                        {{--                                                        <option value="2">205 or 215 mm</option>--}}
                                                        {{--                                                        <option value="3">215 or 225 mm</option>--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="select-model my-4" id="model-size">
                                                    <select id="tire-aspect" name="ratio"
                                                            class="tire-aspect-ratio form-control">
                                                        {{--                                                        <option value="" selected disabled>Aspect Ratio</option>--}}
                                                        {{--                                                        <option value="1">P225/70R16 91S</option>--}}
                                                        {{--                                                        <option value="2">P225/70R16 91S</option>--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="select-model" id="model-size">
                                                    <select id="tire-rime" name="rim"
                                                            class="tire-rime-dimeter form-control">
                                                        {{--                                                        <option value="" selected disabled>Rim Diameter</option>--}}
                                                        {{--                                                        <option value="1">195/65 R15</option>--}}
                                                        {{--                                                        <option value="2">195/65 R15</option>--}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 modal-footer mt-7">
                                                <button type="button" class="btn btn-cancel me-3"
                                                        data-bs-dismiss="modal">cancel
                                                </button>
                                                <button type="submit" class="btn btn-search">search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

