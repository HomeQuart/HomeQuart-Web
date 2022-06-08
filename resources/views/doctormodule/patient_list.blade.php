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
                    <h3>Brgy Health Worker's Patient Lists of  </h3>
                <p class="text-subtitle text-muted">List of quarantine patients under bhw:"{{$bhw[0]->full_name}}"</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Patient Lists</li>
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
                    Assigned Patient Quarantine Lists Datatable <br>

                    <div style="color:red"> <b>Red text indicates patient has not reported yet. </b> </div>
                </div>
               
                
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Profile</th>
                                <th>Assign Purok</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>    
                        </thead>
                        <tbody>


                            @foreach ($data as $key => $item)
                            @if($bhw[0]->assign_purok == $item->assign_purok)
                                <tr>
                                @if(($current_time <= 1159) && ($item->count_report != 1) || ($current_time >= 1200) && ($current_time <= 1659) && ($item->count_report != 2) || ($current_time >= 1700) && ($current_time <= 2359) && ($item->count_report != 3))
                                    <td class="id" style="color:red">{{ ++$key }}</td>
                                    <td class="full_name" style="color:red">{{ $item->full_name }}</td>
                                    <td class="profile">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->p_picture) }}" alt="{{ $item->p_picture }}">
                                        </div>
                                    </td>
                                    <td class="assign_purok" style="color:red">{{ $item->assign_purok }}</td>
                                @endif

                                @if(($current_time <= 1159) && ($item->count_report == 1) || ($current_time >= 1200) && ($current_time <= 1659) && ($item->count_report == 2) || ($current_time >= 1700) && ($current_time <= 2359) && ($item->count_report == 3))

                                    <td class="id">{{ ++$key }}</td>
                                    <td class="full_name">{{ $item->full_name }}</td>
                                    <td class="profile">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->p_picture) }}" alt="{{ $item->p_picture }}">
                                        </div>
                                    </td>
                                    <td class="assign_purok">{{ $item->assign_purok }}</td>
                                @endif
                                    @if($item->status =='Active')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status">{{ $item2->status }}</td>
                                    @endif
                                    @if($item->status =='Done')
                                    <td class="status">{{ Done }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ url('quarantineInformation/'.$item->id) }}">
                                            <span class="badge bg-primary">VIEW INFORMATION AND CONSULT</span>
                                        </a>  
                                        <a href="{{ url('reportList/'.$item->id) }}">
                                            <span class="badge bg-success">REPORT SUMMARY</span>
                                        </a>  
                                        <a href="{{ url('editPeriod/Account/'.$item->id) }}">
                                            <span class="badge bg-primary">EDIT PERIOD</span>
                                        </a>  
                                     </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 d-flex justify-content-end">
                        <a  href="{{ route('bhwList') }}"
                            class="btn btn-primary ">GO BACK</a>
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
