<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/cubeportfolio/css/cubeportfolio.min.css') }}">
    <link href="{{ asset('css/nivo-lightbox.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nivo-lightbox-theme/default/default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- boxed bg -->
    <link id="bodybg" href="{{ asset('bodybg/bg1.css') }}" rel="stylesheet" type="text/css" />
    <!-- template skin -->
    <link id="t-colors" href="{{ asset('color/default.css') }}" rel="stylesheet">




    <!-- Styles -->

</head>



<body class="antialiased" id="page-top" data-spy="scroll" data-target=".navbar-custom">


    <div id="wrapper">

        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="top-area">
                <div class="container">
                    <div class="row">


                    </div>
                </div>
            </div>
            <div class="container navigation">

                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="150" height="40" />
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            <li><a href="{{ route('client.home') }}">Home</a></li>
                        @else
                            <li><a href="{{ url('/') }}">Home</a></li>
                        @endif


                        <li class="active"><a href="{{ route('client.client-doctors-list') }}">Doctors</a></li>

                        @auth

                            <li><a href="{{ route('client.appointments') }}">Appointments</a></li>
                        @endauth

                        <li class="dropdown">

                            @auth
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }}
                                    <b class="caret"></b></a>
                            @else
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">More <b
                                        class="caret"></b></a>
                            @endauth
                            <ul class="dropdown-menu">

                                <div>
                                    @if (Route::has('login'))
                                        <div>
                                            @auth
                                                <li><a href="{{ url('/home') }}">Home</a>
                                                </li>

                                                <li>
                                                    {{-- <a href="{{ url('/logout') }}">Log out</a> --}}

                                                    <div><a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                         document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </li>
                                            @else
                                                <li> <a href="{{ route('login') }}">Log
                                                        in</a></li>

                                                @if (Route::has('register'))
                                                    <li><a href="{{ route('auth.doc.register') }}">Register</a>
                                                    </li>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif
                                </div>

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Section: intro -->
        <section id="intro" class="intro">
            <div class="intro-content" style="margin-top: ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-wrapper">
                                <div>

                                    <div class="panel panel-skin">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <div>
                                                    <span style="display:inline-flex"><i
                                                            class="fa fa-pencil-square-o"></i>
                                                        Our Doctors:
                                                    </span>
                                                    <span style="display:inline-flex; margin-left:25%;">
                                                        {{ $doctor_details->links('pagination::tailwind') }}
                                                    </span>
                                                    <a class="panel-title" href=""
                                                        style="display:inline-flex; float: right;">All Doctors</a>
                                                </div>

                                            </h3>


                                        </div>

                                        <div id="grid-container" class="cbp-l-grid-team"
                                            style="margin-left: 7rem; margin-top:1rem;">
                                            <ul>
                                                @foreach ($doctor_details as $doc_data)
                                                    <li class="cbp-item" style="">

                                                        <a href="{{ route('client.view-doctor', $doc_data->doctors->id) }}"
                                                            class="cbp-caption cbp-singlePage">
                                                            @if ($doc_data->doctors->image)
                                                                <div class="cbp-caption-defaultWrap">
                                                                    <img src="{{ asset('public/Image/' . $doc_data->doctors->image) }}"
                                                                        alt="" width="100%"
                                                                        style="object-fit:fill">
                                                                </div>
                                                            @else
                                                                <div class="cbp-caption-defaultWrap">
                                                                    <img src="{{ asset('defaults/no-image.jpg') }}"
                                                                        alt="" width="100%">
                                                                </div>
                                                            @endif

                                                            <div class="cbp-caption-activeWrap">
                                                                <div class="cbp-l-caption-alignCenter">
                                                                    <div class="cbp-l-caption-body">
                                                                        <div class="cbp-l-caption-text">VIEW PROFILE
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="{{ route('client.view-doctor', $doc_data->id) }}"
                                                            class=" cbp-l-grid-team-name">{{ $doc_data->name }}</a>
                                                        <div class="cbp-l-grid-team-position">
                                                            @if ($doc_data->doctors->field_of_expertize == '')
                                                                N/A
                                                            @else
                                                                {{ $doc_data->doctors->field_of_expertize }}
                                                            @endif

                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>




                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- /Section: intro -->

        <!-- Section: boxes -->
        <section id="boxes" class="home-section paddingtop-80">



        </section>
        <!-- /Section: boxes -->


        <section id="callaction" class="home-section paddingtop-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="callaction bg-gray">
                            <div class="row">
                                <div class="col-md-8">
                                    <div>
                                        <div class="cta-text">
                                            <h3>Book another Appointment?</h3>
                                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit uisque interdum
                                                ante eget faucibus. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <div class="cta-btn">
                                            <a href="{{ route('client.make-appointment') }}"
                                                class="btn btn-skin btn-lg">Book an appoinment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>







        <footer>

            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div>
                            <div class="widget">
                                <h5>About Medicio</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="widget">
                                <h5>Information</h5>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Medical treatment</a></li>
                                    <li><a href="#">Terms & conditions</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div>
                            <div class="widget">
                                <h5>Medicio center</h5>
                                <p>
                                    Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                                </p>
                                <ul>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                                        </span> Monday - Saturday, 8am to 10pm
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                        </span> +62 0888 904 711
                                    </li>
                                    <li>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                        </span> hello@medicio.com
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div>
                            <div class="widget">
                                <h5>Our location</h5>
                                <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

                            </div>
                        </div>
                        <div>
                            <div class="widget">
                                <h5>Follow us</h5>
                                <ul class="company-social">
                                    <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a>
                                    </li>
                                    <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>
        </footer>

    </div>
    <a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

    <!-- Core JavaScript Files -->
    {{-- <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.scrollTo.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/stellar.js"></script>
    <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/nivo-lightbox.min.js"></script>
    <script src="js/custom.js"></script> --}}

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/stellar.js') }}"></script>
    <script src="{{ asset('plugins/cubeportfolio/js/jquery.cubeportfolio.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/nivo-lightbox.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>





</body>

</html>
