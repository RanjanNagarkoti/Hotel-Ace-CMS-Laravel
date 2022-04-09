@extends('layouts.master')
@section('content')
    <h1>Billing</h1>
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 30rem;">
            <img src="{{ url('/images/billing.jpg') }}" class="card-img-top" alt="Chicago Skyscrapers" />
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Room No: {{$data[0]->room_no}}</li>
                <li class="list-group-item">Check In: {{$data[0]->check_in}}</li>
                <li class="list-group-item">Check Out: {{$data[0]->check_out}}</li>
                <li class="list-group-item">Room Price: {{$price[0]}} PN</li>
                <li class="list-group-item">Toal Price: <b>{{$total}}$</b></li>

            </ul>
            <div class="card-body">
                <a href="/hotel-ace/{{$data[0]->id}}/billing/pay" class="btn-sm btn-primary">Pay</a>
                <a href="#" class="btn-sm btn-secondary">Cancel</a>
            </div>
        </div>
    </div>
@endsection
