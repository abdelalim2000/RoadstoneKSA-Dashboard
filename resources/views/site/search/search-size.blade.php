@extends('layouts.site')
@section('title', 'Roadstone KSA - Tires')
@section('og_title', 'Roadstone KSA - Tires' )
@section('seo_description',  trans('website.seo.tire-seo-description') )
@section('og_description',  trans('website.seo.tire-seo-description') )
@section('seo_keywords', trans('website.seo.tire-seo-keywords') )

@section('content')

    <header class="passenger-header">
        <nav class="navbar fixed-top ps-md-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="navbar-brand-logo" src="{{ settingImage('logo') }}" alt="RoadStone Logo"></a>
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
                    <span class="lang-nav link">
                        @if(app()->getLocale() == 'ar')
                            <img src="{{ settingImage('arabic-flag') }}" alt="Arabic-flag">
                        @elseif(app()->getLocale() == 'en')
                            <img src="{{ settingImage('english-flag') }}" alt="english-flag">
                        @endif
                    </span>
                </div>
            </div>
        </nav>
        <div class="header-passenger" style="background-image:url({{ settingImage('tire-breadcrumb') }});"></div>
    </header>

    @include('includes.nav')

    <main class="passenger-main">

        <section class="passenger-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                       href="{{ route('home') }}">{{ trans('website.menu.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('website.menu.tires') }}</li>
                    </ol>
                </nav>
                <section class="pass-tires">
                    <header>
                        <h1 class="about-heading">{{ trans('website.menu.search-size-tires') }}</h1>
                    </header>
                    <div class="row pass-car">
                        @forelse($tires as $item)
                            <div class="col-md-6 pe-3 pb-4">
                                <div class="pass-car-tire shadow-sm " style="min-height: 645px;">
                                    <div class="sport-tire-content">
                                        {{ $item->tire_logo ? $item->tire_logo->img()->attributes(['class' => 'w-50', 'alt' => $item->title]) : '' }}
                                        <h2 class="sport-tire-heading">
                                            {{ $item->title }}
                                        </h2>
                                    </div>
                                    <div class="sport-performance">
                                        <div class="sport-performance-container">
                                            <ul class="sport-tire-item ps-3">
                                                @forelse($item->tire_features as $feature)
                                                    <li class="sport-tire-performance">{{ $feature->name }}</li>
                                                @empty
                                                @endforelse
                                            </ul>
                                            @if($item->dry_performance || $item->dry_performance != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.dry-performance') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->dry_performance }}%"
                                                             aria-valuenow="{{ 20 * $item->dry_performance }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->wet_performance || $item->wet_performance != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.wet-performance') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->wet_performance }}%"
                                                             aria-valuenow="{{ 20 * $item->wet_performance }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->rolling_resistance || $item->rolling_resistance != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.rolling-resistance') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->rolling_resistance }}%"
                                                             aria-valuenow="{{ 20 * $item->rolling_resistance }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->comfort_noise || $item->comfort_noise != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.comfort-noise') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->comfort_noise }}%"
                                                             aria-valuenow="{{ 20 * $item->comfort_noise }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->wear || $item->wear != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.wear') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->wear }}%"
                                                             aria-valuenow="{{ 20 * $item->wear }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->snow || $item->snow != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.snow') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->snow }}%"
                                                             aria-valuenow="{{ 20 * $item->snow }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->fuel_consumption || $item->fuel_consumption != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.fuel-consumption') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->fuel_consumption }}%"
                                                             aria-valuenow="{{ 20 * $item->fuel_consumption }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->durability || $item->durability != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.durability') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->durability }}%"
                                                             aria-valuenow="{{ 20 * $item->durability }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->wet_handling || $item->wet_handling != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.wet-handling') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->wet_handling }}%"
                                                             aria-valuenow="{{ 20 * $item->wet_handling }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->wet_grip || $item->wet_grip != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.wet-grip') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->wet_grip }}%"
                                                             aria-valuenow="{{ 20 * $item->wet_grip }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->aquaplaning || $item->aquaplaning != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.aquaplaning') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->aquaplaning }}%"
                                                             aria-valuenow="{{ 20 * $item->aquaplaning }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if($item->ice || $item->ice != 0)
                                                <div class="progress-container">
                                                    <h4 class="progress-heading">{{ trans('website.tire.ice') }}</h4>
                                                    <div class="progress progress-content">
                                                        <div class="progress-bar bg-progress" role="progressbar"
                                                             style="width: {{ 20 * $item->ice }}%"
                                                             aria-valuenow="{{ 20 * $item->ice }}"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="sport-img">
                                            <a href="{{ route('tires.show', $item->slug) }}">
                                                {{ $item->thumb ? $item->thumb->img()->attributes(['class' => 'w-100','height' => '415', 'alt' => $item->title]) : '' }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="explore-more">
                                        <a href="{{ route('tires.show', $item->slug) }}">
                                            <button type="button"
                                                    class="btn btn-explore ps-0">{{ trans('website.global.read-more') }}</button>
                                            {{--<img src="{{ mix('assets/imgs/svgexport.png') }}" alt="">--}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22.883" height="17.02"
                                                 viewBox="0 0 22.883 17.02" class="arrow-right">
                                                <defs>
                                                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                                                    gradientUnits="objectBoundingBox">
                                                        <stop offset="0" stop-color="#ed1c24" stop-opacity="0"/>
                                                        <stop offset="1" stop-color="#ed1c24"/>
                                                    </linearGradient>
                                                </defs>
                                                <g class="arrows-right" id="svgexport-6_74_"
                                                   data-name="svgexport-6 (74)"
                                                   transform="translate(12.226 17.02) rotate(-90)">
                                                    <path class="path1" id="Path_422" data-name="Path 422"
                                                          d="M8.51,191.633l-6.172-6.172L0,187.8l8.51,8.51,8.51-8.51-2.338-2.338Zm0,0"
                                                          transform="translate(0 -185.652)"
                                                          fill="url(#linear-gradient)"/>
                                                    <path class="path2" id="Path_423" data-name="Path 423"
                                                          d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0"
                                                          transform="translate(0 -6.839)" opacity="0.6"
                                                          fill="url(#linear-gradient)"/>
                                                    <path class="path3" id="Path_444" data-name="Path 444"
                                                          d="M17.02,2.838,14.682.5,8.51,6.672,2.338.5,0,2.838l8.51,8.51Zm0,0"
                                                          transform="translate(0 -12.726)" opacity="0.2"
                                                          fill="url(#linear-gradient)"/>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </section>
            </div>
        </section>

    </main>

    @include('includes.footer')

@endsection
