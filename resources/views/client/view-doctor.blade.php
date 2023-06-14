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
    <link href="http://bootstrap-notify.remabledesigns.com/" rel="stylesheet">

    <!-- boxed bg -->
    <link id="bodybg" href="{{ asset('bodybg/bg1.css') }}" rel="stylesheet" type="text/css" />
    <!-- template skin -->
    <link id="t-colors" href="{{ asset('color/default.css') }}" rel="stylesheet">

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
                    <a class="navbar-brand" href="{{ Auth::check() ? url('/checkrole') : url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="150" height="40" />
                    </a>
                </div>

                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ Auth::check() ? route('client.home') : url('/') }}">Home</a></li>
                        <li class="active"><a href="{{ route('client.client-doctors-list') }}">Doctors</a></li>
                        @if (Auth::check())
                            <li><a href="{{ route('client.appointments') }}">Appointments</a></li>
                        @endif
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

                                                <li><a href="
                                                    {{ route('client.profile') }}
                                                    ">Profile</a>
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

{{-- @dd($doc_user->doctors->id) --}}


        <section id="intro" class="intro">
            <div class="intro-content">
                <div class="container">


                    <div>
                        <div class="form-wrapper">
                            <div>

                                <div class="panel panel-skin">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span>
                                            {{ $doc_user->name }} </h3>
                                    </div>
                                    <div class="panel-body">
                                        {{-- <form role="form" class="lead" method="GET"
                                            action="{{ route('client.make-appointment') }}"> --}}

                                        <div class="row" style="display:flex;flex-direction:row; ">
                                            <div class="col-xs-4 col-sm-4 col-md-4 " >
                                                <div class="form-group" >
                                                    @if ($doc_user->doctors->image && file_exists(public_path('public/Image/' . $doc_user->doctors->image)))
                                                        <div>
                                                            <img src="{{ asset('public/Image/' . $doc_user->doctors->image) }}"
                                                                alt="" style="border-radius: 50%;width:15vw;">
                                                        </div>
                                                    @else
                                                        <div>
                                                            <img src="{{ asset('defaults/no-image.jpg') }}"
                                                                alt="" style="border-radius: 50%;width:15vw;">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12 ">
                                                <div class="row" style="display:flex;flex-direction:row; ">
                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                        <div class="form-group" >
                                                            <label>Email</label>
                                                            <input id="email" type="email" class="form-control"
                                                                name="email" value="{{ $doc_user->email }}"
                                                                disabled>

                                                        </div>
                                                    </div>

                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                        <div class="form-group">
                                                            <label>Phone:</label>
                                                            <input id="phone" type="phone" class="form-control"
                                                                name="phone"
                                                                value="{{ $doc_user->doctors->phone }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="display:flex;flex-direction:row; ">
                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                        <div class="form-group">
                                                            <label>Dob:</label>
                                                            <input id="dob" type="dob" class="form-control"
                                                                name="dob" value="{{ $doc_user->doctors->dob }}"
                                                                disabled>

                                                        </div>
                                                    </div>

                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                        <div class="form-group">
                                                            <label>Address:</label>
                                                            <input id="address" type="address" class="form-control"
                                                                name="address"
                                                                value="{{ $doc_user->doctors->address }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="display:flex;flex-direction:row; ">
                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                        <div class="form-group" >
                                                            <label>Qualifications:</label>
                                                            <input id="qualifications" type="qualifications"
                                                                class="form-control" name="qualifications"
                                                                value="{{ $doc_user->doctors->qualifications }}"
                                                                disabled>

                                                        </div>
                                                    </div>

                                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                                        <div class="form-group">
                                                            <label>License No:</label>
                                                            <input id="license_no" type="license_no"
                                                                class="form-control" name="license_no"
                                                                value="{{ $doc_user->doctors->license_no }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="display:flex;flex-direction:row; ">
                                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                                        <div class="form-group" >
                                                            <label>Department:</label>
                                                            <input id="field_of_expertize" type="field_of_expertize"
                                                                class="form-control" name="field_of_expertize"
                                                                value="{{ $doc_user->doctors->field_of_expertize }}"
                                                                disabled>

                                                        </div>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>

                                        @if (Auth::check())
                                            <a href="{{ route('client.appointment-with-doctor',$doc_user->doctors->id) }}">
                                                <input type="submit" value="Book an Appointment Now!"
                                                    class="btn btn-skin btn-block btn-lg">
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}">
                                                <input type="submit" value="Log in to Book an Appoinmtment Now!"
                                                    class="btn btn-skin btn-block btn-lg">
                                            </a>
                                        @endif

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

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.js') }}"></script>
    <script src="{{ asset('js/jquery.appear.js') }}"></script>
    <script src="{{ asset('js/stellar.js') }}"></script>
    <script src="{{ asset('plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/nivo-lightbox.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>





</body>

</html>
