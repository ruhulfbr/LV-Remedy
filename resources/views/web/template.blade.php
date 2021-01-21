<?php
  $site_data = getSettingsValues();
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @if (isset($title))
            {{config('app.name'). ' | '.$title}}        
        @else
            {{env('APP_NAME')}}
        @endif
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('web/img/favicon.png')}}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{asset('web/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('web/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('web/css/bootstrap.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('web/css/animate.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('web/css/fontawesome-all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('web/fonts/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('web/css/font/flaticon.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('web/css/meanmenu.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('web/css/magnific-popup.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('web/vendor/OwlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/vendor/OwlCarousel/owl.theme.default.min.css')}}">
    <!-- Nivo slider CSS -->
    <link rel="stylesheet" href="{{asset('web/vendor/slider/css/nivo-slider.css')}}" />
    <!-- Elements CSS -->
    <link rel="stylesheet" href="{{asset('web/css/elements.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('web/style.css')}}">
    <!-- Modernizr Js -->
    <script src="{{asset('web/js/modernizr-3.5.0.min.js')}}"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- scrollUp Start Here -->
    <a href="#wrapper" data-type="section-switch" class="scrollUp">
        <i class="fas fa-angle-double-up"></i>
    </a>
    <!-- scrollUp End Here -->
    <div id="wrapper" class="wrapper">
        <!-- Header Area Start Here -->
        <header id="header_1">
            <div class="header-top-bar top-bar-border-bottom bg-light-primary100 d-none d-md-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12 col-12 header-contact-layout1">
                            <ul>
                                <li>
                                    <i class="fas fa-phone"></i>Call: {{$site_data->site_contact}}</li>
                                <li>
                                    <i class="fas fa-map-marker-alt"></i>{{$site_data->site_address}}</li>
                                <li>
                                    <i class="far fa-clock"></i>{{$site_data->active_hours}}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4 d-none d-xl-block">
                            <ul class="header-social-layout1">
                                <li>
                                    <a href="{{$site_data->social_facebook}}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$site_data->social_twitter}}">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$site_data->social_linkdin}}">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$site_data->social_pinterest}}">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$site_data->social_skype}}">
                                        <i class="fab fa-skype"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-menu-area header-menu-layout1">
                <div class="container">
                    <div class="row no-gutters d-flex align-items-center">
                        <div class="col-lg-2 col-md-2 logo-area-layout1">
                            <a href="{{URL::to('/')}}" class="temp-logo">
                                <img src="{{asset('web/img/logo.png')}}" alt="logo" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-lg-7 col-md-7 possition-static">
                            <div class="template-main-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{URL::to('/')}}">Home</a>
                                        </li>
                                        <li>
                                            <a href="#">About</a>
                                            <ul class="dropdown-menu-col-1">
                                                <li><a href="about1.html">About 1</a></li>
                                                <li><a href="about2.html">About 2</a></li>
                                                <li><a href="about3.html">About 3</a></li>
                                            </ul>
                                        </li>                                        
                                        <li>
                                            <a href="#">Departments</a>
                                            <ul class="dropdown-menu-col-1">
                                                <li>
                                                    <a href="departments1.html">Departments 1</a>
                                                </li>
                                                <li>
                                                    <a href="departments2.html">Departments 2</a>
                                                </li>
                                                <li>
                                                    <a href="departments3.html">Departments 3</a>
                                                </li>
                                                <li>
                                                    <a href="single-departments.html">Departments Details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Doctors</a>
                                            <ul class="dropdown-menu-col-1">
                                                <li>
                                                    <a href="doctors1.html">Doctors 1</a>
                                                </li>
                                                <li>
                                                    <a href="doctors2.html">Doctors 2</a>
                                                </li>
                                                <li>
                                                    <a href="single-doctor.html">Doctors Details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="possition-static hide-on-mobile-menu">
                                            <a href="#">Pages</a>
                                            <div class="template-mega-menu">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <div class="menu-ctg-title">Home</div>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="index.html">
                                                                        <i class="fas fa-home"></i>Home 1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="index2.html">
                                                                        <i class="fas fa-home"></i>Home 2</a>
                                                                </li>
                                                            </ul>
                                                            <div class="menu-ctg-title">About</div>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="about.html">
                                                                        <i class="fab fa-cloudversify"></i>About</a>
                                                                </li>
                                                            </ul>
                                                            <div class="menu-ctg-title">Doctors</div>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="doctors1.html">
                                                                        <i class="fas fa-user-md"></i>Doctors 1</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-3">
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="doctors2.html">
                                                                        <i class="fas fa-user-md"></i>Doctors 2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-doctor.html">
                                                                        <i class="fas fa-user-md"></i>Doctors Details</a>
                                                                </li>
                                                            </ul>
                                                            <div class="menu-ctg-title">Departments</div>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="departments1.html">
                                                                        <i class="fas fa-hospital"></i>Department 1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="departments2.html">
                                                                        <i class="fas fa-hospital"></i>Department 2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="departments3.html">
                                                                        <i class="fas fa-hospital"></i>Department 3</a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-departments.html">
                                                                        <i class="fas fa-hospital"></i>Department
                                                                        Details
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="menu-ctg-title">Pages</div>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="gallery.html">
                                                                        <i class="fas fa-clone"></i>Gallery</a>
                                                                </li>
                                                                <li>
                                                                    <a href="appointment.html">
                                                                        <i class="far fa-calendar-check"></i>Appointment</a>
                                                                </li>
                                                                <li>
                                                                    <a href="price-table.html">
                                                                        <i class="far fa-money-bill-alt"></i>Price
                                                                        Table
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="shop.html">
                                                                        <i class="fas fa-shopping-basket"></i>Shop</a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-shop.html">
                                                                        <i class="fas fa-shopping-basket"></i>Shop
                                                                        Details
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="contact.html">
                                                                        <i class="fas fa-envelope"></i>Contact</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-3">
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="faq.html">
                                                                        <i class="fas fa-file-archive"></i>Faq List</a>
                                                                </li>
                                                                <li>
                                                                    <a href="404.html">
                                                                        <i class="fas fa-exclamation-triangle"></i>404
                                                                        Error
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="coming-soon.html">
                                                                        <i class="fas fa-sort-amount-up"></i>Coming
                                                                        Soon
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            <div class="menu-ctg-title">News</div>
                                                            <ul class="sub-menu">
                                                                <li>
                                                                    <a href="news1.html">
                                                                        <i class="far fa-newspaper"></i>News 1</a>
                                                                </li>
                                                                <li>
                                                                    <a href="news2.html">
                                                                        <i class="far fa-newspaper"></i>News 2</a>
                                                                </li>
                                                                <li>
                                                                    <a href="single-news.html">
                                                                        <i class="far fa-newspaper"></i>News Details</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="hide-on-desktop-menu">
                                            <a href="#">Pages</a>
                                            <ul>
                                                <li>
                                                    <a href="gallery.html">Gallery</a>
                                                </li>
                                                <li>
                                                    <a href="appointment.html">Appointment</a>
                                                </li>
                                                <li>
                                                    <a href="price-table.html">Price Table</a>
                                                </li>
                                                <li>
                                                    <a href="shop.html">Shop</a>
                                                </li>
                                                <li>
                                                    <a href="single-shop.html">Shop Details</a>
                                                </li>
                                                <li>
                                                    <a href="faq.html">Faq List</a>
                                                </li>
                                                <li>
                                                    <a href="404.html">404 Error</a>
                                                </li>
                                                <li>
                                                    <a href="coming-soon.html">Coming Soon</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">News</a>
                                            <ul class="dropdown-menu-col-1">
                                                <li>
                                                    <a href="news1.html">News 1</a>
                                                </li>
                                                <li>
                                                    <a href="news2.html">News 2</a>
                                                </li>
                                                <li>
                                                    <a href="single-news.html">News Details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html">Contact</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="header-action-items-layout1">
                                <ul>
                                    <li class="d-none d-xl-block">
                                        <form id="top-search-form" class="header-search-dark">
                                            <input type="text" class="search-input" placeholder="Search...." required="">
                                            <button class="search-button">
                                                <i class="flaticon-search"></i>
                                            </button>
                                        </form>
                                    </li>
                                    <li>
                                        <a href="appointment.html" class="action-items-primary-btn">Appointment<i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header Area End Here -->

        @yield("body_content")

        <!-- Footer Area Start Here -->
        <footer>
            <section class="footer-center-wrap">
                <div class="container">
                    <div class="row no-gutters">
                        <div class="col-lg-4 col-12">
                            <div class="footer-social">
                                <ul>
                                    <li>Follow Us:</li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fab fa-skype"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="newsletter-title">
                                        <h4 class="item-title">Stay informed and healthy</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="newsletter-form">
                                        <div class="input-group stylish-input-group">
                                            <input type="text" class="form-control" placeholder="Enter your e-mail">
                                            <span class="input-group-addon">
                                                <button type="submit">
                                                    <span aria-hidden="true">SIGN UP!</span>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="footer-bottom-wrap">
                <div class="copyright">Copyright @<?php echo date("Y"); ?>. Designed and Developed by <a href="https://ruhulamin.cf">{{env('DEVELOPER','Md.Ruhul Amin')}}</a>.</div>
            </section>
        </footer>
        <!-- Footer Area End Here -->
    </div>
    <!-- jquery-->
    <script src="{{asset('web/js/jquery-2.2.4.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('web/js/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('web/js/popper.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('web/js/bootstrap.min.js')}}"></script>
    <!-- Counterup Js -->
    <script src="{{asset('web/js/jquery.counterup.min.js')}}"></script>
    <!-- WOW JS -->
    <script src="{{asset('web/js/wow.min.js')}}"></script>
    <!-- Waypoints Js -->
    <script src="{{asset('web/js/waypoints.min.js')}}"></script>
    <!-- Parallaxie Js -->
    <script src="{{asset('web/js/parallaxie.js')}}"></script>
    <!-- Nivo slider js -->
    <script src="{{asset('web/vendor/slider/js/jquery.nivo.slider.js')}}"></script>
    <script src="{{asset('web/vendor/slider/home.js')}}"></script>
    <!-- Owl Carousel Js -->
    <script src="{{asset('web/vendor/OwlCarousel/owl.carousel.min.js')}}"></script>
    <!-- Meanmenu Js -->
    <script src="{{asset('web/js/jquery.meanmenu.min.js')}}"></script>
    <!-- Magnific Popup Js -->
    <script src="{{asset('web/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Isotope Js -->
    <script src="{{asset('web/js/isotope.pkgd.min.js')}}"></script>
    <!-- Smoothscroll Js -->
    <script src="{{asset('web/js/smoothscroll.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('web/js/main.js')}}"></script>

</body>

</html>