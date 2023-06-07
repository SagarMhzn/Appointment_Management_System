@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block;margin-left:0%;width:10%; background-color:#000000;; text-align:center;color:white;" id="mySidebar">
        <h1 class="dash-menu"> Menu</h1>
        <a href="{{ route('home') }}" class="w3-bar-item w3-button  w3-border-bottom" >Dashboard</a>
        <a href="{{ route('superadmin.admin-doctors-list') }}" class="w3-bar-item w3-button  w3-border-bottom" >Doctors List</a>
        <a href="{{ route('superadmin.admin-clients-list') }}" class="w3-bar-item w3-button  w3-border-bottom" style="background-color:rgb(235, 242, 250); color:black; ">Client List</a>
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Appointment List</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Review Feedback</a>
        <a href="#" class="w3-bar-item w3-button w3-border-bottom"> Verification Requests</a> --}}

    </div>

    <div id="main" style="margin-left:10%;">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Clients List</h1>
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
                        {{-- <th scope="col">Action</th> --}}
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($client_details as $key => $data)
                    {{-- {{ dd($data); }} --}}
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->clients->address }}</td>
                            <td>{{ $data->clients->phone }}</td>
                            <td>{{ $data->email }}</td>
                            {{-- <td>
                                <div class="doc_actions " style="display: inline-flex">
                                <div class="doc_view">
                                    <button class="button">view</button>
                                </div>
                            </div>
                            </td> --}}
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
