<header>
    <nav>
        <h2 class="logo"> <a href="{{ url('/home') }}"><img src="/images/logo.png" alt="Logo"
                    class="logo-pic"><span class="ace">ACE</span></a></h2>
        <ul class="my-menu">
            <li><a href="/hotel-ace">Home</a></li>
            <li><a href="/hotel-ace/rooms">Rooms</a></li>
            <li><a href="/hotel-ace/about">About</a></li>
            <li><a href="/hotel-ace/contact">Contact</a></li>
            @if (Auth::check())
                @php
                    $name = Auth::user()->name;
                    $ws = strpos($name, ' ');
                    $fname = substr($name, 0, $ws);
                @endphp
                <li class="dropdown">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" id="dropdownMenu2"
                            data-toggle="dropdown">{{ $fname }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <ul>
                                <form action="{{ url('/hotel-ace/logout') }}" method="POST" id="subForm">
                                    @csrf
                                    <a href="#" onclick="myFunctionOne()">Logout</a>
                                </form>
                                <a href="/hotel-ace/{{ Auth::user()->id }}/card">My card</a>
                                <a href="/hotel-ace/{{ Auth::user()->id }}/booking">Bookings</a>
                            </ul>
                        </div>
                    </div>
                </li>
            @else
                <li><a href="{{ url('/hotel-ace/login') }}">Login</a></li>
            @endif
        </ul>
    </nav>
</header>
