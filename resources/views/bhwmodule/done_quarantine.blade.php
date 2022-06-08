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
                    <h3>Patient Done Quarantine</h3>
                 <p class="text-subtitle text-muted">List of done quarantine patients</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Done Quarantine</li>
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
                    Patient Done Quarantine Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Profile</th>
                                <th>Purok</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Contact No.</th>
                                <th>Email Certificate</th>
                                <th>Status</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                @if($item->assign_purok == Auth::user()->assign_purok)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    <td class="full_name">{{ $item->full_name }}</td>
                                    <td class="profile">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->p_picture) }}" alt="{{ $item->p_picture }}">
                                        </div>
                                    </td>
                                  

                                    <td class="full_name">{{ $item->assign_purok }}</td>
                                    <td class="full_name">{{ $item->address }}</td>
                                    <td class="full_name">{{ $item->gender }}</td>
                                    <td class="full_name">{{ $item->contactno }}</td>


                                    <td class="email">
                                        <a href="https://mail.google.com/mail/u/0/?fs=1&to={{ $item->email }}&tf=cm">
                                    {{ $item->email }}</a></td>
                                    @if($item->status =='Active')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    @if($item->status =='Done')
                                    <td class="status">{{ $item->status }}</td>
                                    @endif
                                    <!-- <td>  
                                        <a href="{{ url('delete_user/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete this patient?')"><span class="badge bg-primary"><i class="bi bi-trash"></i>DELETE</span></a>
                                     </td> -->
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
        <div class="footer clearfix mb-0 text-muted ">
            <div class="float-start">
                <p>2021 &copy; Home Quart</p>
            </div>
        </div>
    </footer>
</div>
@endsection
