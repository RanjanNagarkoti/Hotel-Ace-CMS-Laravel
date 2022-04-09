@extends('layouts.admin-master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Staff</h1>
        <a href="{{ url('/hotel-ace/admin/room/create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-right"></i></a>
    </div>
    <form action="{{route('staffs.store')}}" method="POST" enctype="multipart/form-data">
        @include('admin.about.form')
    </form>
@endsection
