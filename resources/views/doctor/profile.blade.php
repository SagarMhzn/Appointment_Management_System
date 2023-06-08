@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">



    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left"
        style="display:block;margin-left:0%;width:10%; background-color:#000000; text-align:center;color:white;"
        id="mySidebar">
        <h1> Menu</h1>
        <a href="{{ url('/doctor/home') }}" class="w3-bar-item w3-button  w3-border-bottom "
            >Dashboard</a>
        <a href="{{ url('/doctor/list') }}" class="w3-bar-item w3-button  w3-border-bottom">Doctors List</a>
        <a href="
        {{ route('doctor.appointments-list') }}
        "
            class="w3-bar-item w3-button  w3-border-bottom">Appointments</a>
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


        <form method="POST" action="{{ route('doctor.update-profile') }}" enctype="multipart/form-data">
            <div class="card-body " style="display:flex; flex-direction:row; margin-top:20px; margin-left:200px ">
                @csrf

                @method('put')
                <div class="doc-image" style="margin: 0rem 0.8rem;border-radius:50%;" id="img-preview">
                    @if ($doctor->image)
                        <img src="{{ url('public/Image/' . $doctor->image) }}" height="200px"alt="Image" />
                    @else
                        <img src="{{ url('defaults/no-image.jpg') }}" style="object-fit: cover;height:30vh;width:40vh"
                            alt="Image" />
                    @endif



                </div>
                <div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ $logged_user->name }}" autofocus>

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
                                name="email" value="{{ $logged_user->email }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="phone" type="text" class="form-control @error('Phone') is-invalid @enderror"
                                name="phone" value="{{ $doctor->phone }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ $doctor->address }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('DoB') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                                name="dob" value="{{ $doctor->dob }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input type="file" class="form-control" id="choose-file" name="image" accept="image/*"
                                alt="New-Image" />

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="license" class="col-md-4 col-form-label text-md-end">{{ __('License No.') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="license" type="text"
                                class="form-control @error('license') is-invalid @enderror" name="license"
                                value="{{ $doctor->license_no }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="qualifications"
                            class="col-md-4 col-form-label text-md-end">{{ __('Qualifications') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="qualifications" type="text"
                                class="form-control @error('qualifications') is-invalid @enderror" name="qualifications"
                                value="{{ $doctor->qualifications }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="experience"
                            class="col-md-4 col-form-label text-md-end">{{ __('Experience') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="experience" type="text"
                                class="form-control @error('experience') is-invalid @enderror" name="experience"
                                value="{{ $doctor->experience }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                        <label for="field_of_expertize"
                            class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                        <div class="col-md-12" style="margin-left:1rem;">
                            <input id="field_of_expertize" type="text"
                                class="form-control @error('field_of_expertize') is-invalid @enderror"
                                name="field_of_expertize" value="{{ $doctor->field_of_expertize }}">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ 'Update proflile' }}
                            </button>



                        </div>
                    </div>
                </div>

            </div>
        </form>
        <hr>

        {{-- <form action="{{ route('doctor.password-update') }}" method="post">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p class="text-danger"> {{ $error }}</p>
                @endforeach
            @endif

            @csrf
            @method('put')

            <div class="mb-3">
                Old Password :
                <input type="password" class="form-control" required placeholder="old password" name="old_password">
            </div>
            <div class="mb-3">
                New Password :
                <input type="password" class="form-control" required placeholder="new-password" name="password">
            </div>
            <div class="mb-3">
                Re-enter new password :
                <input type="password" class="form-control" required placeholder="confirm password"
                    name="password_confirmation">
            </div>


            <button class="btn btn-primary"> Update</button>
        </form> --}}
        {{-- <div class="doc-image" style="margin: 0rem 0.8rem;border-radius:50%">
                @if ($doctor->image)
                
                <img src="{{ url('public/Image/' . $doctor->image) }}"
                    width="500px" height="300px" style="object-fit: cover" alt="Student Image" />
                
                @else
                <img src="{{ url('defaults/no-image.jpg') }}"
                    width="500px" height="300px" style="object-fit: cover" alt="Student Image" />
                    
                @endif

            </div> --}}

        {{-- <div class="doc-details" style="margin-top:1rem;">
                Name:<div class="doc-name" style="font-size: 20px">
                    {{ $logged_user->name }}
                </div>
                Email:<div class="doc-email" style="font-size: 20px">
                    {{ $logged_user->email }}
                </div>
                
                Address:
                <div class="doc-addres" style="font-size: 20px">

                    @if ($doctor->address)
                        {{ $doctor->address }}
                    @else
                        N/A
                    @endif
                </div>
                
                Phone no.:
                <div class="doc-phone" style="font-size: 20px">


                    @if ($doctor->phone)
                        {{ $doctor->phone }}
                    @else
                        N/A
                    @endif
                </div>
                
                License No.:
                <div class="doc-license" style="font-size: 20px">


                    @if ($doctor->license_no)
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
                    @if ($logged_user->qualification)
                        {{ $logged_user->qualification }}
                    @else
                        N/A
                    @endif
                </div>
                Field of Expertize:
                <div class="doc-foe" style="font-size: 20px">

                    @if ($logged_user->fieldofexpertize)
                        {{ $logged_user->experience }}
                    @else
                        N/A
                    @endif
                </div>
                Exprience:
                <div class="doc-exp" style="font-size: 20px">
                    @if ($logged_user->experience)
                        {{ $logged_user->experience }}
                    @else
                        N/A
                    @endif
                </div>


            </div> --}}







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
