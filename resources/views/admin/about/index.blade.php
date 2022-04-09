@extends('layouts.admin-master')
@section('content')
    @include('includes.alert')
    @include('includes.deleteModel')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Staffs List</h1>
        <a href="{{ route('staffs.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus"></i> Add Staff</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Fullname</th>
                <th scope="col">Position</th>
                <th scope="col">Profile</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $id = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $id++ }}</th>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['position'] }}</td>
                    <td><img src="{{ url('/images/staffs/' . $item['profile']) }}" alt="profile picture"
                            class="small-preview"></td>
                    <td>
                        <a href="{{ url('hotel-ace/admin/staffs/' . $item['id'] . '/edit') }}"
                            class="btn"><i class="fas fa-edit"></i></a>
                        <button data-id="{{ $item->id }}" class="btn" data-toggle="modal"
                            data-target="#deleteModal">
                            <i class="fas fa-trash-alt"></i>
                        </button></i>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $('#deleteModal').on('show.bs.modal', function(e) {
            let selectedButton = $(e.relatedTarget);
            let id = selectedButton.data('id');
            $(this).find('.delete-form').attr('action', '/hotel-ace/admin/staffs/destroy/' + id);
            console.log(id);
        });
    </script>
@endsection
