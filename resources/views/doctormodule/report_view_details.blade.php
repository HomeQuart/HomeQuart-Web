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
                    <h3>Detailed Report </h3>
                    <p class="text-subtitle text-muted">Detailed Daily Report Of This Patient</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detailed Report </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 

        @if (Auth::user()->role_name=='Doctor')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Patient Daily Report Details</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Report For</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="daily_report" id="first-name-icon" name="daily_report" value="{{ $data[0]->daily_report }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Symptoms</b></label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Symptoms" id="first-name-icon" name="patient_symptoms" value="{{ $data[0]->patient_symptoms }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Temperature</b></label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Temperature" id="first-name-icon" name="temp_input" value="{{ $data[0]->temp_input }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Medicine Intaked</b></label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Medicine intaked" id="first-name-icon" name="patient_medicine" value="{{ $data[0]->patient_medicine }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Date Reported</b></label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="date" id="first-name-icon" name="date_time" value="{{ $data[0]->date_time }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Selfie with Temperature in Thermometer</b></label>
                            </div>
                            <div class="col-md-8">
                            <img src="{{ URL::to('/reportImage/'. $data[0]->temp_proof) }}" alt="{{ $data[0]->temp_proof }}" width="100%">
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        @endif

        @if (Auth::user()->role_name=='Patient')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Patient Daily Report Details</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Report For</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="daily_report" id="first-name-icon" name="daily_report" value="{{ $data[0]->daily_report }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Symptoms</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Symptoms" id="first-name-icon" name="patient_symptoms" value="{{ $data[0]->patient_symptoms }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Temperature</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Temperature" id="first-name-icon" name="temp_input" value="{{ $data[0]->temp_input }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Medicine Intaked</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="Medicine intaked" id="first-name-icon" name="patient_medicine" value="{{ $data[0]->patient_medicine }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Date Reported</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control"
                                            placeholder="date" id="first-name-icon" name="date_time" value="{{ $data[0]->date_time }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Selfie w/ Temperature in Thermometer</label>
                            </div>
                            <div class="col-md-8">
                            <img src="{{ URL::to('/reportImage/'. $data[0]->temp_proof) }}" alt="{{ $data[0]->temp_proof }}" width="100%">
                            </div>
                        </div>
                        <br>
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