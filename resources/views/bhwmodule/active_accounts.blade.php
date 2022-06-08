@extends('layouts.master')
@section('menu')
@extends('sidebar.dashboard')
@endsection
@section('content')
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
                    <h3>Active Quarantine Patient Management Control</h3>
                    <p class="text-subtitle text-muted">List of active accounts for the patients</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Active Account Mangement
                                
                            </li>
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
                    Active Accounts Datatable <br>
                    <div style="color:red"> <b>Red text indicates patient has not reported yet. </b> </div>
                </div>
                <a href="{{ route('register') }}">
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Add Patient</button>
                </a>
                <div class="card-body">
                    <table class="table table-striped" id="table1" style="font-size:.8rem">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Profile</th>
                                <th>Age</th>
                                <th>Purok</th>
                                <th>Isolation</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Contact No.</th>
                                <th>Contact Person</th>
                                <th>Swab Test Status</th>
                                <th>Quarantine Period</th>
                                <th>Account Status</th>
                                <th class="text-center">Action</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                @if($item->assign_purok == Auth::user()->assign_purok)
                                <tr>
                                    
                                @if(($current_time <= 1159) && ($item->count_report != 1) || ($current_time >= 1200) && ($current_time <= 1659) && ($item->count_report != 2) || ($current_time >= 1700) && ($current_time <= 2359) && ($item->count_report != 3))
                                    <td class="id" style="color:red">{{ ++$key }}</td>
                                    <td class="full_name" style="color:red">{{ $item->full_name }}</td>
                                    <td class="photo">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->p_picture) }}" alt="{{ $item->p_picture }}">
                                        </div>
                                    </td>
                                    <td class="age" style="color:red">{{ $item->age }}</td>
                                    <td class="assign_purok" style="color:red">{{ $item->assign_purok }}</td>
                                    <td class="assign_purok" style="color:red">{{ $item->place_isolation }}</td>
                                    <td class="address" style="color:red">{{ $item->address }}</td>
                                    <td class="gender" style="color:red">{{ $item->gender }}</td>
                                    <td class="contact_no" style="color:red">{{ $item->contactno }}</td>
                                    <td class="contact_per" style="color:red">{{ $item->contact_per }}</td>
                                    <td class="swab_report" style="color:red">{{ $item->swab_report }}</td>
                                    <td class="qperiod_end" style="color:red">{{ $item->qperiod_start }} until {{ $item->qperiod_end }}</td>
                                    @endif

                                    @if(($current_time <= 1159) && ($item->count_report == 1) || ($current_time >= 1200) && ($current_time <= 1659) && ($item->count_report == 2) || ($current_time >= 1700) && ($current_time <= 2359) && ($item->count_report == 3))
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="full_name">{{ $item->full_name }}</td>
                                    <td class="photo">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->p_picture) }}" alt="{{ $item->p_picture }}">
                                        </div>
                                    </td>
                                    <td class="age">{{ $item->age }}</td>
                                    <td class="assign_purok">{{ $item->assign_purok }}</td>
                                    <td class="assign_purok">{{ $item->place_isolation }}</td>
                                    <td class="address">{{ $item->address }}</td>
                                    <td class="gender">{{ $item->gender }}</td>
                                    <td class="contact_no">{{ $item->contactno }}</td>
                                    <td class="contact_per">{{ $item->contact_per }}</td>
                                    <td class="swab_report">{{ $item->swab_report }}</td>
                                    <td class="qperiod_end">{{ $item->qperiod_start }} until {{ $item->qperiod_end }}</td>
                                    @endif
                                    @if($item->status =='Active')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Done')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if ($item->place_isolation == 'Isolation Facility')
                                    <td class="text-center">
                                        <a href="{{ url('sendReport/Account/'.$item->id) }}">
                                            <span class="badge bg-success"><i class="bi bi-flag-fill" title="Send Report For This Patient"></i></span>
                                        </a>  
                                     </td>
                                     <!-- <td class="text-center">
                                        <a href="{{ url('editPeriod/Account/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-pencil-fill" title="Edit Quarantine Period"></i></span>
                                        </a>  
                                     </td> -->
                                     <td class="text-center">
                                        <a href="{{ url('reportList/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-list" title="See Report Lists"></i></span>
                                        </a>  
                                     </td>
                                     <td class="text-center">
                                        <a href="{{ url('patientconsulation/Account/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-three-dots" title="See Consultations"></i></span>
                                        </a>  
                                     </td>
                                    @endif
                                    @if ($item->place_isolation != 'Isolation Facility')
                                    <td class="text-center">
                                        <p>can't report</p>
                                    </td>
                                    <!-- <td class="text-center">
                                        <a href="{{ url('editPeriod/Account/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-pencil-fill" title="Edit Quarantine Period" ></i></span>
                                        </a>  
                                     </td> -->
                                     <td class="text-center">
                                        <a href="{{ url('reportList/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-list" title="See Report Lists"></i></span>
                                        </a>  
                                     </td>
                                     <td class="text-center">
                                        <a href="{{ url('patientconsulation/Account/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-three-dots"  title="See Consultations"></i></span>
                                        </a>  
                                     </td>
                                    @endif
                                    
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
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
