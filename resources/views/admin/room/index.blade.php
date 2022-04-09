@extends('layouts.admin-master')
@section('content')
    @include('includes.alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rooms List</h1>
        <a href="{{ url('/hotel-ace/admin/room/create') }}"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i> Add Room</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Room No.</th>
                <th scope="col">Type</th>
                <th scope="col">Capacity</th>
                <th scope="col">Price</th>
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
                    <td>{{ $details['room-no'] }}</td>
                    <td>
                        @if ($details['type'] == 1)
                            Standard Room
                        @elseif($details['type'] == 2)
                            Deluxe Room
                        @elseif($details['type'] == 3)
                            Family Room
                        @elseif($details['type'] == 4)
                            Single Room
                        @elseif($details['type'] == 5)
                            Luxry Room
                        @endif
                    </td>
                    <td>{{ $details['capacity'] }} Person</td>
                    <td>${{ $details['price'] }} PRPN</td>
                    <td>

                        @if ($details['status'] == 'Available')
                            <span class="btn btn-success">Available</span>
                        @else
                            <span class="btn btn-primary">Booked</span>
                        @endif

                    </td>
                    <td>
                        <a href="/hotel-ace/admin/room/{{ $details['id'] }}"></a>
                    <td>
                        <button data-id="{{ $details->id }}" class="btn" data-toggle="modal"
                            data-target="#deleteModal">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
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
            $(this).find('.delete-form').attr('action', '/hotel-ace/admin/room/destroy/' + id);
            console.log(id);
        });
    </script>
@endsection
