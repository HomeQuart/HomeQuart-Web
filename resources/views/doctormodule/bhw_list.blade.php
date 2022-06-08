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
                    <h3>Brgy Health Worker Lists</h3>
                <p class="text-subtitle text-muted">List of barangay health workers</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Assign Purok for BHW</li>
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
                    Barangay Heathworker Lists Datatable
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
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="full_name">{{ $item->full_name }}</td>
                                    <td class="full_name">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->p_picture) }}" alt="{{ $item->p_picture }}">
                                        </div>
                                    </td>
                                    <td class="assign_purok">{{ $item->assign_purok }}</td> 
                                    @if($item->status =='Active')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Done')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ url('assignPurok/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-bullseye" title="Assign This To a Purok"></i></span>
                                        </a>  
                                        <a href="{{ url('patientListBHW/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-list" title="See Assigned Patients"></i></span>
                                        </a>  
                                     </td>
                                </tr>
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
