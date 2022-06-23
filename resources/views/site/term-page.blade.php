@extends('layouts.site')
@section('title', 'Roadstone KSA - Terms & Conditions')
@section('og_title', 'Roadstone KSA - Terms & Conditions')
@section('seo_description',  trans('website.seo.term-seo-description') )
@section('og_description',  trans('website.seo.term-seo-description') )
@section('seo_keywords', trans('website.seo.term-seo-keywords') )

@section('content')
    <!-- start header -->
    <header class="about-header">
        <nav class="navbar fixed-top ps-md-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
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
        <div class="header-img" style="background-image:url('{{ settingImage('term-page') }}');"></div>
    </header>
    <!-- end header -->

    @include('includes.nav')

    <main class="about-main">
        <!-- start section about-head -->
        <section class="about-head-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                       href="{{ route('home') }}">{{ trans('website.menu.home') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('website.menu.terms') }}</li>
                    </ol>
                </nav>
                <header>
                    <h1 class="about-heading">{{ settingText('term-page', 'text') }}</h1>
                </header>
                <div class="aricale-container">
                    <article class="aricale-about">
                        <p class="about-roadstone">
                            {{ settingText('term-page', 'shord_description') }}
                        </p>
                    </article>
                </div>
            </div>
        </section>
        <!-- end section about-head -->
        <!-- satrt section about-container -->
        <section class="about-container">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        {!! settingText('term-page', 'long_description') !!}
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('includes.footer')
@endsection
