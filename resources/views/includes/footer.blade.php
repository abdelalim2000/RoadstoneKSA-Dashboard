<footer @class(["main-footer", "down-page" => request()->routeIs('home')])>
    <div class="footer-contnet">
        <div class="container-fluid container-fluid-edit">
            <div class="newLetter-Sign">
                <div class="newLetter-container row justify-content-center">
                    <div class="col-sm-12 col-md-10 d-flex justify-content-between flex-column flex-lg-row">
                        <h2 class="newLetter-heading mb-0">{{ trans('website.global.newsletter') }}</h2>
                        <form>
                            <div class="row me-9 justify-content-center justify-content-lg-evenly">
                                <div class="col-12 col-sm-8 col-md-7 col-lg-4">
                                    <input type="text" class="form-control input-name" id="fieldInputName"
                                           aria-describedby="nameHelp"
                                           placeholder="{{ trans('website.form.full-name') }}"/>
                                    <small id="nameHelp" class="form-text wrong-text"></small>
                                </div>
                                <div class="col-12 col-sm-8 col-md-7 col-lg-4">
                                    <input type="email" class="form-control input-email" id="fieldInputEmail1"
                                           aria-describedby="emailHelp"
                                           placeholder="{{ trans('website.form.email') }}"/>
                                    <small id="emailHelp" class="form-text wrong-text"></small>
                                </div>
                                <div class="col-12 col-md-10 col-lg-2 d-flex justify-content-center">
                                    <a href="#" class="text-decoration-none">
                                        <button type="submit" class="btn btn-submit">
                                            {{ trans('website.form.submit') }}
                                            <img src="{{ mix('assets/imgs/readMoreArrow.png') }}" alt="Arrow Icon"/>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-10 col-lg-2 d-flex justify-content-center justify-content-lg-end">
                        <a class="btn-back-up">
                            <svg
                                class="arrows-back back-up"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="27.117"
                                height="36.459"
                                viewBox="0 0 27.117 36.459"
                            >
                                <defs>
                                    <linearGradient
                                        id="linear-gradient"
                                        x1="0.5"
                                        x2="0.5"
                                        y2="1"
                                        gradientUnits="objectBoundingBox"
                                    >
                                        <stop
                                            offset="0"
                                            stop-color="#fff"
                                            stop-opacity="0"
                                        />
                                        <stop offset="1" stop-color="#fff"/>
                                    </linearGradient>
                                </defs>
                                <g
                                    class="arrows-back"
                                    id="svgexport-6_74_"
                                    data-name="svgexport-6 (74)"
                                    transform="translate(0 12.226)"
                                >
                                    <path
                                        class="b1"
                                        id="Path_422"
                                        data-name="Path 422"
                                        d="M13.559,195.295l-9.834-9.834L0,189.186l13.559,13.559,13.559-13.559-3.725-3.725Zm0,0"
                                        transform="translate(0 -178.512)"
                                        fill="url(#linear-gradient)"
                                    />
                                    <path
                                        class="b2"
                                        id="Path_423"
                                        data-name="Path 423"
                                        d="M27.117,4.225,23.392.5l-9.834,9.834L3.725.5,0,4.225,13.559,17.784Zm0,0"
                                        transform="translate(0 -3.34)"
                                        opacity="0.6"
                                        fill="url(#linear-gradient)"
                                    />
                                    <path
                                        class="b3"
                                        id="Path_444"
                                        data-name="Path 444"
                                        d="M27.117,4.225,23.392.5l-9.834,9.834L3.725.5,0,4.225,13.559,17.784Zm0,0"
                                        transform="translate(0 -12.726)"
                                        opacity="0.2"
                                        fill="url(#linear-gradient)"
                                    />
                                </g>
                            </svg>
                            <span class="back-to-up">back to top</span>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="hr-line"/>
            <div
                class="d-flex justify-content-between flex-column flex-lg-row"
            >
                <ul class="nav">
                    <li class="nav-item menu-item list-inline">
                        <a class="nav-link menu-link ps-0" href="#">{{ trans('website.menu.tires') }}</a>
                    </li>
                    <li class="nav-item menu-item list-unstyled list-inline-item">
                        <a class="nav-link menu-link" href="#">{{ trans('website.menu.retailers') }}</a>
                    </li>
                    <li class="nav-item menu-item list-unstyled list-inline-item">
                        <a class="nav-link menu-link"
                           href="{{ route('about') }}">{{ trans('website.menu.about') }}</a>
                    </li>
                    <li class="nav-item menu-item list-unstyled list-inline-item">
                        <a class="nav-link menu-link" href="{{ route('blogs') }}">{{ trans('website.menu.blog') }}</a>
                    </li>
                    <li class="nav-item menu-item list-unstyled list-inline-item">
                        <a class="nav-link menu-link" href="#">{{ trans('website.menu.contact') }}</a>
                    </li>
                </ul>
                <ul class="social-container list-inline">
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
            <hr class="hr-line"/>
            <div
                class="global-footer text-center d-flex justify-content-between align-items-center py-2 flex-column flex-lg-row">
                <div class="copy-right ps-0">
                    COPYRIGHT© {{ \Carbon\Carbon::now()->format('Y') }} Arabian Tires Group. ALL RIGHTS RESERVED.
                </div>
                <ul class="footer-terms list-inline m-0">
                    <li class="footer-terms-item list-unstyled list-inline-item">
                        <a class="nav-link menu-link" href="#">{{ trans('website.menu.privacy') }}</a>
                    </li>
                    <li class="footer-terms-item list-unstyled list-inline-item">
                        <a class="nav-link menu-link" href="#">{{ trans('website.menu.terms') }}</a>
                    </li>
                    {{--                        <li class="footer-terms-item list-unstyled list-inline-item">--}}
                    {{--                            <a class="nav-link menu-link pe-0" href="#">Terms Of Conditions</a>--}}
                    {{--                        </li>--}}
                </ul>
            </div>
        </div>
    </div>
</footer>
