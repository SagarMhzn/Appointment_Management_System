@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block;margin-left:0%;width:10%; background-color:#000000; text-align:center;color:white;"
        id="mySidebar">
        <h1> Menu</h1>
        <a href="{{ url('/doctor/home') }}" class="w3-bar-item w3-button  w3-border-bottom "
            >Dashboard</a>
        <a href="{{ url('/doctor/list') }}" class="w3-bar-item w3-button  w3-border-bottom" style="background-color:rgb(235, 242, 250); color:black; ">Doctors List</a>
        <a href="
        {{ route('doctor.appointments-list') }}
        " class="w3-bar-item w3-button  w3-border-bottom">Appointments</a>
        <a href="{{ route('doctor.completed-appointment-list') }}" class="w3-bar-item w3-button  w3-border-bottom" >Completed Appointments</a>
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Appointment Requests</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Patients</a> --}}

    </div>

    <div id="main" style="margin-left:10%;">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Doctor List</h1>
            </div>
        </div>
        <div class="doc-table"
            style="display:flex; flex-direction:row;background-color:rgb(216, 196, 182); width:80%; margin:auto; justify-content:initial">


            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($doctor_details as $key => $data)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->doctors->address }}</td>
                            <td>{{ $data->doctors->phone }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <div class="doc_actions " style="display: inline-flex">
                                <div class="doc_view">
                                    <button class="button">view</button>
                                </div>
                                {{-- <div class="doc_book">
                                    <button>book</button>
                                </div> --}}
                            </div>
                            </td>
                        </tr>
                        @endforeach

                </tbody>
            </table>

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
