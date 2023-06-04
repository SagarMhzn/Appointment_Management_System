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
        style="display:block;margin-left:0%;width:10%; background-color:#1e96fc; text-align:center;color:white;" id="mySidebar">
        <h1 class="dash-menu"> Menu</h1>
        <a href="#" class="w3-bar-item w3-button  w3-border-bottom">Dashboard</a>
        <a href="#" class="w3-bar-item w3-button  w3-border-bottom">Doctors List</a>
        <a href="#" class="w3-bar-item w3-button  w3-border-bottom">Make Appointments</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Appointment List</a>
        {{--<a href="#" class="w3-bar-item w3-button w3-border-bottom">Patients</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a> --}}
    </div>

    <div id="main" style="margin-left:10%;">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Client DashBoard</h1>
            </div>
        </div>
        <div class="client-info"
            style="display:flex; flex-direction:row;background-color:rgb(216, 196, 182); width:80%; margin:auto; justify-content:initial">

            <div class="client-image" style="margin: 0rem 0.8rem;">
                <img src="/defaults/no-image.jpg" alt="image" style="object-fit:cover; ">
            </div>

            <div class="client-details" style="margin-top:1rem;">
                Name:
                <br />
                Address:
                <br />
                Phone no.:
                <br />
                DoB:
                <br />



            </div>
        </div>

        <div class="dash-body">
            this section shows the information about the doctors appointment and patient infos

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
