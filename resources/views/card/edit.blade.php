@extends('layouts.master')
@section('content')
    <div class="give-space">
        <h4 class="margin">Edit your card credentials.</h4>
        {{ Form::model($detail[0], ['url' => "/hotel-ace/{$detail[0]->user_id}/card/edit/update", 'method' => 'PUT', 'class' => 'book-rooms-forms']) }}
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    {!! Form::label('card_holder_name', 'Card holder name', ['class' => 'form-label']) !!}
                    {!! Form::text('card_holder_name', null, ['class' => 'form-control', 'id' => 'card_holder_name']) !!}
                    <br>
                    {!! Form::label('type', 'Card type', ['class' => 'form-label']) !!}
                    {!! Form::select('type', ['Credit card' => 'Credit card', 'Debit card' => 'Debit card', 'Visa card' => 'Visa card', 'Master card' => 'Master card'], null, ['class' => 'form-select', 'id' => 'type']) !!}
                    <br>
                    {!! Form::label('card_number', 'Card number', ['class' => 'form-label']) !!}
                    {!! Form::text('card_number', null, ['class' => 'form-control', 'id' => 'card_number']) !!}
                    <br>
                    {!! Form::label('cvc_cvv', 'CVC/CVV', ['class' => 'form-label']) !!}
                    {!! Form::text('cvc_cvv', null, ['class' => 'form-control', 'id' => 'cvc_cvv']) !!}
                    <br>
                    {!! Form::label('expiry_date', 'Expiry date', ['class' => 'form-label']) !!}
                    {!! Form::date('expiry_date', null, ['class' => 'form-control', 'id' => 'expiry_date']) !!}
                </div>
                <div class="col-sm"><img src="/images/card.png" alt=""></div>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <div class="col-sm">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    <a href="/hotel-ace" class="btn btn-secondary">Go back</a>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>

    <script>
        let text = document.getElementsByClassName("form-control");
        text.disabled = false;
        console.log(text);
    </script>
@endsection
