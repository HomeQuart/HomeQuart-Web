@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')

@if (Auth::user()->role_name=='BHW')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="col-12 col-lg-3" style="float: right">  
            <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ URL::to('/images/'. Auth::user()->p_picture) }}" alt="{{ Auth::user()->p_picture }}">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ Auth::user()->full_name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <h1>Barangay Health Worker Dashboard</h1>
        <hr>
        
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="page-content">
            <section class="row">
                <div class="col-12 ">
                    {{-- <div class="row">
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Patients</h6>
                                            <h6 class="font-extrabold mb-0">{{ $activity_logs }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Under Quarantine</h6>
                                            <h6 class="font-extrabold mb-0">{{ $user_activity_logs }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Done Quarantine</h6>
                                            <h6 class="font-extrabold mb-0">{{ $users }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                    {{-- user profile modal --}}
                    <div class="card-body">
                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-body">
                                            <div class="row">

                                            <div class="col-md-4">
                                                    <label>Role Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="{{ Auth::user()->role_name }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Full Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="full_name" value="{{ Auth::user()->full_name }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Age</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->age }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Gender</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="gender" value="{{ Auth::user()->gender }}" readonly>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-gender-ambiguous"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Mobile Number</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->contactno }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Assign Purok</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->assign_purok }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="{{ Auth::user()->status }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Email Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </section>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><hr>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Home Quart</p>
                </div>
            </div>
        </footer>
    </div>
@endif

@if (Auth::user()->role_name=='Doctor')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="col-12 col-lg-3" style="float: right">  
            <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ URL::to('/images/'. Auth::user()->p_picture) }}" alt="{{ Auth::user()->p_picture }}">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ Auth::user()->full_name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <h1>Doctor Dashboard</h1>
        <hr>
        
        {{-- message --}}
        {!! Toastr::message() !!}
       

                @foreach ($purok as $puroks)
                <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldUser"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">PUROK {{ $puroks->purok_name }}</h6>
                                            <h6 class="font-extrabold mb-0"> Positive Patient: {{ $puroks->positive_counter }}</h6>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            </tr>
                </div>

                @endforeach

                <div class="page-content">
                <section class="row">
                <div class="col-12 ">

                <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon Red">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Positive Patient</h6>
                                            <h6 class="font-extrabold mb-0">{{ $positive_counter }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>

      
                    {{-- user profile modal --}}
                    <div class="card-body">
                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-body">
                                            <div class="row">

                                            <div class="col-md-4">
                                                    <label>Role Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="{{ Auth::user()->role_name }}" readonly>
                                                           
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Full Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="full_name" value="{{ Auth::user()->full_name }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Age</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->age }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Gender</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="gender" value="{{ Auth::user()->gender }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Mobile Number</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->contactno }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="{{ Auth::user()->status }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Email Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- end user profile modal --}}

                </div>
            </section>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><hr>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Home Quart</p>
                </div>
            </div>
        </footer>
    </div>
@endif

@if (Auth::user()->role_name=='Admin')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="col-12 col-lg-3" style="float: right">  
            <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ URL::to('/images/'. Auth::user()->p_picture) }}" alt="{{ Auth::user()->p_picture }}">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ Auth::user()->full_name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <h1>Admin Dashboard</h1><hr>
        
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="page-content">
            <section class="row">
                <div class="col-12 ">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Activity Log</h6>
                                            <h6 class="font-extrabold mb-0">{{ $activity_logs }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">User Activity log</h6>
                                            <h6 class="font-extrabold mb-0">{{ $user_activity_logs }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                    {{-- user profile modal --}}
                    <div class="card-body">
                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-body">
                                            <div class="row">

                                            <div class="col-md-4">
                                                    <label>Role Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="{{ Auth::user()->role_name }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Full Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="full_name" value="{{ Auth::user()->full_name }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Age</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->age }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Gender</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="gender" value="{{ Auth::user()->gender }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Mobile Number</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->contactno }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="{{ Auth::user()->status }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Email Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- end user profile modal --}}
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><hr>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Home Quart</p>
                </div>
            </div>
        </footer>
    </div>
@endif

@if (Auth::user()->role_name=='Patient')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="col-12 col-lg-3" style="float: right">  
            <div class="card" data-bs-toggle="modal" data-bs-target="#default">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ URL::to('/images/'. Auth::user()->p_picture) }}" alt="{{ Auth::user()->p_picture }}">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{ Auth::user()->full_name }}</h5>
                            <h6 class="text-muted mb-0">{{ Auth::user()->email }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>
        <h1>Quarantine Patient Dashboard</h1>
        <hr>
        
        {{-- message --}}
        {!! Toastr::message() !!}
       
                               
                                    <div class="row">
                                        <center> <h5>Remaining Quarantine Period</h5></center><hr>
                                        {{-- insert the countdown timer here --}}
                                        <center>
                                        <div id="getting-started"></div>
                                      
                                            <div class="row">
                                                    
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <td class ="text-center">Days</td>
                                                                <td class ="text-center">Hours</td>
                                                                <td class ="text-center">Minutes</td>
                                                                <td class ="text-center">Seconds</td>
                                                            </tr>
                                                            <tr>
                                                                <td id = "day" class= "display-4 bg-dark text-white text-center"></td>
                                                                <td id = "hour" class= "display-4 bg-dark text-white text-center"></td>
                                                                <td id = "minutes" class= "display-4 bg-dark text-white text-center"></td>
                                                                <td id = "seconds" class= "display-4 bg-dark text-white text-center"></td>
                                                            </tr>
                                                        </table>
                                                   
                                            </div>
                                        
                                    </center>
                                    
                                    <!-- <script>
                                    if(document.getElementById('#day').value == 0 && document.getElementById('#hour').value == 0 && document.getElementById('#minutes').value == 0 document.getElementById('#seconds').value == 0)
                                    {
                                        
                                    }
                                </script> -->
                            
                    
                </div>
                    {{-- user profile modal --}}
                    <div class="card-body">
                        <!--Basic Modal -->
                        <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-body">
                                            <div class="row">

                                            <div class="col-md-4">
                                                    <label>Role Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="{{ Auth::user()->role_name }}" readonly>
                                                           
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Full Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="full_name" value="{{ Auth::user()->full_name }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Age</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->age }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Gender</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="gender" value="{{ Auth::user()->gender }}" readonly>
                                                           
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Mobile Number</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->contactno }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Contact Person</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{ Auth::user()->contact_per }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Assign Purok</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->assign_purok }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Place of Isolation</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->place_isolation }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" value="{{ Auth::user()->status }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Email Address</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- end user profile modal --}}

                    
                </div>
            </section>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><hr>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Home Quart</p>
                </div>
            </div>
        </footer>
    </div>
@endif
@endsection