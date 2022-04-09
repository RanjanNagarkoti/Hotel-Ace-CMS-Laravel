<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hotel Ace</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    {{-- Status --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Error --}}
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-left">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <div class="text-center">
                                    <h2 class="fw-bold mb-2 text-uppercase">Hotel ACE <br> Admin Login</h2>
                                    <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                </div>

                                <form method="POST" action="{{ url('/hotel-ace/admin/login/store') }}">
                                    @csrf
                                    <div class="form-outline form-white mb-4 text-left">
                                        <label class="form-label" for="typeEmailX">Email</label>
                                        <input type="email" id="email" class="form-control form-control-lg" type="email"
                                            name="email" :value="old('email')" required autofocus />

                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="typePasswordX">Password</label>
                                        <input id="password" type="password" name="password" required
                                            autocomplete="current-password" class="form-control form-control-lg" />
                                    </div>

                                    <div class="text-center">
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
