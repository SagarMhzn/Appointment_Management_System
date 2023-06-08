@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('UnVerified Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You have not been verified yet!') }} <br>
                    {{ __('However you can modify your details so it can make it easier for the admin to verify you.') }}

                    <br><br>

                    <div>

                        <form method="POST" action="{{ route('doctor.update-profile') }}" enctype="multipart/form-data">
                            <div class="card-body " style="display:flex; flex-direction:row; margin-top:20px; ">
                                @csrf
                
                                @method('put')
                                <div class="doc-image" id="img-preview" >
                                    @if ($doctor->image)
                                        <img src="{{ url('public/Image/' . $doctor->image) }}"  alt="Image" 
                                       width="250"  height="200"
                                        style="margin: 0rem 0.8rem;border-radius:50%;" />
                                    @else
                                    <img src="{{ url('defaults/login-banner.png') }}"  alt="Image"
                                    width="300vw"  height="250vh"
                                        style="border-radius:50%;"
                                         />
                                    @endif
                
                
                
                                </div>
                                <div>
                                    <div class="" style="display:flex; flex-direction:row; justify-content:space-between;">
                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                
                                        <div class="col-md-12" style="margin-left:1rem;">
                                            <input id="name" type="text" class="form-control" name="name"
                                                value="{{ auth()->user()->name }}" autofocus>
                
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
                                                name="email" value="{{ auth()->user()->email }}">
                
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
                <br>
                
                                    <div class="">
                                        <div class="col-md-6 offset-md-">
                                            <button type="submit" class="btn btn-primary">
                                                {{ 'Update proflile' }}
                                            </button>
                
                
                
                                        </div>
                                    </div>
                                </div>
                
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
                imgPreview.innerHTML = `<img src="${this.result}" alt="" width="250" height="200" />`;
            });
        }
    }
</script>
@endsection
