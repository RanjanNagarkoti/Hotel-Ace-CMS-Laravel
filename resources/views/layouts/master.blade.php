<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Ace Hotel</title>

    @include('includes.style')
    <link rel="stylesheet" href="/css/index.css">

</head>

<body id="page-top">
    @include('includes.user.nav')
    @yield('content')
    @include('includes.script')
    @include('includes.footer')
</body>

</html>
