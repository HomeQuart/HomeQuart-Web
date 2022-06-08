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
                            <h3>Patient Quarantine Information</h3>
                            <p class="text-subtitle text-muted">Includes personal details, temperature progress etc.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Patient Quarantine Information</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <section class="section">
                    <div class="card">
                        <section class="row">
                            <div class="col-12">
                                <div class="row">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <center>
                                                <h5>Patient Quarantine Information Details</h5>
                                                </center>
                                                    <hr>
                                                <div class="row-col-md-12">
                                                    <section class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                <center>
                                                                                    <table>
                                                                                        <tr>    
                                                                                        @foreach ($data as $items)
                                                                                        @if ($loop->last)
                                                                                        <h5>{{ $items->temp_input }} °c</h5>
                                                                                        @endif
                                                                                        @endforeach
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <p>Last Temperature</p>
                                                                                        </tr>
                                                                                    </table>
                                                                                </center>
                                                                                    
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                        <table>
                                                                                            <tr>
                                                                                            @foreach ($data as $items)
                                                                                            @if ($loop->last)
                                                                                            <h5>{{ $items->date_time }}</h5>
                                                                                            @endif
                                                                                             @endforeach
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <p>Last Report/Measure</p>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                    <table>
                                                                                            <tr>
                                                                                            @foreach ($dataconsult as $items)
                                                                                            @if ($loop->last)
                                                                                            <h5> {{ $items->daily_report }}</h5>
                                                                                            @endif
                                                                                             @endforeach
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <p>Recent Update For</p>
                                                                                            </tr>
                                                                                        </table>
                                                                                        
                                                                                    </center>   
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                        <table >
                                                                                            <tr>
                                                                                            @foreach ($data as $items)
                                                                                            @if ($loop->last)
                                                                                            <h5>{{ $items->patient_symptoms }}</h5>
                                                                                            @endif
                                                                                             @endforeach
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <p>Symptoms</p>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </center>   
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                        <table>
                                                                                            <tr>
                                                                                            @foreach ($dataconsult as $items)
                                                                                            @if ($loop->last)
                                                                                            <h5>Until {{ $items->qperiod_end }}</h5>
                                                                                            @endif
                                                                                             @endforeach
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <p>Quarantine End Date</p>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                    <table >
                                                                                            <tr>
                                                                                            @foreach ($dataswab as $items)
                                                                                            @if ($loop->last)
                                                                                            <h5>{{ $items->swab_result }}</h5>
                                                                                            @endif
                                                                                             @endforeach
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <p>Swab Test Status</p>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6 col-lg-4 col-md-6"></div>
                                                                <div class="col-6 col-lg-4 col-md-6">
                                                                    <div class="card">
                                                                            <div class="card-body px-3 py-4-5">
                                                                                <div class="row">
                                                                                        <center>
                                                                                            <table>
                                                                                                <tr>
                                                                                                @foreach ($data as $items)
                                                                                                @if ($loop->last)
                                                                                                @foreach ($dataswab as $items2)
                                                                                                @if(($items->patient_symptoms == 'none') && ($items2->swab_result == 'Positive') )
                                                                                                <h5>
                                                                                                    Assymptomatic
                                                                                                </h5>
                                                                                                @endif
                                                                                                @if(($items->patient_symptoms != '') && ($items2->swab_result == '') && ($items->patient_symptoms != 'none'))
                                                                                                <h5>
                                                                                                    Mild
                                                                                                </h5>
                                                                                                @endif
                                                                                                @if(($items->patient_symptoms != '') && ($items2->swab_result == 'Positive') )
                                                                                                <h5>
                                                                                                    Symptomatic
                                                                                                </h5>
                                                                                                @endif
                                                                                                @if(($items->patient_symptoms == 'none') && ($items2->swab_result == 'Negative') )
                                                                                                <h5>
                                                                                                    Recovering
                                                                                                </h5>
                                                                                                @endif
                                                                                                @endforeach
                                                                                                @endif
                                                                                                @endforeach
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <p>Health Status</p>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </center>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="col-6 col-lg-4 col-md-6"></div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                    <section class="row">
                                                        <div class="col-12">
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <table >
                                                                                            <center><h6>Personal Information</h6></center>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <b>Name:</b>
                                                                                            </td>
                                                                                            <td>
                                                                                            {{ $data[0]->full_name }}<br>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                            <b>Place of Isolation: </b>
                                                                                            </td>
                                                                                            <td>
                                                                                            {{ $data[0]->place_isolation }} <br>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                            <b>Assign Purok: </b>
                                                                                            </td>
                                                                                            <td>
                                                                                            {{ $data[0]->assign_purok }} <br>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                    <center>
                                                                                        
                                                                                        <h6>Temperature Progress</h6>
                                                                                      
                                                                                        <div class="divScroll"> @foreach ($data as $key => $items)
                                                                                            @if ($items->temp_input != '')
                                                                                            <td><b>{{$key++}}: </b>{{ $items->temp_input }}°c <br> {{$items->date_time}}</td>
                                                                                            <br>
                                                                                            <br>
                                                                                            @endif
                                                                                             @endforeach
                                                                                            </div>
                                                                                        
                                                                                    </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="card">
                                                                        <div class="card-body px-3 py-4-5">
                                                                            <div class="row">
                                                                                <div class="col-md-8">
                                                                                    <table>
                                                                                    <center><h6>Summary</h6></center>
                                                                                        <tr>
                                                                                        @foreach ($dataconsult as $key => $items)
                                                                                            @if ($loop->last)
                                                                                            <td><b>Medicine Intake: </b>{{ $items->recommend_medicine }}</td>
                                                                                            @endif
                                                                                             @endforeach
                                                                                        </tr>
                                                                                        <tr>
                                                                                        @foreach ($dataswab as $key => $items)
                                                                                            @if ($loop->last)
                                                                                            <td> <b>Swab Status: </b> {{ $items->swab_report }}</td>
                                                                                            @endif
                                                                                             @endforeach
                                                                                        </tr>
                                                                                        <tr>
                                                                                        @foreach ($dataswab as $key => $items)
                                                                                            @if ($loop->last)
                                                                                            <td> <b>Swab Result: </b> {{ $items->swab_result }}</td>
                                                                                            @endif
                                                                                             @endforeach
                                                                                        </tr>
                                                                                        
                                                                                        <tr>
                                                                                        @foreach ($dataconsult as $key => $items)
                                                                                            @if ($loop->last)
                                                                                            <td> <b>Remarks:  </b>{{ $items->remarks }}</td>
                                                                                            @endif
                                                                                             @endforeach
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <form class="form form-horizontal" action="{{ route('consultupdate') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                                                            <input type="hidden" name="user_id" value="{{ $data[0]->user_id }}" readonly>
                                                            <div class="form-body">
                                                                <div class="row">
                                                                    <center>
                                                                    <h5>Prescription for this Patient</h5> <br>
                                                                    </center>
                                                                    <div class="col-md-4">
                                                                        <label> <b>Patient Name:</b></label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group has-icon-left">
                                                                            <div class="position-relative">
                                                                                <input type="text" class="form-control" name="full_name" value="{{ $data[0]->full_name }}" readonly>
                                                                                <div class="form-control-icon">
                                                                                    <i class="bi bi-person"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <label><b>Medicine needed to be intake:</b></label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table>
                                                                            <div class="form-group position-relative has-icon-left mb-4">
                                                                                <fieldset class="form-group">
                                                                                        <select class="form-control @error('recommend_medicine') is-invalid @enderror" class="form-select" name="recommend_medicine" id="recommend_medicine">  
                                                                                                <option hidden selected disabled><--Select Medicine--></option>
                                                                                                @foreach ($assignM as $key => $value)
                                                                                                    <option value="{{ $value->medicine_name }}"> {{ $value->medicine_name }}</option>
                                                                                                @endforeach  
                                                                                        </select>
                                                                                </fieldset>
                                                                                @error('recommend_medicine')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                    <div class="col-md-4">
                                                                            <label><b>Important Remarks for the Patient:</b></label>
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <table>
                                                                                <tr>
                                                                                    <td>
                                                                                       <textarea class="form-control @error('remarks') is-invalid @enderror" name="remarks" id="remarks" cols="120" rows="3" placeholder="Remarks here..."></textarea> 
                                                                                    </td>
                                                                                    @error('remarks')
                                                                                        <span class="invalid-feedback" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <br>
                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary me-1 mb-1">CONSULT</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                        </section>
                    </div>
                </section>
            
            </section>
            
            <!-- {{-- message --}}
            {!! Toastr::message() !!} -->
            
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
    @endif
@endsection