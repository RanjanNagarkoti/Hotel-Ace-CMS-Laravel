@extends('layouts.admin-master')
@section('content')
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="POST" action="{{ url('hotel-ace/admin/register/store') }}">
        @csrf

        <div>
            <label for="name" class="form-lable">Name</label>
            <input type="text" id="name" name="name" class="form-control" :value="old('name')" required autofocus>
        </div>

        <div class="mt-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" :value="old('email') required">
        </div>

        <div class="mt-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="btn-sm btn-primary">Submit</button>
            <a href="/hotel-ace/"></a>
        </div>
    </form>
@endsection
