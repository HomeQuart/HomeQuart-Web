@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
    @if (Auth::user()->role_name=='Doctor')
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
                            <h3>Edit End Quarantine Period </h3>
                            <p class="text-subtitle text-muted">You can move this patient's Quarantine Period</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Quarantine Period</li>
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
                            Edit the End of Quarantine Period For This Patient:
                            <input type="text" class="form-control" placeholder="Name" id="first-name-icon" name="full_name" value="{{ $data[0]->full_name }}"readonly>
                            
                        </div>
                        <section class="row">
                            <div class="col-12">
                                <div class="row">
                                        <div class="card-content">
                                            <div class="card-body">
                                            <form class="form form-horizontal" action="{{ route('qperiodEdit') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $data[0]->id }}" hid>
                                                    <input type="text" name="user_id" value="{{ $data[0]->user_id }}" readonly hidden><br>
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Start of Quarantine Period</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <div class="position-relative">
                                                                        <input type="date" class="form-control"
                                                                            placeholder="qperiod_start" id="first-name-icon" name="qperiod_start" value="{{ $data[0]->qperiod_start }}"readonly>
                                                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>End of Quarantine Period</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <div class="position-relative">
                                                                        <input type="date" class="form-control"
                                                                            placeholder="qperiod_end" id="first-name-icon" name="qperiod_end" value="{{ $data[0]->qperiod_end }}">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                        <div class="row">
                                                            <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">EDIT</button>
                                                            <a  href="{{ route('activeaccounts') }}"
                                                                class="btn btn-light-secondary btn-lg me-1 mb-1">CANCEL</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            
                        </section>
                    </div>
                    {{-- message --}}
                    {!! Toastr::message() !!}
                
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
                </section>
            </div>
             
            
        </div>
    @endif
@endsection