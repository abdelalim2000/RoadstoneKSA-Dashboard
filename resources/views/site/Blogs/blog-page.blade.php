@extends('layouts.site')
@section('title', 'Roadstone KSA - Guide & Blogs')
@section('og_title', 'Roadstone KSA - Guide & Blogs')
@section('seo_description',  trans('website.seo.blog-seo-description') )
@section('og_description',  trans('website.seo.blog-seo-description') )
@section('seo_keywords', trans('website.seo.blog-seo-keywords') )

@section('content')

    <header class="guide-header">
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
        <div class="guide-header-bg" style="background-image:url('{{ settingImage('blog-breadcrumb') }}');"></div>
    </header>

    @include('includes.nav')

    <main class="guide-main">
        <!-- start section guide -->
        <section class="guide-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                       href="{{ route('home') }}">{{ trans('website.menu.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('website.menu.blog') }}</li>
                    </ol>
                </nav>
                <section class="our-recent-news">
                    <header>
                        <h1 class="recent-news-heading">{{ trans('website.blog.header') }}</h1>
                    </header>
                    <div class="tire-size-blogs">
                        <div class="row">
                            @forelse($articles as $item)
                                <div class="col-md-6 col-lg-4 mb-5">
                                    <div class="tire-size-container">
                                        <a href="{{ route('blogs.show', $item->slug) }}" class="text-decoration-none">
                                            <div class="img-tire-content">
                                                {{ $item->image->img()->attributes(['class' => 'w-100','alt' => $item->alt]) }}
                                            </div>
                                            <div class="tire-size-details">
                                                <h2 class="tire-size-heading">{{ $item->title }}</h2>
                                                <p class="tire-size-desc">
                                                    {{ $item->description }}
                                                </p>
                                                <a href="{{ route('blogs.show', $item->slug) }}" class="read-more">
                                                    <span
                                                        class="more-tire me-3">{{ trans('website.global.read-more') }}</span>
                                                    <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="22.883"
                                                         height="17.02" viewBox="0 0 22.883 17.02">
                                                        <defs>
                                                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                                            y2="1" gradientUnits="objectBoundingBox">
                                                                <stop offset="0" stop-color="#fff" stop-opacity="0"/>
                                                                <stop offset="1" stop-color="#fff"/>
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
                                        </a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        {{ $articles->links('includes.custom-pagination') }}
                    </div>
                </section>
            </div>
        </section>

    </main>

    @include('includes.footer')

@endsection
