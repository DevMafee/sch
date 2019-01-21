<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="@yield('favicons')"  type="image/png">
    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/style.css">
</head>

<body>
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="{{ url('./') }}"><img src="{{ asset('public/logos') }}/@yield('logo')" alt=""></a>
                            </div>
                            <div class="login-content">
                                <a href="#">Register / Login</a>
                                <a href="{{ url('./dashboard') }}" class="btn btn-success">Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ url('./') }}">Home</a></li>
                                    <li><a href="#">Ourselves</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url('./all-notice') }}">History</a></li>
                                            <li><a href="{{ url('./aboutus') }}">Speech of Headmaster</a></li>
                                            <li><a href="{{ url('./all-teachers') }}">Teachers</a></li>
                                            <li><a href="{{ url('./contactus') }}">Committee</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Academic</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url('./all-notice') }}">Notices</a></li>
                                            <li><a href="{{ url('./aboutus') }}">Results</a></li>
                                            <li><a href="{{ url('./courses') }}">Routines</a></li>
                                            <li><a href="{{ url('./contactus') }}">Galleries</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('./aboutus') }}">About Us</a></li>
                                    <li><a href="{{ url('./courses') }}">Course</a></li>
                                    <li><a href="{{ url('./contactus') }}">Contact</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:@yield('contact-phone')"><i class="icon-telephone-2"></i> <span>@yield('contact-phone')</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->


    @yield('mainContent')


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="{{ asset('public/logos') }}/@yield('logo')" alt=""></a>
                            </div>
                            <p>Cras vitae turpis lacinia, lacinia lacus non, fermentum nisi. Donec et sollicitudin est, in euismod erat. Ut at erat et arcu pulvinar cursus a eget.</p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Usefull Links</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Services &amp; Features</a></li>
                                    <li><a href="#">Accordions and tabs</a></li>
                                    <li><a href="#">Menu ideas</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Gallery</h6>
                            </div>
                            <div class="gallery-list d-flex justify-content-between flex-wrap">
                                <a href="{{ asset('public/frontend') }}/img/bg-img/gallery1.jpg" class="gallery-img" title="Gallery Image 1"><img src="{{ asset('public/frontend') }}/img/bg-img/gallery1.jpg" alt=""></a>
                                <a href="{{ asset('public/frontend') }}/img/bg-img/gallery2.jpg" class="gallery-img" title="Gallery Image 2"><img src="{{ asset('public/frontend') }}/img/bg-img/gallery2.jpg" alt=""></a>
                                <a href="{{ asset('public/frontend') }}/img/bg-img/gallery3.jpg" class="gallery-img" title="Gallery Image 3"><img src="{{ asset('public/frontend') }}/img/bg-img/gallery3.jpg" alt=""></a>
                                <a href="{{ asset('public/frontend') }}/img/bg-img/gallery4.jpg" class="gallery-img" title="Gallery Image 4"><img src="{{ asset('public/frontend') }}/img/bg-img/gallery4.jpg" alt=""></a>
                                <a href="{{ asset('public/frontend') }}/img/bg-img/gallery5.jpg" class="gallery-img" title="Gallery Image 5"><img src="{{ asset('public/frontend') }}/img/bg-img/gallery5.jpg" alt=""></a>
                                <a href="{{ asset('public/frontend') }}/img/bg-img/gallery6.jpg" class="gallery-img" title="Gallery Image 6"><img src="{{ asset('public/frontend') }}/img/bg-img/gallery6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contact</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p>@yield('contact-address')</p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>Office: @yield('contact-phone')</p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>@yield('contact-email')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed And Developed <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="//simecsystem.com" target="_blank">SIMEC System Ltd.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('public/frontend') }}/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{ asset('public/frontend') }}/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('public/frontend') }}/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('public/frontend') }}/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="{{ asset('public/frontend') }}/js/active.js"></script>
    
</body>

</html>