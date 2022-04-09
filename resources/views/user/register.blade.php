<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('includes.style')
    <link rel="stylesheet" href="{{ url('/css/register.css') }}">
</head>

<body>
    <h1>Hotel Ace</h1>
    <div class="box">
        <form action="{{ url('/hotel-ace/register/store') }}" method="POST" id="user-register-form">
            @csrf
            <div class="row">
                <div class="col-sm">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Fullname', 'id' => 'name']) !!}
                </div>
                <div class="col-sm">
                    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    {!! Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'others' => 'Others'], null, ['class' => 'form-select', 'id' => 'gender']) !!}
                </div>
                <div class="col-sm">
                    {!! Form::text('country', null, ['class' => 'form-control', 'id' => 'country', 'placeholder' => 'Country']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    {!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => 'Contact', 'id' => 'contact']) !!}
                </div>
                <div class="col-sm">
                    {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'addresws', 'placeholder' => 'Address']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                </div>
                <div class="col-sm">
                    <input type="password" class="form-control" placeholder="Confirm password" id="confirm-password">
                    <span id="error"></span>
                </div>
            </div>

            <div class="row">
                <div class="col-sm">
                    <input type="checkbox" class="form-checkbox" id="showPass"
                        onclick="showPassword()">
                    <label for="showPass">Show password</label>
                </div>
                <div class="col-sm">
                    <a href="/hotel-ace/login">Already have account?</a>
                </div>
            </div>

            <div class="row">
                <div class="center">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var x = document.getElementById("password");
        var y = document.getElementById('confirm-password');
        function showPassword() {
            if (x.type === "password") {
                x.type = "text";
                y.type = 'text';
            } else {
                x.type = "password";
                y.type = 'password';
            }
        }
    </script>
</body>

</html>
