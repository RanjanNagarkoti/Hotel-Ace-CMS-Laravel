@extends('layouts.admin-master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Room Detail</h1>
        <a href="/hotel-ace/admin/room" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left"></i></a>
    </div>

    {{ Form::model($room, ['url' => "/hotel-ace/admin/room/$room->id/update",'method' => 'PUT','enctype' => 'multipart/form-data']) }}
    @include('admin.room.form')

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <img src="/images/room/{{ $room->imgIn }}" alt="Preview" id="edit-output">
        </div>
    </div>

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-secondary">Submit</button>
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
