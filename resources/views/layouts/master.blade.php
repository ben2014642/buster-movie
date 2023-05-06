<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">

<head>
    <!-- Basic need -->
    <title>Open Pediatrics</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="profile" href="#">

    <!--Google Font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
    <!-- Mobile specific meta -->
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone-no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- CSS files -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/myStyle.css') }}">

</head>

<body>
    <!--preloading-->
    <div id="preloader">
        <img class="logo" src="assets/images/logo1.png" alt="" width="119" height="58">
        <div id="status">
            <span></span>
            <span></span>
        </div>
    </div>
    <!--end of preloading-->
    <!--login form popup-->
    <!--end of signup form popup-->

    <!-- BEGIN | Header -->
    <header class="ht-header">
        <div class="container">
            <nav class="navbar navbar-default navbar-custom">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header logo">
                    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <div id="nav-icon1">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <a href="{{ route('home') }}"><img class="logo" src="{{ asset('assets/images/logo1.png') }}"
                            alt="" width="119" height="58"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav flex-child-menu menu-left">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" href="{{ route('home') }}">
                                Home
                            </a>
                            {{-- <ul class="dropdown-menu level1">
                                <li><a href="index.html">Home 01</a></li>
                                <li><a href="homev2.html">Home 02</a></li>
                                <li><a href="homev3.html">Home 03</a></li>
                            </ul> --}}
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" href="{{ route('movie') }}">
                                movies
                            </a>
                            {{-- <ul class="dropdown-menu level1">
                                <li><a href="{{ route('movie') }}">Movie list</a></li>

                            </ul> --}}
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" href="{{ route('celebrity') }}">
                                celebrity
                            </a>
                            
                        </li>
                        
                        {{-- <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                news <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                <li><a href="bloglist.html">blog List</a></li>
                                <li><a href="bloggrid.html">blog Grid</a></li>
                                <li class="it-last"><a href="blogdetail.html">blog Detail</a></li>
                            </ul>
                        </li>
                        <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                                community <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                <li><a href="userfavoritegrid.html">user favorite grid</a></li>
                                <li><a href="userfavoritelist.html">user favorite list</a></li>
                                <li><a href="userprofile.html">user profile</a></li>
                                <li class="it-last"><a href="userrate.html">user rate</a></li>
                            </ul>
                        </li> --}}
                    </ul>
                    <ul class="nav navbar-nav flex-child-menu menu-right">
                        {{-- <li class="dropdown first">
                            <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown"
                                data-hover="dropdown">
                                pages <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu level1">
                                <li><a href="landing.html">Landing</a></li>
                                <li><a href="404.html">404 Page</a></li>
                                <li class="it-last"><a href="comingsoon.html">Coming soon</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Help</a></li> --}}
                        @if (!Auth::check())
                            <li class="btn-login"><a href="{{ route('login') }}">LOG In</a></li>
                            <li class="btn btn-signup"><a href="{{ route('register') }}">sign up</a></li>
                        @else 
                            <li>
                                <p>Xin chào, {{ Auth::user()->name }}</p>
                            </li>
                            <li class="btn btn-signup"><a href="{{ Auth::logout() }}">Logout</a></li>

                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <!-- top search form -->
            <div class="top-search">
                <form id="form-search-index" action="{{ route('index.search') }}" method="POST">
                    @csrf
                    <select name="option_search">
                        <option value="movie">Movie</option>
                        <option value="celebrity">Celebrity</option>
                    </select>
                    <input type="text" name="value"
                        placeholder="Search for a movie, TV Show or celebrity that you are looking for">
                </form>
            </div>
        </div>
    </header>
    {{-- @yield('header') --}}
    <!-- END | Header -->

    @yield('content')
    <!--end of latest new v1 section-->
    <!-- footer section-->
    <footer class="ht-footer">
        <div class="container">
            <div class="flex-parent-ft">
                <div class="flex-child-ft item1">
                    <a href="index.html"><img class="logo" src="assets/images/logo1.png" alt=""></a>
                    <p>5th Avenue st, manhattan<br>
                        New York, NY 10001</p>
                    <p>Call us: <a href="#">(+01) 202 342 6789</a></p>
                </div>
                <div class="flex-child-ft item2">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blockbuster</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Forums</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help Center</a></li>
                    </ul>
                </div>
                <div class="flex-child-ft item3">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Security</a></li>
                    </ul>
                </div>
                <div class="flex-child-ft item4">
                    <h4>Account</h4>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Watchlist</a></li>
                        <li><a href="#">Collections</a></li>
                        <li><a href="#">User Guide</a></li>
                    </ul>
                </div>
                <div class="flex-child-ft item5">
                    <h4>Newsletter</h4>
                    <p>Subscribe to our newsletter system now <br> to get latest news from us.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your email...">
                    </form>
                    <a href="#" class="btn">Subscribe now <i class="ion-ios-arrow-forward"></i></a>
                </div>
            </div>
        </div>
        <div class="ft-copyright">
            <div class="ft-left">
                <p>© 2017 Blockbuster. All Rights Reserved. Designed by leehari.</p>
            </div>
            <div class="backtotop">
                <p><a href="#" id="back-to-top">Back to top <i class="ion-ios-arrow-thin-up"></i></a></p>
            </div>
        </div>
    </footer>
    <!-- end of footer section-->

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/plugins2.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('js')
</body>

</html>
