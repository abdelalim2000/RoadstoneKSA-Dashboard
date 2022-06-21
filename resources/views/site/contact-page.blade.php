@extends('layouts.site')
@section('title', 'Roadstone KSA - Contact Us')
@section('og_title', 'Roadstone KSA - Contact Us')
@section('seo_description',  trans('website.seo.contact-seo-description') )
@section('og_description',  trans('website.seo.contact-seo-description') )
@section('seo_keywords', trans('website.seo.contact-seo-keywords') )

@section('content')

    <header class="contactUS-header">
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
        <div class="contactUS-header-bg" style="{{ settingImage('contact-breadcrumb') }}"></div>
    </header>

    @include('includes.nav')

    <main class="contact-us">

        <section class="contactUs-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="{{ route('home') }}">
                                {{ trans('website.menu.home') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('website.menu.contact') }}</li>
                    </ol>
                </nav>
                <section class="contactus-bg">
                    <header>
                        <h1 class="contactUs-heading">drop us an email</h1>
                    </header>
                    <div class="row">
                        <div class="col-sm-7  col-md-8 col-lg-6">
                            <form action="{{ route('contact.store') }}" method="post" novalidate>
                                @csrf
                                <div class="row">

                                    <div class="col-md-10 col-lg-6 mb-4">
                                        <input type="text"
                                               class="form-control input-name @error('name') is-invalid @enderror"
                                               aria-describedby="nameHelp" name="name"
                                               placeholder="{{ trans('website.form.full-name') }}"
                                               value="{{ old('name') }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-10 col-lg-6 mb-4">
                                        <input type="email"
                                               class="form-control input-email @error('email') is-invalid @enderror"
                                               name="email"
                                               placeholder="{{ trans('website.form.email') }}"
                                               value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-10 col-lg-6 mb-4">
                                        <select name="contact_type_id"
                                                class="form-control @error('contact_type_id') is-invalid @enderror"
                                                style="background-color:#1c1b24;border: 1px solid #f5f5f7;border-radius: 0;color: #f5f5f7;font-size: 14px;">
                                            <option disabled selected
                                                    value="{{ null }}">{{ trans('website.form.interest') }}</option>
                                            @forelse($types as $item)
                                                <option
                                                    @selected(old('contact_type_id') == $item->id) value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('contact_type_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-10 col-lg-6 mb-4">
                                        <input type="tel" id="phone"
                                               class="form-control input-phone @error('phone') is-invalid @enderror"
                                               name="phone"
                                               placeholder="{{ trans('website.form.phone') }}"
                                               value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-12 mb-4">
                                        <input type="text" id="subject"
                                               class="form-control input-phone @error('subject') is-invalid @enderror"
                                               name="subject"
                                               placeholder="{{ trans('website.form.subject') }}"
                                               value="{{ old('subject') }}">
                                        @error('subject')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-12">
                                        <textarea cols="90" id="type-message"
                                                  class="text-message @error('message') is-invalid @enderror"
                                                  name="message"
                                                  placeholder="{{ trans('website.form.message') }}">{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-2 d-flex">
                                        <button type="submit" class="text-decoration-none mt-4 mb-5btn btn-submit"
                                                style="outline: none;border: none;">
                                            {{ trans('website.form.submit') }}
                                            <img src="{{ mix('assets/imgs/readMoreArrow.png') }}" alt="Arrow Icon">
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-3 ms-auto">
                            <div class="contact-info">
                                <h3 class="contactInfo-heading">{{ trans('website.contact.info') }}</h3>
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
                        </div>
                    </div>
                </section>
            </div>
        </section>

    </main>

    @include('includes.footer')
@endsection
