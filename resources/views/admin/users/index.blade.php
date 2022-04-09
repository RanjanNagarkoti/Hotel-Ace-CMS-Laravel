@extends('layouts.admin-master')
@section('content')
    @include('includes.alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users List</h1>
        <a href="{{ url('/hotel-ace/admin/dashboard') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Home</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Fullname</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Country</th>
                <th scope="col">Contact</th>
                <th scope="col">Address</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $id = 1;
            @endphp
            @foreach ($data as $details)
                <tr>
                    <td>{{ $id++ }}</td>
                    <td>{{ $details->name }}</td>
                    <td>{{ $details->email }}</td>
                    <td>{{ $details->gender }}</td>
                    <td>{{ $details->country }}</td>
                    <td>{{ $details->contact }}</td>
                    <td>{{ $details->address }}</td>
                    <td><button data-id="{{ $details->id }}" class="btn" data-toggle="modal"
                            data-target="#deleteModal">
                            <i class="fas fa-trash"></i>
                        </button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('includes.deleteModel')
    <span>{{ $data->links() }}</span>
    <script>
        $('#deleteModal').on('show.bs.modal', function(e) {
            let selectedButton = $(e.relatedTarget);
            let id = selectedButton.data('id');
            $(this).find('.delete-form').attr('action', '/hotel-ace/admin/users/' + id + '/destroy');
        });
    </script>
@endsection
