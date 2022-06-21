@extends('layouts.site')
@section('title', 'Roadstone KSA - About Roadstone')
@section('og_title', 'Roadstone KSA - About Roadstone')
@section('seo_description',  trans('website.seo.about-seo-description') )
@section('og_description',  trans('website.seo.about-seo-description') )
@section('seo_keywords', trans('website.seo.about-seo-keywords') )

@section('content')
    <!-- start header -->
    <header class="about-header">
        <nav class="navbar fixed-top ps-md-3">
            <div class="container-fluid">
                <a class="navbar-brand"  href="{{ route('home') }}">
                    <img class="navbar-brand-logo" src="{{ settingImage('logo') }}" alt="RoadStone Logo">
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
        <div class="header-img" style="background-image:url('{{ settingImage('about-breadcrumb') }}');"></div>
    </header>
    <!-- end header -->

    @include('includes.nav')

    <main class="about-main">
        <!-- start section about-head -->
        <section class="about-head-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('home') }}">{{ trans('website.menu.home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('website.menu.about') }}</li>
                    </ol>
                </nav>
                <header>
                    <h1 class="about-heading">{{ trans('website.menu.about') }}</h1>
                </header>
                <div class="aricale-container">
                    <article class="aricale-about">
                        <p class="about-roadstone">
                            {{ settingText('about-first-desc', 'shord_description') }}
                        </p>
                    </article>
                    <article class="artical-item">
                        {!! settingText('about-long-desc', 'long_description') !!}
                    </article>
                </div>
            </div>
        </section>
        <!-- end section about-head -->
        <!-- satrt section about-container -->
        <section class="about-container">
            <div class="container">
                <div class="row roadstone-about">
                    <div class="col-md-6 order-2 order-md-1 me-auto roadstone-about-desc">
                        <h2 class="story-heading about-heading-roadstone">{{ settingText('about-story', 'text') }}</h2>
                        <p class="story-desc about-desc-roadstone">
                            {{ settingText('about-story', 'short_description') }}
                        </p>
                    </div>
                    <div class="col-md-6 order-1 order-md-2 roadstone-img">
                        <img class="w-100" src="{{ settingImage('about-story') }}" alt="{{ settingText('about-story', 'text') }}">
                    </div>
                </div>
                <div class="row roadstone-about">
                    <div class="col-md-6 order-2 roadstone-about-desc">
                        <h2 class="believe-heading about-heading-roadstone">{{ settingText('about-reason', 'text') }}</h2>
                        <p class="believe-desc about-desc-roadstone">
                            {{ settingText('about-reason', 'short_description') }}
                        </p>
                    </div>
                    <div class="col-md-6 order-1 me-auto">
                        <img class="w-100" src="{{ settingImage('about-reason') }}" alt="{{ settingText('about-reason', 'text') }}">
                    </div>
                </div>
                <div class="row roadstone-about">
                    <div class="col-md-6 order-2 order-md-1 me-auto roadstone-about-desc">
                        <h2 class="vision-heading about-heading-roadstone">{{ settingText('about-vision', 'text') }}</h2>
                        <p class="story-desc about-desc-roadstone">
                            {{ settingText('about-vision', 'short_description') }}
                        </p>
                    </div>
                    <div class="col-md-6 order-1 order-md-2 roadstone-img">
                        <img class="w-100" src="{{ settingImage('about-vision') }}" alt="{{ settingText('about-vision', 'text') }}">
                    </div>
                </div>
            </div>
        </section>
        <!-- end section about-container -->
    </main>

    @include('includes.footer')
@endsection
