@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block;margin-left:0%;width:10%; background-color:#000000; text-align:center;color:white;"
        id="mySidebar">
        <h1> Menu</h1>
        <a href="{{ url('/doctor/home') }}" class="w3-bar-item w3-button  w3-border-bottom "
            style="background-color:rgb(235, 242, 250); color:black; ">Dashboard</a>
        <a href="{{ url('/doctor/list') }}" class="w3-bar-item w3-button  w3-border-bottom">Doctors List</a>
        <a href="
        {{ route('doctor.appointments-list') }}
        "
            class="w3-bar-item w3-button  w3-border-bottom">Appointments</a>
            <a href="{{ route('doctor.completed-appointment-list') }}" class="w3-bar-item w3-button  w3-border-bottom" >Completed Appointments</a>
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Appointment Requests</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Patients</a> --}}

    </div>

    <div id="main" style="margin-left:10%; align-items:center">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Doctor DashBoard</h1>
            </div>
        </div>

        <div>



        </div>

        <div class="card text-white bg-secondary mb-3" style="margin:2rem;">
            <div class="card-header">Total Assignments</div>
            <div class="card-body">
                <div class="panel-body">
                    <a href="{{ route('doctor.appointments-list') }}" style="text-decoration:none;"> Total number of Assignments : {{ $apptCount }}</a>
                </div>
            </div>
        </div>
        <div class="card text-white bg-secondary mb-3" style="margin:2rem;">
            <div class="card-header">Total Pending Assignments</div>
            <div class="card-body">
                <div class="panel-body">
                     Total number of Pending Assignments : {{ $apptPendCount }}
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

        }

        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.width = "10%";
            document.getElementById("mySidebar").style.display = "none";

        }
    </script>
    <script>
        const chooseFile = document.getElementById("choose-file");
        const imgPreview = document.getElementById("img-preview");

        chooseFile.addEventListener("change", function() {
            getImgData();
        });

        function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function() {
                    imgPreview.style.display = "block";
                    imgPreview.innerHTML = '<img src="' + this.result +
                        '" /> <p align="center"></p></div> ';
                });
            }
        }
    </script>
@endsection
