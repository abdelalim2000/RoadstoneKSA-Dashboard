<!-- start rightSide nav -->
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
                                            <a class="nav-link link-active px-3" href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li class="nav-item drowp-item">
                                            <a class="nav-link sup-menu link-active px-3" href="#">Tires</a>
                                            <ul class="drowp-item-container list-unstyled">
                                                <li class="tire-item"><a class="tire-link link-active"
                                                                         href="./passenger.html">passenger Car</a></li>
                                                <li class="tire-item"><a class="tire-link link-active" href="">suv
                                                        car</a></li>
                                                <li class="tire-item"><a class="tire-link link-active" href="">van &
                                                        light truck</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item drowp-item">
                                            <a class="nav-link sup-menu link-active px-3" href="">Retailes</a>
                                            <div class="drowp-item-container mt-5 d-flex justify-content-around">
                                                <ul class="list-unstyled">
                                                    <li class="city-item"><a class="city-link link-active" href="">riyadh</a>
                                                    </li>
                                                    <li class="city-item"><a class="city-link link-active" href="">gaddah</a>
                                                    </li>
                                                    <li class="city-item"><a class="city-link link-active"
                                                                             href="">damam</a></li>
                                                    <li class="city-item"><a class="city-link link-active"
                                                                             href="">jizan</a></li>
                                                </ul>
                                                <ul class="list-unstyled">
                                                    <li class="city-item"><a class="city-link link-active" href="">sakaka</a>
                                                    </li>
                                                    <li class="city-item"><a class="city-link link-active" href="">khamis</a>
                                                    </li>
                                                    <li class="city-item"><a class="city-link link-active" href="">qassim</a>
                                                    </li>
                                                    <li class="city-item"><a class="city-link link-active"
                                                                             href="">taif</a></li>
                                                    <li class="city-item"><a class="city-link link-active" href="">madina</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item"><a class="nav-link link-active px-3" href="./about.html">About
                                                Roadstone</a></li>
                                        <li class="nav-item"><a class="nav-link link-active px-3"
                                                                href="./guide-blogs.html">Guid & Blog</a></li>
                                        <li class="nav-item"><a class="nav-link link-active px-3"
                                                                href="contact-us.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 d-none d-md-block">
                                    <div class="head-office">
                                        <h5 class="head-office-title">head office</h5>
                                        <p class="head-office-desc">
                                            king fahd rd, al faisaliyah, al<br>faysaliyah,dammam 32272,<br>saudi arabia
                                        </p>
                                    </div>
                                    <div class="mobile-number">
                                        <h5 class="mobile-number-title">mobile number</h5>
                                        <p class="mobile-number-content">+966123456789</p>
                                    </div>
                                    <div class="email-address">
                                        <h5 class="email-address-title">email address</h5>
                                        <p class="email-address-content">Uname@Domain.com</p>
                                    </div>
                                </div>
                                <div
                                    class="col-12 d-flex flex-column flex-md-row justify-content-between align-self-end align-items-md-baseline position-relative pb-2">
                                    <div class="copy-right text-center">COPYRIGHT© 2022 Arabian Tires Group. ALL RIGHTS
                                        RESERVED.
                                    </div>
                                    <div class="sidebar-social">
                                        <ul class="social-container list-inline text-center">
                                            <li class="social-item list-unstyled list-inline-item">
                                                <a href="#"> <img class="social-icon" src="./dist/imgs/facebook.png"
                                                                  alt="facebook icon"></a>
                                            </li>
                                            <li class="social-item list-unstyled list-inline-item">
                                                <a href="#"><img class="social-icon" src="./dist/imgs/instagram.png"
                                                                 alt="instagram icon"></a>
                                            </li>
                                            <li class="social-item list-unstyled list-inline-item">
                                                <a href="#"><img class="social-icon" src="./dist/imgs/twitter.png"
                                                                 alt="twitter icon"></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sidebar-terms">
                                        <ul class="footer-terms list-inline text-center m-0">
                                            <li class="footer-terms-item list-unstyled list-inline-item">
                                                <a class="nav-link menu-link" href="#">Privacy Policy</a>
                                            </li>
                                            <li class="footer-terms-item list-unstyled list-inline-item">
                                                <a class="nav-link menu-link" href="#">Terms Of Conditions</a>
                                            </li>
                                            <li class="footer-terms-item list-unstyled list-inline-item">
                                                <a class="nav-link menu-link" href="#">Terms Of Conditions</a>
                                            </li>
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
                    <img src="./dist/imgs/svgexport-6 (73).png" class="pb-2" alt="find tire icon">
                    <span class="side-nav-link-title">Find Your Tire</span>
                </a>
            </li>
            <hr class="hr-line">
            <li class="side-nav-item nav-item">
                <a class="side-nav-link nav-link" href="#">
                    <span class="side-nav-link-title">Find Nearest Retailers</span>
                    <img src="./dist/imgs/svgexport-6 (80).png" class="nearset-icon pb-2"
                         alt="find nearset retailers icon">
                </a>
            </li>
        </ul>
        <div class="contact">
            <a class="contact-link" href="#">
                <img src="./dist/imgs/whatsappIcon.png" alt="Whatsapp icon">
            </a>
        </div>
    </div>
    <!-- Find Tiers Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
         data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="container-fluid">
            <div class="modal-dialog">
                <div class="modal-content px-4">
                    <div class="modal-header border-0 pb-0">
                        <h2 class="modal-title " id="staticBackdropLabel">Find Tire</h2>
                        <button type="button" class="btn-modal-close border-0" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="ps-3 py-0">
                        <small class="text-note">please select your car information to find your tire</small>
                    </div>
                    <div class="modal-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-search btn active ps-0" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true">search by marker
                                </button>
                                <button class="nav-search btn" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">search by size
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                 aria-labelledby="nav-home-tab">
                                <div class="search-marker">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="select-marker my-4" id="myModal">
                                                    <select id="marker" class="cars-marker form-control">
                                                        <option value="" selected disabled>Marker</option>
                                                        <option value="1">BMW</option>
                                                        <option value="2">Jeep</option>
                                                        <option value="3">KIA</option>
                                                        <option value="4">HYUNDAI</option>
                                                        <option value="5">CHEVROLET</option>
                                                        <option value="6">LAND ROVER</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="owl-carousel owl-theme marker-logo" id="mar">
                                                    <div class="marker-logo-selector">
                                                        <label for="bmw" class="form-check-label link-active">
                                                            <img src="./dist/imgs/BMW.png" alt="BMW">
                                                        </label>
                                                        <input id="bmw" class="form-check-car" name="checkCar"
                                                               type="radio">
                                                    </div>
                                                    <div class="marker-logo-selector">
                                                        <label for="jeep" class="form-check-label link-active">
                                                            <img src="./dist/imgs/Jeep.png" alt="Jeep">
                                                        </label>
                                                        <input id="jeep" class="form-check-car" name="checkCar"
                                                               type="radio">
                                                    </div>
                                                    <div class="marker-logo-selector">
                                                        <label for="kia" class="form-check-label link-active">
                                                            <img src="./dist/imgs/KIA.png" alt="KIA">
                                                        </label>
                                                        <input id="kia" class="form-check-car" name="checkCar"
                                                               type="radio">
                                                    </div>
                                                    <div class="marker-logo-selector">
                                                        <label for="hyunai" class="form-check-label link-active">
                                                            <img src="./dist/imgs/Hynd.png" alt="HYUNAI">
                                                        </label>
                                                        <input id="hyunai" class="form-check-car" name="checkCar"
                                                               type="radio">
                                                    </div>
                                                    <div class="marker-logo-selector">
                                                        <label for="chevrolet" class="form-check-label link-active">
                                                            <img src="./dist/imgs/Chev.png" alt="CHEVROLET">
                                                        </label>
                                                        <input id="chevrolet" class="form-check-car" name="checkCar"
                                                               type="radio">
                                                    </div>
                                                    <div class="marker-logo-selector">
                                                        <label for="landRover" class="form-check-label link-active">
                                                            <img src="./dist/imgs/LR.png" alt="LAND-ROVER">
                                                        </label>
                                                        <input id="landRover" class="form-check-car" name="checkCar"
                                                               type="radio">
                                                    </div>
                                                    <div class="marker-logo-selector">
                                                        <label for="min" class="form-check-label link-active">
                                                            <img src="./dist/imgs/MIN.png" alt="MIN">
                                                        </label>
                                                        <input id="min" class="form-check-car" name="checkCar"
                                                               type="radio">
                                                    </div>
                                                    <div class="marker-logo-selector">
                                                        <label for="seat" class="form-check-label link-active">
                                                            <img src="./dist/imgs/SEAT.png" alt="SEAT">
                                                        </label>
                                                        <input id="seat" class="form-check-car" name="checkCar"
                                                               type="radio">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="select-model my-4">
                                                    <select id="model" class="marker-mode form-control">
                                                        <option value="" selected disabled>Model</option>
                                                        <option value="1">x1</option>
                                                        <option value="2">y</option>
                                                        <option value="3">z</option>
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
                                    <small class="text-note">select the tire size for your vehicle</small>
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="select-marker my-4" id="model-size">
                                                    <select id="width-tire" class="width-size-search form-control">
                                                        <option value="" selected disabled>Section Width</option>
                                                        <option value="1">205 or 215 mm</option>
                                                        <option value="2">205 or 215 mm</option>
                                                        <option value="3">215 or 225 mm</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="select-model my-4" id="model-size">
                                                    <select id="tire-aspect" class="tire-aspect-ratio form-control">
                                                        <option value="" selected disabled>Aspect Ratio</option>
                                                        <option value="1">P225/70R16 91S</option>
                                                        <option value="2">P225/70R16 91S</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="select-model" id="model-size">
                                                    <select id="tire-rime" class="tire-rime-dimeter form-control">
                                                        <option value="" selected disabled>Rim Diameter</option>
                                                        <option value="1">195/65 R15</option>
                                                        <option value="2">195/65 R15</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 modal-footer mt-7">
                                                <button type="button" class="btn btn-cancel me-3"
                                                        data-bs-dismiss="modal">cancel
                                                </button>
                                                <button type="search" class="btn btn-search">search</button>
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
<!-- end rightSide nav -->