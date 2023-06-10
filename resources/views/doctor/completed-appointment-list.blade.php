@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block;margin-left:0%;width:10%; background-color:#000000; text-align:center;color:white;"
        id="mySidebar">
        <h1> Menu</h1>
        <a href="{{ url('/doctor/home') }}" class="w3-bar-item w3-button  w3-border-bottom "
            >Dashboard</a>
        <a href="{{ url('/doctor/list') }}" class="w3-bar-item w3-button  w3-border-bottom" >Doctors List</a>
        <a href="{{ route('doctor.appointments-list') }}" class="w3-bar-item w3-button  w3-border-bottom" >Appointments</a>
        <a href="{{ route('doctor.completed-appointment-list') }}" class="w3-bar-item w3-button  w3-border-bottom" style="background-color:rgb(235, 242, 250); color:black; ">Completed Appointments</a>
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Appointment Requests</a> --}}
        {{-- <a href="#" class="w3-bar-item w3-button w3-border-bottom">Patients</a> --}}

    </div>

    <div id="main" style="margin-left:10%;">

        <div class="w3-black" style="display:flex; flex-direction:row;">
            <button id="openNav" class="w3-button w3-black w3-xlarge " onclick="handleClick()">&#9776;</button>
            <div class="w3-container">
                <h1>Appointments List</h1>
            </div>
        </div>
        <div class="doc-table"
            style="display:flex; flex-direction:row;background-color:rgb(216, 196, 182); width:80%; margin:auto; justify-content:initial">


            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Appoinment Time</th>
                        <th scope="col">Appointment Date</th>
                        {{-- <th scope="col">Description</th> --}}
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($appointments as $keys => $appts)
                                                <tr>
                                                  <th scope="row">{{ $keys + 1 }}</th>
                                                  <td>{{ $appts->userAppointmentsClient->name }}</td>
                                                  <td>
                                                    {{-- {{ $appts->userAppointmentsClient->field_of_expertize }} --}}

                                                    {{ $appts->userAppointmentsClient->email }}
                                                    {{-- @if($appts->userAppointmentsClient->field_of_expertize == '')
                                                        N/A
                                                    @else
                                                    {{ $appts->userAppointmentsClient->field_of_expertize }}
                                                    @endif --}}
                                                </td>

                                                  <td>{{ $appts->appointment_start_time }} - {{ $appts->appointment_end_time }}</td>
                                                  <td>{{ $appts->appointment_date }}</td>
                                                  {{-- <td>{{ $appts->description }}</td> --}}
                                                  {{-- <td>
                                                    {{ $appts->verified }}

                                                    @if($appts->verified ==0)
                                                    <span class="badge " style="background-color: red">Not Verified!</span>
                                                    @else
                                                    <span class="badge " style="background-color: green">Verified!</span> 
                                                    @endif
                                                </td>
                                                  <td>
                                                    {{ $appts->status }}
                                                    @if($appts->status == 0)
                                                    <span class="badge " style="background-color: red">Pending!</span> 
                                                    @else
                                                    <span class="badge " style="background-color: green">Completed!</span> 
                                                    @endif
                                                </td> --}}

                                                {{-- <td>
                                                    <a href="{{ route('doctor.toggleVerified', ['id' => $appts->id]) }}" class="badge {{ $appts->verified == 0 ? 'text-danger' : 'text-success' }}">
                                                        {{ $appts->verified == 0 ? 'Not Verified!' : 'Verified!' }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('doctor.toggleStatus', ['id' => $appts->id]) }}" class="badge {{ $appts->status == 0 ? 'text-danger' : 'text-success' }}">
                                                        {{ $appts->status == 0 ? 'Pending!' : 'Completed!' }}
                                                    </a>
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
