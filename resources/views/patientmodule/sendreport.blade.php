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
                    <h3>Send Your Daily Reports</h3>
                    <p class="text-subtitle text-muted">Update Daily Reports</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daily Report  Update</li>
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
                    <h4 class="card-title">Click the button below</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <a href="{{ url('reports/view/detail/'.Auth::user()->id) }}">
                        <button type="button" class="btn btn-primary btn-lg">Send a Report for this day</button>
                        </a>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <br><hr>
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