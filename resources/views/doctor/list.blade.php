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

   

        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
            <a href="#" class="w3-bar-item w3-button">Link 1</a>
            <a href="#" class="w3-bar-item w3-button active">Link 2</a>
            <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>

        <div id="main">

            <div class="w3-teal" style="display:flex; flex-direction:row;">
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">
                    <h1>Doctor Liat</h1>
                </div>
            </div>
            <div class="doc-info" style="display:flex; flex-direction:row;background-color:rgb(216, 196, 182)">

                <div class="doc-image" style="margin: 0rem 0.8rem;">
                    <img src="/defaults/no-image.jpg" alt="Car" style="object-fit:cover; ">
                </div>

                <div class="doc-details">
                </div>
            </div>

            <div class="dash-body">
                this section shows the information about the doctors appointment and patient infos

            </div>


            

        </div>

        <script>
            function w3_open() {
                document.getElementById("main").style.marginLeft = "10%";
                document.getElementById("mySidebar").style.width = "10%";
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("openNav").style.display = 'none';
            }

            function w3_close() {
                document.getElementById("main").style.marginLeft = "0%";
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("openNav").style.display = "inline-block";
            }
        </script>



@endsection
