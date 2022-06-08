@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
<div id="main">
    <style>
        .avatar.avatar-im .avatar-content, .avatar.avatar-xl img {
            width: 40px !important;
            height: 40px !important;
            font-size: 1rem !important;
        }
        .form-group[class*=has-icon-]s .form-select {
            padding-left: 2rem;
        }

    </style>
    
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Your SwabTest Result </h3>
                    <p class="text-subtitle text-muted">You have successfully done swabtest</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Done Swab Test View </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 

        @if (Auth::user()->role_name=='Patient')
        {{-- message --}}
        {!! Toastr::message() !!}
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Your SwabTest Details</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        @foreach ($data as $key => $item)
                        @if($item->swab_result != '')
                        @if ($loop->last)
                        <div class="row">
                            <div class="col-md-4">
                                <label>ID</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="ID" id="first-name-icon" name="id" value=" {{+$key}}" readonly>
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Full Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Full Name" id="first-name-icon" name="full_name" value="{{ $item->full_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Swab Test Result:</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Swab Test Result" id="first-name-icon" name="swabtest_result" value="{{ $item->swab_result }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Swab Test Proof:</label>
                            </div>
                            <div class="col-md-8">
                                <img src="{{ URL::to('/swabtestImage/'. $item->swab_proof) }}" alt="{{ $item->swab_proof }}" width="100%">
                            </div>
                        </div>
                        <br>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <br>
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