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
        style="display:block;margin-left:0%;width:10%; background-color:#000000; text-align:center;color:white;"
        id="mySidebar">
        <h1 class="dash-menu"> Menu</h1>
        <a href="{{ url('/client/home') }}" class="w3-bar-item w3-button  w3-border-bottom">Dashboard</a>
        <a href="{{ url('/client/doctors-list') }}" class="w3-bar-item w3-button  w3-border-bottom">Doctors List</a>
        <a href="{{ url('/client/make-appointment') }}" class="w3-bar-item w3-button  w3-border-bottom"
            style="background-color:rgb(235, 242, 250); color:black; ">Make Appointments</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Appointment List</a>
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Patients</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom">Link 3</a> --}}
    </div>

    <div id="main" style="margin-left:10%;">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Make an Appointment</h1>
            </div>
        </div>


        <div class="container Appointment-form">

            <form action="#" method="POST">

                <div class="choose-doctor" style="display:inline-flex; width :100%; padding:1rem;margin:auto;">
                    <label for="doctor"
                        class="col-md-4 col-form-label text-md-end">{{ __('Choose who you want an appointment with:') }}</label>

                    <div class="col-md-6">
                        {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}
                        
                        <select class="form-select" aria-label="Default select example" required>
                            <option selected disabled>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                
                <div class="time&date" style="display:inline-flex; width :100%; padding:1rem;margin:auto;">
                    
                    <label for="apptime"
                    class="col-md-4 col-form-label text-md-end">{{ __('Enter what time you want the appointment at:') }}</label>
                    
                    <div>
                        <input id="startapptime" type="time" class="form-control " name="startapptime"
                        value="{{ old('startapptime') }}" required autofocus>
                    </div>
                    <p style="padding-top:.4rem">to</p>
                    
                    <div >
                        <input id="endapptime" type="time" class="form-control " name="endapptime"
                        value="{{ old('endapptime') }}" required autofocus>
                    </div>
                </div>
                
                <div class="app_description" >
                    <label for="description"
                    class="col-md-4 col-form-label text-md-end">{{ __('What is the purpose of the appointment :') }}</label>
                    <div class="col-md-6">

                        <textarea id="description" type="text"  class="form-control @error('description') is-invalid @enderror" name="description" 
                        value="{{ old('description') }}" required autofocus>
                        Describe your issues here...
                        </textarea>

                    </div>


                </div>





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
