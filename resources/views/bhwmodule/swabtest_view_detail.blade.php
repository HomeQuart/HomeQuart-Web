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
                        <h3>Update To Report Swab Test Result</h3>
                        <p class="text-subtitle text-muted">Update this patient swabtest result</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Swab Test Report View Update</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div> 

            @if (Auth::user()->role_name=='BHW')
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patient  Details SwabTest</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('swabtestupdate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                <input type="text" name="user_id" value="{{ $data[0]->user_id }}" readonly hidden>
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
                                            <label>Assign Purok</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Assign Purok" id="purok" name="assign_purok" value="{{ $data[0]->assign_purok }}"readonly>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="text"name="swab_report" value="Done Swabtest" hidden>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Swab Test Result</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group position-relative has-icon-left mb-4">
                                                <fieldset class="form-group">
                                                    <select class="form-control @error('swab_proof') is-invalid @enderror" name="swab_result" id="swab_result">  
                                                        @foreach ($result_s as $key => $value)
                                                        <option value="{{ $value->result_swab }}"> {{ $value->result_swab }}</option>
                                                        @endforeach  
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-bag-check"></i>
                                                    </div>
                                                </fieldset>
                                                @error('swab_result')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>SwabTest Proof</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-groups">
                                                <div class="position-relative">
                                                <input name="swab_proof" type="file" id="swab_proof" multiple="" class="form-control @error('swab_proof') is-invalid @enderror">
                                                </div>
                                            </div>
                                            @error('swab_proof')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                            
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">UPDATE REPORT</button>
                                            <a  href="{{ route('swabtest') }}"
                                                class="btn btn-light-secondary me-1 mb-1">CANCEL</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                        <h4 class="card-title">Patient  Details SwabTest</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-horizontal" action="{{ route('swabtestupdate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                <input type="text" name="user_id" value="{{ $data[0]->user_id }}" readonly hidden>
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
                                            <label>Assign Purok</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Assign Purok" id="purok" name="assign_purok" value="{{ $data[0]->assign_purok }}"readonly>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <input type="text"name="swab_report" value="Done Swabtest" hidden>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Swab Test Result</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group position-relative has-icon-left mb-4">
                                                <fieldset class="form-group">
                                                    <select class="form-control @error('swab_proof') is-invalid @enderror" name="swab_result" id="swab_result">  
                                                        @foreach ($result_s as $key => $value)
                                                        <option value="{{ $value->result_swab }}"> {{ $value->result_swab }}</option>
                                                        @endforeach  
                                                    </select>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-bag-check"></i>
                                                    </div>
                                                </fieldset>
                                                @error('swab_result')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>SwabTest Proof</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-groups">
                                                <div class="position-relative">
                                                <input class="form-control @error('swab_proof') is-invalid @enderror" name="swab_proof" type="file" id="swab_proof" multiple="">
                                                </div>
                                            </div>
                                            @error('swab_proof')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">UPDATE REPORT</button>
                                            <a  href="{{ route('swabtest') }}"
                                                class="btn btn-light-secondary me-1 mb-1">CANCEL</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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