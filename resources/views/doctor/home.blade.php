@extends('layouts.app')

@section('content')



    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block;margin-left:0%;width:10%; background-color:#000000; text-align:center;color:white;" id="mySidebar">
        <h1> Menu</h1>
        <a href="{{ url('/doctor/home') }}" class="w3-bar-item w3-button  w3-border-bottom " style="background-color:rgb(235, 242, 250); color:black; ">Dashboard</a>
        <a href="{{ url('/doctor/list') }}" class="w3-bar-item w3-button  w3-border-bottom">Doctors List</a>
        <a href="
        {{ route('doctor.appointments-list') }}
        " class="w3-bar-item w3-button  w3-border-bottom">Appointments</a>
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Appointment Requests</a> --}}
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Patients</a>

    </div>

    <div id="main" style="margin-left:10%;">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Doctor DashBoard</h1>
            </div>
        </div>
        <div class="doc-info"
            style="display:flex; flex-direction:row;background-color:rgb(216, 196, 182); width:80%; margin:auto; justify-content:initial">
            <div class="doc-image" style="margin: 0rem 0.8rem;border-radius:50%">
                @if($doctor->image)
                
                <img src="{{ url('public/Image/' . $doctor->image) }}"
                    width="500px" height="300px" style="object-fit: cover" alt="Student Image" />
                
                @else
                <img src="{{ url('defaults/no-image.jpg') }}"
                    width="500px" height="300px" style="object-fit: cover" alt="Student Image" />
                    
                @endif

            </div>

            <div class="doc-details" style="margin-top:1rem;">
                Name:<div class="doc-name" style="font-size: 20px">
                    {{ $logged_user->name }}
                </div>
                Email:<div class="doc-email" style="font-size: 20px">
                    {{ $logged_user->email }}
                </div>
                
                Address:
                <div class="doc-addres" style="font-size: 20px">

                    @if($doctor->address)
                        {{ $doctor->address }}
                    @else
                        N/A
                    @endif
                </div>
                
                Phone no.:
                <div class="doc-phone" style="font-size: 20px">


                    @if($doctor->phone)
                        {{ $doctor->phone }}
                    @else
                        N/A
                    @endif
                </div>
                
                License No.:
                <div class="doc-license" style="font-size: 20px">


                    @if($doctor->license_no)
                        {{ $doctor->license_no }}
                    @else
                        N/A
                    @endif
                </div>
                
                DoB:
                <div class="doc-dob" style="font-size: 20px">
                    {{ $doctor->dob }}
                </div>
                
                Qualification:
                <div class="doc-qual" style="font-size: 20px">
                    @if($logged_user->qualification)
                        {{ $logged_user->qualification }}
                    @else
                        N/A
                    @endif
                </div>
                Field of Expertize:
                <div class="doc-foe" style="font-size: 20px">

                    @if($logged_user->fieldofexpertize)
                        {{ $logged_user->experience }}
                    @else
                        N/A
                    @endif
                </div>
                Exprience:
                <div class="doc-exp" style="font-size: 20px">
                    @if($logged_user->experience)
                        {{ $logged_user->experience }}
                    @else
                        N/A
                    @endif
                </div>


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

        }

        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.width = "10%";
            document.getElementById("mySidebar").style.display = "none";

        }
    </script>
@endsection
