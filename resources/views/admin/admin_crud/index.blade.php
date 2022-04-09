@extends('layouts.admin-master')
@section('content')
    @include('includes.alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin List</h1>
        <a href="{{ url('/hotel-ace/admin/create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus"></i> Create Admin</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $id = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <th>{{ $id++ }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>********</td>
                    <td>
                        <a href="/hotel-ace/admin/view/{{ $item->id }}/edit"><i class="fas fa-edit"></i></a>
                        <button data-id="{{$item->id}}" class="btn" data-toggle="modal"
                            data-target="#deleteModal">
                            <i class="fas fa-trash"></i>
                        </button></i>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    @include('includes.deleteModel')
    <script>
        $('#deleteModal').on('show.bs.modal', function(e) {
            let selectedButton = $(e.relatedTarget);
            let id = selectedButton.data('id');
            $(this).find('.delete-form').attr('action', '/hotel-ace/admin/view/destroy/' + id);
            console.log(id);
        });
    </script>
@endsection
