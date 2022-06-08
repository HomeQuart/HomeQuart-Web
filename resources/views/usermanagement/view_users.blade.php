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
        .form-group[class*=has-icon-].has-icon-lefts .form-select {
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
                    <h3>User Management View</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Mangement View</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 

        @if (Auth::user()->role_name=='Admin')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User View Detail</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body" style="font-size:.6rem">
                                <div class="row">

                                <div class="col-md-4">
                                        <label>Role Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="role_name" id="role_name">
                                                    <option value="{{ $data[0]->role_name }}" {{ ( $data[0]->role_name == $data[0]->role_name) ? 'selected' : ''}}> 
                                                        {{ $data[0]->role_name }}
                                                    </option>
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Full Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Full Name" id="first-name-icon" name="full_name" value="{{ $data[0]->full_name }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Age</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number" class="form-control"
                                                    placeholder="Age" name="age" value="{{ $data[0]->age }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="gender" id="gender">  
                                                    @foreach ($gendertype as $key => $value)
                                                    <option value="{{ $value->type_of_genders }}"> {{ $value->type_of_genders }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Contact Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number" class="form-control"
                                                    placeholder="Contact Number" name="contactno" value="{{ $data[0]->contactno }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Profile Picture</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-lefts">
                                            <div class="position-relative">
                                                <input type="hidden" class="form-control"
                                                placeholder="Profile Picture" id="first-name-icon" name="p_picture"/>
                                                <div class="form-control-icon avatar avatar.avatar-im">
                                                    <img src="{{ URL::to('/images/'. $data[0]->p_picture) }}">
                                                </div>
                                                <input type="hidden" name="hidden_image" value="{{ $data[0]->p_picture }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Address" id="first-name-icon" name="address" value="{{ $data[0]->address }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Contact Person</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number" class="form-control"
                                                    placeholder="Contact Person" name="contact_per" value="{{ $data[0]->contact_per }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Purok</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="assign_purok" id="assign_purok">  
                                                    @foreach ($assignP as $key => $value)
                                                    <option value="{{ $value->purok_name }}"> {{ $value->purok_name }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Place of Isolation</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="place_isolation" id="place_isolation">  
                                                    @foreach ($placeisolation as $key => $value)
                                                    <option value="{{ $value->place_of_isolation }}"> {{ $value->place_of_isolation }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="status" id="status">  
                                                    @foreach ($userStatus as $key => $value)
                                                    @if($data[0]->role_name == 'Patient')
                                                    <option value="{{ $value->type_name }}"> {{ $value->type_name }}</option>
                                                    @endif
                                                    @if($data[0]->role_name != 'Patient')
                                                    @if($value->type_name != 'Done')
                                                    <option value="{{ $value->type_name }}"> {{ $value->type_name}}</option>
                                                    @endif
                                                    @endif
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Email Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" class="form-control"
                                                    placeholder="Email" id="first-name-icon" name="email" value="{{ $data[0]->email }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a  href="{{ route('userManagement') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Back</a>
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


    @if (Auth::user()->role_name=='BHW')
    <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User View Detial</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}">
                            <div class="form-body">
                                <div class="row">

                                <div class="col-md-4">
                                        <label>Role Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Role Name" id="first-name-icon" name="role_name" value="{{ $data[0]->role_name }}"readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Full Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Full Name" id="first-name-icon" name="full_name" value="{{ $data[0]->full_name }}"readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Age</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number" class="form-control"
                                                    placeholder="Age" name="age" value="{{ $data[0]->age }}" readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Gender</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Gender" id="first-name-icon" name="gender" value="{{ $data[0]->gender }}"readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Contact Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number" class="form-control"
                                                    placeholder="Contact Number" name="contactno" value="{{ $data[0]->contactno }}" readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Profile Picture</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-lefts">
                                            <div class="position-relative">
                                                <input type="hidden" class="form-control"
                                                placeholder="Profile Picture" id="first-name-icon" name="p_picture"/>
                                                <div class="form-control-icon avatar avatar.avatar-im">
                                                    <img src="{{ URL::to('/images/'. $data[0]->p_picture) }}">
                                                </div>
                                                <input type="hidden" name="hidden_image" value="{{ $data[0]->p_picture }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Address" id="first-name-icon" name="address" value="{{ $data[0]->address }}"readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Contact Person</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number" class="form-control"
                                                    placeholder="Contact Person" name="contact_per" value="{{ $data[0]->contact_per }}" readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Place of Isolation</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control"
                                                    placeholder="Place of Isolation" id="first-name-icon" name="place_isolation" value="{{ $data[0]->place_isolation }}"readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group position-relative has-icon-left mb-4">
                                            <fieldset class="form-group">
                                                <select class="form-select" name="status" id="status">  
                                                    @foreach ($userStatus as $key => $value)
                                                    <option value="{{ $value->type_name }}"> {{ $value->type_name }}</option>
                                                    @endforeach  
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-bag-check"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Email Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" class="form-control"
                                                    placeholder="Email" id="first-name-icon" name="email" value="{{ $data[0]->email }}" readonly>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1">Update</button>
                                        <a  href="{{ route('userManagement') }}"
                                            class="btn btn-light-secondary me-1 mb-1">Back</a>
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