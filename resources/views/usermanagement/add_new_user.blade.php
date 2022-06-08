
@extends('layouts.master')
@extends('sidebar.dashboard')
@section('content')

<div id="auth">
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Add New User Control</h3>
                        <p class="text-subtitle text-muted">Add New Purok</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add User </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            {{-- message --}}
            {!! Toastr::message() !!}
            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <center><h1>Add New User Account</h1></center> <br>
                        <form method="POST" action="{{ route('user/add/save') }}" class="md-float-material" enctype="multipart/form-data">
                            @csrf
    
                            <div class="form-group position-relative  mb-4">
                                <fieldset class="form-group">
                                    <select class="form-select @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                                        <option hidden selected disabled>Select Role Name</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="BHW">Barangay Health Worker</option>
                                    </select>
                                </fieldset>
                                @error('role_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <input type="text" class="form-control form-control-lg @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}" placeholder="Enter Your Full Name">
                                
                                @error('full_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <input type="tel" class="form-control form-control-lg @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" placeholder="Enter Your Age">
                                
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <fieldset class="form-group">
                                    <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                                        <option hidden selected disabled>Choose a Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    
                                </fieldset>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <input type="tel" class="form-control form-control-lg @error('contactno') is-invalid @enderror" name="contactno" value="{{ old('contactno') }}" placeholder="Enter Your Contact Number">
                                
                                @error('contactno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <input class="form-control @error('p_picture') is-invalid @enderror" name="p_picture" type="file" id="p_picture" multiple="">
                                
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <input type="text" class="form-control form-control-lg @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Enter Your Complete Address">
                                
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <fieldset class="form-group">
                                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                        <option hidden selected value="Active">Active</option>
                                    </select>
                                </fieldset>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Choose Password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-group position-relative  mb-4">
                                <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Choose Confirm Password">
                                
                            </div>
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Create</button>
                        </form>
                        <div class="text-center mt-5 text-lg fs-4">
                            <p class='text-gray-600'>Go <a href="{{ route('userManagement') }}"
                            class="font-bold">Back?</a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Home Quart</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                >Team Fix-it</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
