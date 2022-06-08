@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
    @if (Auth::user()->role_name=='Patient')
    {{-- message --}}
    {!! Toastr::message() !!}
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
                            <h3>Send Daily Report</h3>
                            <p class="text-subtitle text-muted">Send your report here</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Send Report</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                           Send Report Details
                        </div>
                        <section class="row">
                            <div class="col-12">
                                <div class="row">
                                        <div class="card-content">
                                            <div class="card-body">
                                            <form class="form form-horizontal" action="{{ route('patientreportupdate') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                                    <input type="text" name="user_id" value="{{ $data[0]->user_id }}" hidden readonly>
                                                    <div class="form-body">
                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label>Full Name</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <div class="position-relative">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Full Name" id="first-name-icon" name="full_name" value="{{ $data[0]->full_name }}"readonly>
                                                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label>Report for</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <div class="position-relative">
                                                                        <input  name="daily_report" type="text" id="daily_report" class="form-control" value="{{$repDay}}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label> Selfie w/ Temperature in Thermometer</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <div class="position-relative">
                                                                        <input class="form-control @error('temp_proof') is-invalid @enderror" name="temp_proof" type="file" id="temp_proof" multiple="" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('temp_proof')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label> Input Temperature</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <div class="position-relative">
                                                                    <input class="form-control @error('temp_input') is-invalid @enderror" type="text" class="form-control"
                                                                        placeholder="Input your Temperature for today" id="temp_input" name="temp_input">  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('temp_input')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label> Specify Symptoms</label>
                                                                <label> (Leave it "none" if there's no symptoms) </label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <div class="position-relative">
                                                                    <input class="form-control @error('patient_symptoms') is-invalid @enderror" type="text" class="form-control"
                                                                        placeholder="Leave it 'none' if there's no symptoms" id="patient_symptoms" name="patient_symptoms" value="none">  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('patient_symptoms')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label>Medicine Intaked</label>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group position-relative mb-4">
                                                                    <fieldset class="form-group">
                                                                        <select class="form-select" name="patient_medicine" id="patient_medicine">  
                                                                            @foreach ($med as $key => $value)
                                                                            <option value="" disabled hidden selected> <-- choose medicine --></option>
                                                                            <option value="{{ $value->medicine_name }}"> {{ $value->medicine_name }}</option>
                                                                            @endforeach  
                                                                        </select> 
                                                                    </fieldset>
                                                                </div>
                                                            </div>

                                                            <!-- <input type="hidden" name="count_report" > -->
                                                            <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">Send Report</button>
                                                            <a  href="{{ route('sendreport') }}"
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