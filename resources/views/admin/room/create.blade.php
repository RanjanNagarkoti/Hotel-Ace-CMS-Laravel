@extends('layouts.admin-master')
@section('content')
    <form action="{{ url('/hotel-ace/admin/room/store') }}" class="form" method="POST"
        enctype="multipart/form-data">
        @csrf
        @include('admin.room.form')
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <img id="output">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
        </div>
    </form>

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
