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
                <h1>Admin Profile</h1>
            </div>
        </div>


        <form method="POST" action="
        {{-- {{ route('superadmin.update-profile') }} --}}
        " enctype="multipart/form-data">
            <div class="card-body " style="display:flex; flex-direction:row; margin-top:20px; margin-left:200px ">
                @csrf

                @method('put')
                <div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ $user->name }}" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $user->email }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    


                    <div style="margin-left:1rem">
                        <div class="col-md-6 offset-md-6">
                            <button type="submit" class="btn btn-primary">
                                {{ 'Update proflile' }}
                            </button>



                        </div>
                    </div>
                </div>

            </div>
        </form>
        <hr>
               







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
