@extends('layouts.master')
@section('content')
    <div class="about-box">
        <div class="slideshow-container">
            <div class="mySlides">
                <img src="{{ url('/images/about.jpg') }}" style="width:100%" class="slide-img">
                <div class="img-title-about">
                    <h1>Let's Talk about us</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt, corrupti
                        facilis dolore inventore sed
                        explicabo placeat maxime fugit aspernatur quod.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="give-space about-info-detail">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h2>Need to know about Hotel Ace</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et quia ducimus totam architecto
                        reprehenderit itaque tempore corrupti incidunt doloribus fuga!</p>
                </div>
                <div class="col-sm">
                    <ol>
                        <li><b>Team of experts</b>
                            <br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, corrupti?</p>
                        </li>


                        <li><b>Nature friendly environment</b>
                            <br>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, eum!</p>
                        </li>


                        <li><b>Daily sanitizing</b>
                            <br>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, porro!</p>
                        </li>

                    </ol>
                </div>
            </div>
        </div>
        <div class="staffs">
            <h1>Our Staffs</h1>
            <div class="container d-flex justify-content-around flex-wrap">
                @foreach ($data as $item)
                    <div class="card mb-5" style="width: 18rem;">
                        <img src="{{ url("/images/staffs/$item->profile") }}" class="card-img-top"
                            alt="Sunset Over the Sea" />
                        <div class="card-body text-center">
                            <p class="card-text">{{ $item->name }}</p>
                            <p class="card-text"><b>{{ $item->position }}</b></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
