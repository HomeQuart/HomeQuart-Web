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
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Consultations From The Doctor</h3>
                            <p class="text-subtitle text-muted">Recent Consultations From The Doctor</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Consultations</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                           Consultations Details
                        </div>
                        <section class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="card-content">
                                        <div class="card-body"> 
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Recommended Medicine:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                        @foreach ($data as $items)
                                                        @if(Auth::user()->user_id == $items->user_id)
                                                        @if($loop->last)
                                                                <h5>{{ $items->recommend_medicine }}</h5>
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Doctor Remarks:</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                        @foreach ($data as $key => $items)
                                                        @if( $items->user_id == Auth::user()->user_id)
                                                            @if ($loop->last)
                                                                <h5>{{ $items->remarks }}</h5>
                                                            @endif
                                                        @endif
                                                        @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                </div>
            </footer>
        </div>
    @endif
@endsection