@extends('layouts.master')
@section('content')

    <div class="slideshow-container">
        <div class="overlay">
            test
        </div>
        <div class="mySlides fade">
            <img src="{{ url('/images/3.jpg') }}" style="width:100%" class="slide-img">
            <div>
                <h1 class="title"> Welcome to Hotel Ace</h1>
                <p class="text">HOTEL AND RESORT</p>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="{{ url('/images/2.jpg') }}" style="width:100%" class="slide-img">
            <div>
                <h1 class="title">Unique Experience</h1>
                <p class="text">ENJOY WITH US</p>
            </div>
        </div>

        <div class="mySlides fade">
            <img src="{{ url('/images/1.jpg') }}" style="width:100%" class="slide-img">
            <div>
                <h1 class="title">Relaxing Room</h1>
                <p class="text">YOUR ROOM, YOUR STAY</p>
            </div>
        </div>

    </div>
    <br>
    <div class="rooms">
        <h1>Our Rooms</h1>
        <div class="line"></div>
        <div class="room-item-box">

            <div class="room-item">
                <img src="/images/standard-room.jpg" alt="standard room" class="room-img">
                <div class="descripton">
                    <h2>STANDARD ROOM</h2>
                    <p class="price">$100 / per night</p>
                    <p class="price">2 Person</p>
                    <a href="/hotel-ace/rooms" class="book-now btn btn-success">Book now</a>
                </div>
            </div>

            <div class="room-item">
                <img src="/images/deluxe-room.jpg" alt="deluxe room" class="room-img">
                <div class="descripton">
                    <h2>DELUXE Room</h2>
                    <p class="price">$200 / per night</p>
                    <p class="price">2 Person</p>
                    <a href="/hotel-ace/rooms" class="book-now btn btn-success">Book now</a>
                </div>
            </div>

            <div class="room-item">
                <img src="/images/family-room.jpg" alt="family room" class="room-img">
                <div class="descripton">
                    <h2>Family Room</h2>
                    <p class="price">$300 / per night</p>
                    <p class="price">5 Person</p>
                    <a href="/hotel-ace/rooms" class="book-now btn btn-success">Book now</a>
                </div>
            </div>

            <div class="room-item">
                <img src="/images/single-room.jpg" alt="single room" class="room-img">
                <div class="descripton">
                    <h2>Single Room</h2>
                    <p class="price">$40 / per night</p>
                    <p class="price">1 Person</p>
                    <a href="/hotel-ace/rooms" class="book-now btn btn-success">Book now</a>
                </div>
            </div>

            <div class="room-item">
                <img src="/images/luxry-room.jpg" alt="luxry room" class="room-img">
                <div class="descripton">
                    <h2>Luxry Room</h2>
                    <p class="price">$40 / per night</p>
                    <p class="price">2 Person</p>
                    <a href="/hotel-ace/rooms" class="book-now btn btn-success">Book now</a>
                </div>
            </div>
        </div>
    </div>
@endsection
