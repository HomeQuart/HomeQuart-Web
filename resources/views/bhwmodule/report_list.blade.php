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
                    <h3>Summary of Report Lists</h3>
                <p class="text-subtitle text-muted">Report List of this patient goes here</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Report List</li>
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
                  Report Lists Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Last Report Date</th>
                                <th>Report For</th>
                                <th>Action</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    @if($item->temp_input != '')
                                    <td class="full_name">{{ $item->full_name }}</td>
                                    <td class="date_time">{{ $item->date_time }}</td>
                                    <td class="date_time">{{ $item->daily_report }}</td>
                                    <td>
                                        <a href="{{ url('viewDetailReport/'.$item->id) }}">
                                            <span class="badge bg-primary"><i class="bi bi-view-list" title="View More of This Report"></i></span>
                                        </a>  
                                     </td>
                                     @endif
                                    @endforeach
                                </tr>
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