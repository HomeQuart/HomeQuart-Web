@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
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
                            <h3>Purok Creation Control</h3>
                            <p class="text-subtitle text-muted">Add Purok Residences</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Purok </li>
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
                            <center><h1>ADD NEW PUROK</h1> </center>
                            <br>
                        <form method="POST" action="{{ route('purok/add/save') }}" class="md-float-material" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="text" class="form-control form-control-lg @error('purok_name') is-invalid @enderror" name="purok_name" value="{{ old('purok_name') }}" placeholder="Enter Purok Name">
                                    <div class="form-control-icon">
                                        <i class="bi bi-house-door"></i>
                                    </div>
                                    @error('purok_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="form-group position-relative has-icon-left mb-4">
                                    <input type="text" class="form-control form-control-lg @error('comp_address') is-invalid @enderror" name="comp_address" value="{{ old('comp_address') }}" placeholder="Enter Complete Address">
                                    <div class="form-control-icon">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                    @error('comp_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">ADD</button>
                            </form>
                            <div class="text-center mt-5 text-lg fs-4">
                                <p class='text-gray-600'>Go <a href="{{ route('purokManagement') }}"
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

