@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block;margin-left:0%;width:10%; background-color:#000000;; text-align:center;color:white;" id="mySidebar">
        <h1 class="dash-menu"> Menu</h1>
        <a href="{{ route('home') }}" class="w3-bar-item w3-button  w3-border-bottom" >Dashboard</a>
        <a href="{{ route('superadmin.admin-doctors-list') }}" class="w3-bar-item w3-button  w3-border-bottom">Doctors List</a>
        <a href="{{ route('superadmin.admin-clients-list') }}" class="w3-bar-item w3-button  w3-border-bottom">Client List</a>
        {{-- <a href="{{ route('superadmin.appointments-list') }}" class="w3-bar-item w3-button w3-border-bottom">Appointment List</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Review Feedback</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom"> Verification Requests</a> --}}






        {{-- <a href="#" class="w3-bar-item w3-button  w3-border-bottom">Make Appointments</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a>  --}}
    </div>

    <div id="main" style="margin-left:10%; align-items:center">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Admin Password Update</h1>
            </div>
        </div>

        <div class="update-password" style="margin:2rem; margin-bottom: 2rem;">
            <h1>Update Password</h1>

            <form action="{{ route('superadmin.update-password') }}" method="post">
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger"> {{ $error }}</p>
                @endforeach
            @endif

                @csrf
                @method('put')

                <div class="mb-3">
                    Old Password :
                    <input type="password" class="form-control" required
                        placeholder="old password" name="old_password">
                </div>
                <div class="mb-3">
                    New Password :
                    <input type="password" class="form-control" required
                        placeholder="new-password" name="password">
                </div>
                <div class="mb-3">
                    Re-enter new password :
                    <input type="password" class="form-control" required
                        placeholder="confirm password" name="password_confirmation">
                </div>


                <button class="btn btn-primary"> Update</button>
            </form>

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
