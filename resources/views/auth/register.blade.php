@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Client Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
                        {{-- <div class="row mb-3">
                            <label for="date-of-birth_AD" class="col-md-4 col-form-label text-md-end">{{ __('DoB (AD)') }}</label>

                            <div class="col-md-6">
                                <input id="dob-ad" type="date" class="form-control" name="date-of-birth_AD" required>
                            </div>
                        </div> --}}
                        {{-- <div class="row mb-3">
                            <label for="choose_file" class="col-md-4 col-form-label text-md-end">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <div>
                                    <div id="img-preview" ></div>
                                    <input type="file" class="form-control" id="choose-file" name="image"
                                         accept="image/*" />
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                                {{-- <a class="btn btn-link" href="{{ route('doctor.register') }}"> --}}
                                <a class="btn btn-link" href="{{ route('auth.doc.register') }}">
                                    {{ __('Are you a Doctor?') }}
                                </a>
                            </div>
                            {{-- <div class="login-to-register">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Dont have an account?') }}
                                </a>
                            </div> --}}
                        </div>
                    </form>
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
                                        // imgPreview.style.width = "20%";
                                        imgPreview.style.objectFit ='cover';
                                        imgPreview.innerHTML = '<div><img src="' + this.result + '" style="object-fit: cover; width: 50%;margin-bottom: 1rem;"/>';
                                    });
                                }
                            }
</script>
@endsection
