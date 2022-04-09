@extends('layouts.admin-master')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Users</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-black-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Booking</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $booking }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-black-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Admins</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-lock fa-2x text-black-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Rooms</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $room }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-university fa-2x text-black-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Recent Checkout and Checkin's</h1>
        <table class="table">
            <thead class="btn-success">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Room no</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $id = 1;
                @endphp
                @foreach ($data as $details)
                    <tr class="btn-primary">
                        <td>{{ $id++ }}</td>
                        <td>{{ $details->fullname }}</td>
                        <td>{{ $details->room_no }}</td>
                        <td>{{ $details->check_in }}</td>
                        <td>{{ $details->check_out }}</td>
                        @if ($details->status == 'Checked In')
                            <td><span class="btn-sm btn-success">{{ $details->status }}</span></td>
                        @else
                            <td><span class="btn-sm btn-danger">{{ $details->status }}</span></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
