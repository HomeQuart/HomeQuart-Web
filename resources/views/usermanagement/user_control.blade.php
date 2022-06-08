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
                    <h3>User Management Control</h3>
                    <p class="text-subtitle text-muted">List of User Accounts</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Account Management</li>
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
                    User Accounts Datatable
                </div>
                <a href="{{ route('user/add/new') }}">
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Add New User</button>
                </a>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role Name</th>
                                <th>Full Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Phone Number</th>
                                <th>Profile</th>
                                <th>Address</th>
                                <th>Contact Person</th>
                                <th>Assign Purok</th>
                                <th>Place of Isolation</th>
                                <th>Status</th>
                                <th>Email Address</th>
                                <th class="text-center">Modify</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td class="id">{{ ++$key }}</td>
                                    @if($item->role_name =='Admin')
                                    <td class="role_name"><span  class="badge bg-success">{{ $item->role_name }}</span></td>
                                    @endif
                                    @if($item->role_name =='Doctor')
                                    <td class="role_name"><span  class="badge bg-info">{{ $item->role_name }}</span></td>
                                    @endif
                                    @if($item->role_name =='BHW')
                                    <td class="role_name"><span  class="badge bg-info">{{ $item->role_name }}</span></td>
                                    @endif
                                    @if($item->role_name =='Patient')
                                    <td class="role_name"><span  class=" badge bg-warning">{{ $item->role_name }}</span></td>
                                    @endif
                                    <td class="full_name">{{ $item->full_name }}</td>
                                    <td class="age">{{ $item->age }}</td>
                                    <td class="gender">{{ $item->gender }}</td>
                                    <td class="contactno">{{ $item->contactno }}</td>
                                    <td class="p_picture">
                                        <div class="avatar avatar-xl">
                                            <img src="{{ URL::to('/images/'. $item->p_picture) }}" alt="{{ $item->p_picture }}">
                                        </div>
                                    </td>
                                    <td class="address">{{ $item->address }}</td>
                                    <td class="contact_per">{{ $item->contact_per }}</td>
                                @foreach ($purok as $puroks)
                                    @if($puroks->purok_name == $item->assign_purok )
                                    <td class="assign_purok">{{ $item->assign_purok }}</td>
                                    @endif
                                @endforeach
                                @if($item->role_name == 'Admin')
                                <td> </td>
                                @endif
                                @if($item->role_name == 'Doctor')
                                <td> </td>
                                @endif
                                @if($item->role_name == 'BHW' && $item->assign_purok == "")
                                <td> </td>
                                @endif
                                    <td class="place_isolation">{{ $item->place_isolation }}</td>
                                    @if($item->status =='Active')
                                    <td class="status"><span class="badge bg-success">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status =='Disable')
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status =='Done')
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    @if($item->status ==null)
                                    <td class="status"><span class="badge bg-danger">{{ $item->status }}</span></td>
                                    @endif
                                    <td class="email">{{ $item->email }}</td>
                                    <td class="text-center">
                                        <!-- <a href="{{ route('user/add/new') }}">
                                            <span class="badge bg-info"><i class="bi bi-person-plus-fill"></i></span>
                                        </a> -->
                                        <a href="{{ url('view/detail/'.$item->id) }}">
                                            <span class="badge bg-success"><i class="bi bi-pencil-square"></i></span>
                                        <!-- </a>  
                                        <a href="{{ url('delete_user/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><span class="badge bg-danger"><i class="bi bi-trash"></i></span></a> -->
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
