@extends('layouts.admin-master')
@section('content')
    @include('includes.alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Booking List</h1>
        <a href="{{ url('/hotel-ace/admin/dashboard') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Home</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Number</th>
                <th scope="col">Check-in</th>
                <th scope="col">Check-out</th>
                <th scope="col">Room No.</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $id = 1;
            @endphp
            @foreach ($data as $details)
                <tr>
                    <th scope="row">{{ $id++ }}</th>
                    <td>
                        @if (!$details['fullname'])
                            {{ $details['user_id'] }}
                        @else
                            {{ $details['fullname'] }}
                        @endif
                    </td>
                    <td>{{ $details['number'] }}</td>
                    <td>{{ $details['check_in'] }}</td>
                    <td>{{ $details['check_out'] }}</td>
                    <td>{{ $details['room_no'] }}</td>
                    <td>{{ $details['status'] }}</td>
                    <td class="d-flex justify-content-around">
                        @if ($details['status'] != 'Checked Out')
                            <form action="/hotel-ace/admin/booking/{{ $details['id'] }}" method="POST">
                                @csrf
                                <button class="btn-sm btn-success" type="submit">Checkout</button>
                            </form>
                        @endif

                        <button data-id="{{ $details->id }}" class="btn-sm btn-danger" data-toggle="modal"
                            data-target="#deleteModal">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <span>{{ $data->links() }}</span>
    @include('includes.deleteModel')
    <script>
        $('#deleteModal').on('show.bs.modal', function(e) {
            let selectedButton = $(e.relatedTarget);
            let id = selectedButton.data('id');
            $(this).find('.delete-form').attr('action', '/hotel-ace/admin/booking/destroy/' + id);
        });
    </script>
@endsection
