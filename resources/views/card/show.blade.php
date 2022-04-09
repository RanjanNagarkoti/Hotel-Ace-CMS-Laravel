@extends('layouts.master')
@section('content')
    <div class="give-space">
        <div class="d-sm-flex align-items-center justify-content-between mt-3 mb-3">
            <h1 class="h3 mb-0 text-gray-800">Your Card Details.</h1>
            <a href="/hotel-ace/{{ $detail[0]->user_id }}/card/edit"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Edit</a>
        </div>
        {{ Form::model($detail[0], ['url' => '#', 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'book-rooms-forms']) }}
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    {!! Form::label('card_holder_name', 'Card holder name', ['class' => 'form-label']) !!}
                    {!! Form::text('card_holder_name', null, ['class' => 'form-control', 'id' => 'card_holder_name', 'disabled']) !!}
                    <br>
                    {!! Form::label('card_type', 'Card type', ['class' => 'form-label']) !!}
                    {!! Form::select('card_type', ['Credit card' => 'Credit card', 'Debit card' => 'Debit card', 'Visa card' => 'Visa card', 'Master card' => 'Master card'], null, ['class' => 'form-select', 'id' => 'card_type', 'disabled']) !!}
                    <br>
                    {!! Form::label('card_number', 'Card number', ['class' => 'form-label']) !!}
                    {!! Form::text('card_number', null, ['class' => 'form-control', 'id' => 'card_number', 'disabled']) !!}
                    <br>
                    {!! Form::label('cvc_cvv', 'CVC/CVV', ['class' => 'form-label']) !!}
                    {!! Form::text('cvc_cvv', null, ['class' => 'form-control', 'id' => 'cvc_cvv', 'disabled']) !!}
                    <br>
                    {!! Form::label('expiry_date', 'Expiry date', ['class' => 'form-label']) !!}
                    {!! Form::date('expiry_date', null, ['class' => 'form-control', 'id' => 'expiry_date', 'disabled']) !!}
                </div>
                <div class="col-sm"><img src="/images/card.png" alt=""></div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
@endsection
