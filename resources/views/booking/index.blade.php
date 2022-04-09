@extends('layouts.master')
@section('content')
    <div class="give-space">
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-3">
            <h1 class="h3 mb-0 text-gray-800">My Bookings</h1>
        </div>

        <table class="table">
            <thead class="btn-success">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Room no</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Billing</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $id = 1;
                @endphp
                @foreach ($data as $details)
                    <tr class="btn-primary">
                        <td>{{ $id++ }}</td>
                        <td>{{ $details->fullname }}</td>
                        <td>{{ $details->room_no }}</td>
                        <td>{{ $details->check_in }}</td>
                        <td>{{ $details->check_out }}</td>
                        <td>{{ $details->billing }}</td>
                        <td>{{ $details->status }}</td>
                        <td>
                            @if ($details->billing == 'Unpaid')
                                <a href="/hotel-ace/{{ $details->id }}/billing" class="btn-sm btn-info">Pay</a>
                            @else
                                <button class="btn-sm btn-success" disabled>Settled</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                @foreach ($paid as $details)
                    <tr class="btn-info">
                        <td>{{ $id++ }}</td>
                        <td>{{ $details->fullname }}</td>
                        <td>{{ $details->room_no }}</td>
                        <td>{{ $details->check_in }}</td>
                        <td>{{ $details->check_out }}</td>
                        <td>{{ $details->billing }}</td>
                        <td>{{ $details->status }}</td>
                        <td>
                            <button class="btn-sm btn-primary" disabled>Settled</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
