@extends('layouts.site')
@section('title', 'Roadstone KSA - Homepage')
@section('og_title', 'Roadstone KSA - Homepage')
@section('seo_description',  trans('website.seo.retailer-seo-description') )
@section('og_description',  trans('website.seo.retailer-seo-description') )
@section('seo_keywords', trans('website.seo.retailer-seo-keywords') )

@push('custom-css')
    <style>
        iframe {
            width: 100% !important;
            height: 550px !important;
        }
    </style>
@endpush

@section('content')

    <header class="retailers-header">
        <nav class="navbar fixed-top ps-md-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="navbar-brand-logo" src="{{ settingImage('logo') }}" alt="RoadStone KSA"/>
                </a>
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
        <div class="retailers-header-bg"
             style="background-image: url({{ settingImage('retailer-breadcrumb') }});"></div>
    </header>

    @include('includes.nav')

    <main class="retailers-main">
        <section class="retailers-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="{{ route('home') }}">
                                {{ trans('website.menu.home') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active"
                            aria-current="page">{{ trans('website.menu.retailers') }}</li>
                    </ol>
                </nav>
                <section class="retailers-content">
                    <header>
                        <h1 class="retailers-heading">{{ trans('website.menu.retailers') }}</h1>
                    </header>
                    <div class="retailers-cities">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @forelse($cities as $item)
                                <li class="col-md-4 nav-item" role="presentation">
                                    <div class="city-link {{ $loop->first ? 'active' : '' }}"
                                         id="pills-{{ $item->slug }}-tab" data-bs-toggle="pill"
                                         data-bs-target="#pills-{{ $item->slug }}" role="tab"
                                         aria-controls="pills-{{ $item->slug }}"
                                         aria-selected="{{ $loop->first ? 'true' : '' }}">
                                        <div
                                            class="retailersCity-content d-flex justify-content-between align-items-center">
                                            <div class="city-cart d-flex align-items-center">
                                                {{ $item->image->img()->attributes(['class' => 'city-img', 'alt' => $item->name]) }}
                                                <h4 class="city-name">{{ $item->name}}</h4>
                                            </div>
                                            <div class="btnFindStore-container">
                                                <a href="#" class="findStore-link me-3">
                                                    <span class="btn-findStore me-2">{{ trans('website.retailer.find') }}</span>
                                                    <img src="{{ mix('assets/imgs/readmore.png') }}"
                                                         class="btn-icon"
                                                         alt="Read More Arrow">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </section>
                <section class="cities">
                    <div class="tab-content" id="pills-tabContent">
                        @forelse($cities as $item)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                 id="pills-{{$item->slug}}" role="tabpanel"
                                 aria-labelledby="pills-{{$item->slug}}-tab">
                                <div class="cityBranch-content">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <h2 class="city-title">{{ $item->name }}</h2>
                                            <div class="city-branches nav-pills" id="pills-tab" role="tablist">
                                                <ul class="nav" id="myTab" role="tablist">
                                                    @forelse($item->locations as $location)
                                                        <li class="nav-item mb-2" style="width:100%;"
                                                            role="presentation">
                                                            <div class="nav-link {{ $loop->first ? 'active': '' }}"
                                                                 id="gfirst-tab"
                                                                 data-bs-toggle="tab"
                                                                 data-bs-target="#gfb-{{Str::slug($location->name)}}-tab"
                                                                 type="button"
                                                                 role="tab"
                                                                 aria-controls="gfb-{{Str::slug($location->name)}}-tab"
                                                                 aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                                <div class="cityBranches-name">
                                                                    <h5 class="branch-name">{{ $location->name }}</h5>
                                                                    <p class="branch-link">
                                                                        {{ $location->address }}
                                                                    </p>
                                                                    <a href="tel:{{ $location->phone }}"
                                                                       class="branch-link">
                                                                        {{ $location->phone }}
                                                                    </a>
                                                                    <p class="branch-link">
                                                                        {{ $location->working_hour }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @empty
                                                    @endforelse
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="tab-content" id="myTabContent">
                                                @forelse($item->locations as $location)
                                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                                         id="gfb-{{Str::slug($location->name)}}-tab" role="tabpanel">
                                                        <div class="city-location text-center">
                                                            {!! $location->map !!}
                                                        </div>
                                                    </div>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
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
