@extends('layouts.app')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('DOCTOR home page') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}



    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block;margin-left:0%;width:10%; background-color:#000000;; text-align:center;color:white;"
        id="mySidebar">
        <h1 class="dash-menu"> Menu</h1>
        <a href="{{ route('home') }}" class="w3-bar-item w3-button  w3-border-bottom"
            style="background-color:rgb(235, 242, 250); color:black; ">Dashboard</a>
        <a href="{{ route('superadmin.admin-doctors-list') }}" class="w3-bar-item w3-button  w3-border-bottom">Verified Doctors
            List</a>
        <a href="{{ route('superadmin.admin-clients-list') }}" class="w3-bar-item w3-button  w3-border-bottom">Client
            List</a>
        <a href="{{ route('superadmin.unverified-list') }}" class="w3-bar-item w3-button  w3-border-bottom">Unverified Doctors
            List</a>
        {{-- <a href="{{ route('superadmin.appointments-list') }}" class="w3-bar-item w3-button w3-border-bottom">Appointment List</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Review Feedback</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom"> Verification Requests</a> --}}






        {{-- <a href="#" class="w3-bar-item w3-button  w3-border-bottom">Make Appointments</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a>  --}}
    </div>

    <div id="main" style="margin-left:10%;">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Admin DashBoard</h1>
            </div>
        </div>
        <div class="container" style="margin-top:2rem;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="card bg-primary" style="width: 18rem; margin-left: 50px">
                                    <div class="card-body">
                                        <a href="{{ route('superadmin.admin-doctors-list') }}" style="text-decoration: none">
                                        <p class="card-text text-warning">Verified Doctors: {{ $countVerDoctors }}</p>
                                        </a>
                                    </div>
                                </div>

                                <div class="card bg-danger" style="width: 18rem; margin-left: 10px">
                                    <div class="card-body">
                                        <a href="{{ route('superadmin.unverified-list') }}" style="text-decoration: none">
                                            <p class="card-text text-warning">Unverified Doctors: {{ $countUnVerDoctors }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="card bg-primary" style="width: 18rem; margin-left: 50px">
                                    <div class="card-body">
                                        <p class="card-text text-warning">No. of Patients: {{ $countClients }}</p>
                                    </div>
                                </div>

                                <div class="card bg-danger" style="width: 18rem; margin-left: 10px">
                                    <div class="card-body">
                                        <p class="card-text text-warning">No. of Appointments: {{ $countAppt }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    </div>

    <script>
        var clickCount = 0;

        function handleClick() {
            clickCount++;

            if (clickCount % 2 === 0) {
                w3_open();
            } else {
                w3_close();
            }
        }

        function w3_open() {

            document.getElementById("main").style.marginLeft = "10%";
            document.getElementById("mySidebar").style.display = "block";
            // document.getElementById("openNav").style.display = 'block';
        }

        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.width = "10%";
            document.getElementById("mySidebar").style.display = "none";
            // document.getElementById("openNav").style.display = "inline-block";
        }
    </script>
@endsection
