@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            @foreach ($errors->all() as $errors)
                <h4 class="text-danger " style="color:red;">{{ $errors }}
                </h4>
            @endforeach
        @endif
            <div class="card">
                <div class="card-header">{{ __('Doctor Registeration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.doc.register') }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  id="name" type="text" class="form-control " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autocomplete="email">

                               
                            </div>
                        </div>

                        

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone No.') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="dateAD" class="col-md-4 col-form-label text-md-end">{{ __('DoB (AD)') }}</label>

                            <div class="col-md-6">
                                <input id="dob-ad" type="date" class="form-control" name="dateAD" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="choose_file" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <div>
                                    <div id="img-preview" ></div>
                                    <input type="file" class="form-control" id="image" name="image"
                                         accept="image/*"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="license" class="col-md-4 col-form-label text-md-end">{{ __('License No.') }}</label>

                            <div class="col-md-6">
                                <input id="license" type="text" class="form-control" name="license" required>
                            </div>
                        </div><div class="row mb-3">
                            <label for="qualifications" class="col-md-4 col-form-label text-md-end">{{ __('Qualification') }}</label>

                            <div class="col-md-6">
                                <input id="qual" type="text" class="form-control" name="qualifications" required>
                            </div>
                        </div><div class="row mb-3">
                            <label for="experience" class="col-md-4 col-form-label text-md-end">{{ __('Exprience') }}</label>

                            <div class="col-md-6">
                                <input id="exp" type="text" class="form-control" name="experience" required>
                            </div>
                        </div><div class="row mb-3">
                            <label for="field_of_expertize" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <input id="foe" type="text" class="form-control" name="field_of_expertize" required>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                                <a class="btn btn-link" href="{{ url('/') }}">
                                    {{ __('Not a Doctor?') }}
                                </a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const chooseFile = document.getElementById("image");
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
                                        // imgPreview.style.width = "20%";
                                        imgPreview.style.objectFit ='cover';
                                        imgPreview.innerHTML = '<div><img src="' + this.result + '" style="object-fit: cover; width: 50%;margin-bottom: 1rem;"/>';
                                    });
                                }
                            }
</script>
@endsection
