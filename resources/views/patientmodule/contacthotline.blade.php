@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
    @if (Auth::user()->role_name=='Patient')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Contact Hotlines</h3>
                            <p class="text-subtitle text-muted">Contact Hotlines You Can Contact</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Hotlines</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
            </header>
            

            {{-- message --}}
            {!! Toastr::message() !!}
            <section class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldCall"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Barangay Hotline</h6>
                                                <h6 class="font-semibold underlined">+639 066 326 678</h6>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldCall"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Municipaity Emergency</h6>
                                                <h6 class="font-semibold underlined">+639 606 552 871</h6>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldCall"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Municipaity Hospital</h6>
                                                <h6 class="font-semibold underlined">+639 226 990 332</h6>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldCall"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">User Contact Person</h6>
                                                <h6 class="font-semibold underlined">{{Auth::user()->contact_per}}</h6>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                
            {{-- user profile modal --}}
            <div class="card-body">
                <!--Basic Modal -->
                <div class="modal fade text-left" id="default" tabindex="-1" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel1">User Profile</h5>
                                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                    X
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Full Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="full_name" value="{{ Auth::user()->full_name }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Mobile Number</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="number" class="form-control" value="{{ Auth::user()->contactno }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <div class="col-md-4">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="{{ Auth::user()->status }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-bag-check"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Role Name</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="{{ Auth::user()->role_name }}" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-exclude"></i>
                                                    </div>
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
            {{-- message --}}
            {!! Toastr::message() !!}
        
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