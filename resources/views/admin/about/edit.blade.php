@extends('layouts.admin-master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Staff</h1>
        <a href="{{ url('/hotel-ace/admin/room/create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-arrow-right"></i></a>
    </div>
    {{ Form::model($data, ['url' => "hotel-ace/admin/staffs/$data->id/update", 'method' => 'PUT']) }}
    <div class="row">
        <div class="col">
            <label for="name">Fullname</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}">
            <br>
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $data['position'] }}">
            <br>
            <label for="profile">Profile picture</label>
            <input type="file" class="form-control" accept="image/*" id="profile" name="profile"
                onchange="showPreview(event)" value="{{ $data['profile'] }}">
            <br>
            <button class="btn btn-primary">Submit</button>
        </div>
        <div class="col">
            <img src="{{ url('/images/staffs/' . $data['profile']) }}" id="output">
            <img src="{{ url('/images/staffs/' . $data['profile']) }}" alt="" id="edit-preview">
        </div>
    </div>
    {{ Form::close() }}

    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var output = document.getElementById("output");
                output.src = src;
                output.style.display = "block";
            }
        }
    </script>
@endsection
