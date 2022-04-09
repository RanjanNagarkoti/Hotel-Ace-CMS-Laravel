@extends('layouts.master')
@section('content')
    <div class="give-space">
        <h1>Quote of the day</h1>
        <div class="liner"></div>
        <div class="quote">
            <p id="quotes"></p>
        </div>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="{{ url('/images/standard-room.jpg') }}" style="width:100%" class="slide-img-long">
                <div>
                    <p class="text-long">STANDARD ROOM</p>
                </div>
            </div>

            <div class="mySlides fade">
                <img src="{{ url('/images/deluxe-room.jpg') }}" style="width:100%" class="slide-img-long">
                <div>
                    <p class="text-long">DELUXE ROOM</p>
                </div>
            </div>

            <div class="mySlides fade">
                <img src="{{ url('/images/luxry-room.jpg') }}" style="width:100%" class="slide-img-long">
                <div>
                    <p class="text-long">LUXRY ROOM</p>
                </div>
            </div>

            <div class="mySlides fade">
                <img src="{{ url('/images/single-room.jpg') }}" style="width:100%" class="slide-img-long">
                <div>
                    <p class="text-long">SINGLE ROOM</p>
                </div>
            </div>

            <div class="mySlides fade">
                <img src="{{ url('/images/family-room.jpg') }}" style="width:100%" class="slide-img-long">
                <div>
                    <p class="text-long">FAMILY ROOM</p>
                </div>
            </div>

        </div>

        <h2 class="my-h2">Enter your credentials</h2>

        <form action="/hotel-ace/{{ Auth::user()->id }}/booking/store" class="book-rooms-forms">

            <div class="container">

                <div class="row">
                    <div class="col-sm">
                        {!! Form::label('for', 'Booking room for', ['class' => 'form-label']) !!}
                        <select name="for" id="for" class="form-control" onchange="forWhom()">
                            <option value="1">For others</option>
                            <option value="2">For me</option>
                        </select>
                    </div>
                    <div class="com-sm">
                        <input type="text" disabled value="{{ Auth::user()->id }}" hidden id="userId">
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="row">

                    <div class="col-sm">
                        {!! Form::label('fullname', 'Full Name', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="text" name="fullname" id="fullname" class="form-control hide" required>
                    </div>

                    <div class="col-sm">
                        {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="email" name="email" id="email" class="form-control hide" required>
                    </div>

                    <div class="col-sm">
                        {!! Form::label('number', 'Number', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="text" name="number" id="number" class="form-control hide" required>
                    </div>

                </div>

            </div>
            <div class="container">

                <div class="row">

                    <div class="col-sm">
                        {!! Form::label('country', 'Country', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="text" name="country" id="country" class="form-control hide" required>
                    </div>

                    <div class="col-sm">
                        {!! Form::label('check-in', 'Check-in', ['class' => 'form-label']) !!} <sup>*</sup>
                        <input type="date" name="check-in" id="check-in" class="form-control hide" required
                            onchange="checkDate()">
                    </div>

                    <div class="col-sm">
                        {!! Form::label('check-out', 'Check-out', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="date" name="check-out" id="check-out" class="form-control hide" required
                            onchange="dateValid()">
                        <span id="date-checker"></span>
                    </div>

                </div>

            </div>

            <div class="container">

                <div class="row">

                    <div class="col-sm">
                        {!! Form::label('room-type', 'Room-type', ['class' => 'form-label']) !!}
                        <select name="room-type" id="room-type" class="form-select" onchange="filter()">
                            <option value="1">Standard Room</option>
                            <option value="2">Deluxe Room</option>
                            <option value="3">Family Room</option>
                            <option value="4">Luxry Room</option>
                            <option value="5">Single Room</option>
                        </select>
                    </div>

                    <div class="col-sm">
                        {!! Form::label('room-no', 'Room-no', ['class' => 'form-label']) !!}<sup>*</sup>
                        <select name="room-no" id="room-no" class="form-select" onchange="checkDate()"></select>
                        <span id="room_status"></span>
                    </div>

                    <div class="col-sm">
                        {!! Form::label('card-holder-name', 'Card holder name', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="text" name="card-holder-name" id="card-holder-name" class="form-control hide" required>
                    </div>
                </div>

            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        {!! Form::label('card-type', 'Card type', ['class' => 'form-label']) !!}
                        <select name="card-type" id="card-type" class="form-select" value="4">
                            <option value="Credit card">Credit card</option>
                            <option value="Debit card">Debit card</option>
                            <option value="Master card">Master card</option>
                            <option value="Visa card">Visa card</option>
                        </select>
                        <br>
                        {!! Form::label('card-number', 'Card number', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="text" name="card-number" id="card-number" class="form-control hide" required>
                        <br>
                        {!! Form::label('expiry-date', 'Expiry date', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="date" name="expiry-date" id="expiry-date" class="form-control hide" required>
                        <br>
                        {!! Form::label('cvc-cvv', 'CVC/CVV', ['class' => 'form-label']) !!}<sup>*</sup>
                        <input type="text" name="cvc-cvv" id="cvc-cvv" class="form-control hide" required>
                    </div>
                    <div class="col-sm"><img src="/images/card.png" alt=""></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        {!! Form::submit('Book', ['class' => 'btn btn-primary', 'id' => 'booking_btn']) !!}
                        <a href="/hotel-ace/rooms" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </div>
    <script>
        var container = document.getElementById("room-no");
        var p = document.getElementById('quotes');

        function standard() {
            container.innerHTML = '';
            let id = document.getElementById('room-type').value;
            let url = 'http://127.0.0.1:8000/api/room/data/1';

            fetch(url).then((response) => {
                return response.json();
            }).then((data) => {
                for (let i = 0; i < data.length; i++) {
                    container.innerHTML += '<option>' + data[i] + '</option>';
                }
            });
        }
        standard();

        function filter() {
            container.innerHTML = '';
            let id = document.getElementById('room-type').value;
            let url = 'http://127.0.0.1:8000/api/room/data/' + id;

            fetch(url).then((response) => {
                return response.json();
            }).then((data) => {
                for (let i = 0; i < data.length; i++) {
                    container.innerHTML += '<option>' + data[i] + '</option>';
                }
            });
        }

        function quotes() {
            let id = document.getElementById('quotes');
            fetch("https://quotes15.p.rapidapi.com/quotes/random/", {
                "method": "GET",
                "headers": {
                    "x-rapidapi-host": "quotes15.p.rapidapi.com",
                    "x-rapidapi-key": "3512d5af67mshe8b8a2f6ad64f9ap15cc2cjsn4137edac1ef2"
                }
            }).then((response) => {
                return response.json();
            }).then((data) => {
                id.innerHTML = "\"" + data.content + "\"";
            })
        }
        quotes();

        function data() {
            let id = document.getElementById('for');
            id.addEventListener("change", Ranjan);

            let url = 'http://127.0.0.1:8000/api/room/data/1';

            function Ranjan() {
                fetch(url).then((response) => {
                    return response.json();
                }).then((data) => {
                    for (let i = 0; i < data.length; i++) {
                        container.innerHTML += '<option>' + data[i] + '</option>';
                    }
                });
            }
        }

        data();

        function forWhom() {
            let forI = document.getElementById("for");
            console.log(forI.value);
            let name = document.getElementById("fullname");
            let email = document.getElementById("email");
            let number = document.getElementById("number");
            let country = document.getElementById("country");
            let cardName = document.getElementById("card-holder-name");
            let cardNumber = document.getElementById("card-number");
            let cvc = document.getElementById("cvc-cvv");
            let expiryDate = document.getElementById("expiry-date");
            let cardType = document.getElementById("card-type");

            let id = document.getElementById("userId").value;
            let url = "http://127.0.0.1:8000/api/" + id + "/detail";
            console.log("URL: " + url);

            if (forI.value == 2) {
                function Ranjan() {
                    fetch(url).then((response) => {
                        return response.json();
                    }).then((data) => {
                        console.log(data.data);
                        name.value = data.data.name;
                        email.value = data.data.email;
                        number.value = data.data.contact;
                        country.value = data.data.country;
                        cardName.value = data.card.card_holder_name;
                        cardNumber.value = data.card.card_number;
                        cvc.value = data.card.cvc_cvv;
                        expiryDate.value = data.card.expiry_date;
                        cardType.innerHTML = '<option>' + data.card.type + '</option>';
                    });
                }
            } else {
                console.log(data.data);
                name.value = '';
                email.value = '';
                number.value = '';
                country.value = '';
                cardName.value = '';
                cardNumber.value = '';
                cvc.value = '';
                expiryDate.value = '';
                cardType.innerHTML = '<option value="Credit card">Credit card</option>' +
                    '<option value="Debit card">Debit card</option>' +
                    '<option value="Master card">Master card</option>' +
                    '<option value="Visa card">Visa card</option>';
            }

            Ranjan();

        }

        function checkDate() {
            let room_status = document.getElementById('room_status');
            let check_in = document.getElementById('check-in').value;
            let room_no = document.getElementById('room-no').value;
            let btn = document.getElementById('booking_btn');

            let url = "http://127.0.0.1:8000/api/check/" + check_in.concat('/').concat(room_no);

            if (!check_in) {
                room_status.style.color = "red";
                room_status.innerHTML = "Invalid Date"
            } else {
                fetch(url).then((response) => {
                    return response.json();
                }).then((data) => {
                    if (data.msg == "Available") {
                        room_status.style.color = "blue";
                        room_status.innerHTML = data.msg;
                        btn.disabled = false;

                    } else if (data.msg == "Booked") {
                        room_status.style.color = "red";
                        room_status.innerHTML = data.msg;
                        btn.disabled = true;
                    }
                });
            }

        }

        function dateValid() {
            let cin = document.getElementById('check-in').value;
            let cout = document.getElementById('check-out').value;
            let msg = document.getElementById('date-checker');
            let btn = document.getElementById('booking_btn');

            if (cin > cout) {
                msg.style.color = "red";
                msg.innerHTML = "Invalid checkout date";
                btn.disabled = true
            } else if (cout > cin) {
                msg.innerHTML = "";
                btn.disabled = false
            }
        }
    </script>
@endsection
