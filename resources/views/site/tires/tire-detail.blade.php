@extends('layouts.site')
@section('title', 'Roadstone KSA - Tires || '. $tire->title)
@section('og_title', 'Roadstone KSA - Tires || '. $tire->title )
@section('seo_description',  $tire->seo_description )
@section('og_description',  $tire->seo_description )
@section('seo_keywords', $tire->keywords )

@push('addional-css')
    <!-- Owl carousel js link cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
@endpush

@section('content')

    <header class="sportUltra-header">
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
    </header>

    @include('includes.nav')

    <main class="sportUltra-main">
        <!-- start section sportUltra container -->
        <section class="sportUltra-container">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="{{ route('home') }}">
                                {{ trans('website.menu.home') }}
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="breadcrumb-link" href="">
                                {{ $tire->car_type->name }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $tire->title }}</li>
                    </ol>
                </nav>

                <section class="products">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="products-performance">
                                <div class="products-performance-content">
                                    {{ $tire->tire_logo->img()->attributes(['class' => 'w-100', 'alt' => $tire->title]) }}
                                    <h1 class="products-heading">{{ $tire->title }}</h1>
                                </div>
                                <div class="tire-features d-flex justify-content-between">
                                    @forelse($tire->tire_features as $item)
                                        <div
                                            class="tire-features-content d-flex  justify-content-between align-items-center">
                                            <img src="{{ $item->icon->getUrl() }}" class="img-fluid" title
                                                 alt="{{ $item->name }}">
                                            @php
                                                $str = explode(' ',$item->name);
                                            @endphp
                                            <h4 class="tire-feature-heading">{{ $str[0] }}
                                                <br> {{ substr(strstr($item->name," "), 1) }}</h4>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-display text-center">
                                <div class="product-display-content shadow-3">
                                    {{ $tire->images[0]->img()->attributes(['id' => 'main','class' => 'img-display', 'alt' => $item->title]) }}
                                </div>
                                <div id="thumbnails">
                                    @forelse($tire->images as $image)
                                        {{ $image->img()->attributes(['class' => 'img-slider', 'alt' => $item->title]) }}
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row per align-items-center">
                        <div class="col-md-6">
                            <div class="per-features">
                                @forelse($tire->tire_designs as $item)
                                    <div class="per-features-contnet {{ $loop->last ? 'pb-0' : '' }}">
                                        <img src="{{ $item->image->getUrl() }}" alt="{{ $item->name }}">

                                        <h5 class="per-feature-heading">{{ $item->name }}</h5>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="per-indicator shadow-3 rounded-3">
                                <h2 class="per-indicator-title">{!! trans('website.tire.key-performance') !!}</h2>
                                @if($tire->dry_performance || $tire->dry_performance != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.dry-performance') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->dry_performance }}%"
                                                 aria-valuenow="{{ 20 * $tire->dry_performance }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->$tire->dry_performance }}</strong>
                                    </div>
                                @endif

                                @if($tire->wet_performance || $tire->wet_performance != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.wet-performance') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->wet_performance }}%"
                                                 aria-valuenow="{{ 20 * $tire->wet_performance }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->wet_performance }}</strong>
                                    </div>
                                @endif

                                @if($tire->rolling_resistance || $tire->rolling_resistance != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.rolling-resistance') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->rolling_resistance }}%"
                                                 aria-valuenow="{{ 20 * $tire->rolling_resistance }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->rolling_resistance }}</strong>
                                    </div>
                                @endif

                                @if($tire->comfort_noise || $tire->comfort_noise != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.rolling-resistance') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->comfort_noise }}%"
                                                 aria-valuenow="{{ 20 * $tire->comfort_noise }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->comfort_noise }}</strong>
                                    </div>
                                @endif

                                @if($tire->wear || $tire->wear != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.wear') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->wear }}%"
                                                 aria-valuenow="{{ 20 * $tire->wear }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->wear }}</strong>
                                    </div>
                                @endif

                                @if($tire->snow || $tire->snow != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.snow') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->snow }}%"
                                                 aria-valuenow="{{ 20 * $tire->snow }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->snow }}</strong>
                                    </div>
                                @endif

                                @if($tire->fuel_consumption || $tire->fuel_consumption != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.fuel-consumption') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->fuel_consumption }}%"
                                                 aria-valuenow="{{ 20 * $tire->fuel_consumption }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->fuel_consumption }}</strong>
                                    </div>
                                @endif

                                @if($tire->durability || $tire->durability != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.durability') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->durability }}%"
                                                 aria-valuenow="{{ 20 * $tire->durability }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->durability }}</strong>
                                    </div>
                                @endif

                                @if($tire->wet_handling || $tire->wet_handling != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.wet-handling') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->wet_handling }}%"
                                                 aria-valuenow="{{ 20 * $tire->wet_handling }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->wet_handling }}</strong>
                                    </div>
                                @endif

                                @if($tire->wet_grip || $tire->wet_grip != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.wet-grip') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->wet_grip }}%"
                                                 aria-valuenow="{{ 20 * $tire->wet_grip }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->wet_grip }}</strong>
                                    </div>
                                @endif

                                @if($tire->aquaplaning || $tire->aquaplaning != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.aquaplaning') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->aquaplaning }}%"
                                                 aria-valuenow="{{ 20 * $tire->aquaplaning }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->aquaplaning }}</strong>
                                    </div>
                                @endif

                                @if($tire->ice || $tire->ice != 0)
                                    <div class="per-indicator-container">
                                        <h4 class="per-indecator-heading">{{ trans('website.tire.ice') }}</h4>
                                        <div class="prog">
                                            <div class="progress-bar" role="progressbar"
                                                 style="width: {{ 20 * $tire->ice }}%"
                                                 aria-valuenow="{{ 20 * $tire->ice }}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <strong>{{ $tire->ice }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product-sizes">
                    <h2 class="product-size-titel">{{ trans('website.tire.size') }}</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td>{{ trans('website.tire.width') }}</td>
                            <td scope="col">{{ trans('website.tire.aspect-ratio') }}</td>
                            <td scope="col">{{ trans('website.tire.rim-diameter') }}</td>
                            <td scope="col">{{ trans('website.tire.load-index') }}</td>
                            <td scope="col">{{ trans('website.tire.speed-rating') }}</td>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($tire->tire_sizes as $size)
                            <tr>
                                <td>{{ $size->width }}</td>
                                <td>{{ $size->ratio }}</td>
                                <td>{{ $size->rim_diameter }}</td>
                                <td>{{ $size->load_index }}</td>
                                <td>{{ $size->speed_rating }}<td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </section>
            </div>
        </section>
        <!-- end section sportUltra container -->
    </main>

    @include('includes.footer')

@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ mix('assets/js/slick.js') }}"></script>

    <script>
        //*sport ultra curosel function
        let thumbnails = document.getElementById("thumbnails");
        let imgs = thumbnails.getElementsByClassName("img-slider");
        let main = document.getElementById("main");
        let counter = 0;

        function changeSilder() {
            for (let i = 0; i < imgs.length; i++) {
                let img = imgs[i];
                img.addEventListener("click", function () {
                    main.src = this.src;
                });
            }
        }

        changeSilder();

    </script>
@endpush
