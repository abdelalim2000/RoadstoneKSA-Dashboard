@extends('layouts.site')
@section('title', 'Roadstone KSA - '. $article->title)
@section('og_title', 'Roadstone KSA - '. $article->title)
@section('seo_description',  $article->seo_description )
@section('og_description',  $article->seo_description )
@section('seo_keywords', $article->seo_keywords )

@push('custom-css')
    <style>
        p {
            color: #BCBEC0 !important;
        }
        span {
            color: #BCBEC0 !important;
        }
    </style>
@endpush

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

    <main class="blog-details">
        <!-- start section blog-details -->
        <section class="blog-details-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                       href="{{ route('home') }}">{{ trans('website.menu.home') }}</a>
                        </li>
                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                                       href="{{ route('blogs') }}">{{ trans('website.menu.blog') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
                    </ol>
                </nav>
                <section class="blog-details-bg">
                    <header>
                        <h1 class="blog-details-heading">{{ $article->title }}</h1>
                    </header>
                    <div class="product-size-markings">

                        {{ $article->image->img()->attributes(['class' => 'img-fluid', 'style' => 'width:100%;height:550px;object-fit:cover;', 'alt' => $article->alt]) }}

                        <article>
                            <div
                                class="product-data">{{ \Carbon\Carbon::make($article->created_at)->format('dM Y') }}</div>
                            {!! $article->article !!}
                        </article>
                    </div>
                </section>
            </div>
        </section>

    </main>

    @include('includes.footer')
@endsection
