
@extends('layouts.app')
@section('content')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-6 col-12">
                <div id="auth-left">
                    <div>
                    <a><img src="assets/images/logo/logo.png" alt="Logo" width="100%" heigh="50%"></a>
                    </div>
                    <br><br>
                    <center>
                    <h1>Create New Patient</h1>
                    <h4>Register patient's credential</h4>
                    </center>
                    <br>
                    
                    <form method="POST" action="{{ route('register') }}" class="md-float-material" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                                    <option hidden selected value="Patient">Patient</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" placeholder="Enter Patient Full Name">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="tel" class="form-control form-control-lg @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" placeholder="Enter Patient Age">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                                    <option hidden selected>Choose a Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="tel" class="form-control form-control-lg @error('contactno') is-invalid @enderror" name="contactno" value="{{ old('contactno') }}" placeholder="Enter Patient Contact Number">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            @error('contactno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input class="form-control @error('p_picture') is-invalid @enderror" name="p_picture" type="file" id="p_picture" multiple="">
                            <div class="form-control-icon">
                                <i class="bi bi-person-square"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Enter Patient Complete Address">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="tel" class="form-control form-control-lg @error('contact_per') is-invalid @enderror" name="contact_per" value="{{ old('contact_per') }}" placeholder="Patient Person Contact Number">
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            @error('contact_per')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                    <select class="form-select" name="assign_purok" id="assign_purok">  
                                            <option disabled hidden selected >Purok</option>
                                            @foreach ($assignP as $key => $value)
                                                <option value="{{ $value->purok_name }}"> {{ $value->purok_name }}</option>
                                            @endforeach  
                                    </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                            </fieldset>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select @error('place_isolation') is-invalid @enderror" name="place_isolation" id="place_isolation">
                                    <option hidden selected >Place of Isolation</option>
                                    <option value='Home Quarantine'>Home Quarantine</option>
                                    <option value='Isolation Facility'> Isolation Facility</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('place_isolation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  

                        <div class="form-group position-relative has-icon-left mb-4">
                            <fieldset class="form-group">
                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                    <option hidden selected value="Disable">Waiting for the Barangay Health Worker Approval</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-exclude"></i>
                                </div>
                            </fieldset>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text"name="swab_report" value="Pending Swabtest" hidden>
                            
                        </div>

                        

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Choose Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Choose Confirm Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Create</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div id="auth-right">
                    <div class="col-md-8">
                        <img src="assets/images/signup_background.png" width="180%">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

