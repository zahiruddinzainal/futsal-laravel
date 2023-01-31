<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Futsal Pundana Court Booking</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css'>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container vh-100 mt-5">
        <div class="rounded d-flex justify-content-center pt-5">
            <div class="col-12 col-sm-12 col-lg-6  col-md-6 shadow-lg pt-5 bg-light">
                <div class="text-center">
                    <a href="/" class="navbar-brand d-flex align-items-center px-5 px-lg-5">
                        <img style="width:auto; height: 60px;" src="/public/img/uitm_logo.png" alt="Image">
                    </a>
                </div>
                <form method="post" action="{{ route('register.perform') }}">
                    @csrf
                    <div class="p-4">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="name@example.com" required="required" autofocus>
                            <label for="floatingInput">Email address</label>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                placeholder="Display name" required="required" autofocus>
                            <label for="floatingInput">Display Name</label>
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                placeholder="Password" required="required">
                            <label for="floatingPassword">Password</label>
                            @if ($errors->has('password'))
                                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" placeholder="Confirm Password"
                                required="required">
                            <label for="floatingPassword">Confirm Password</label>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary text-center mt-2 btn-full"
                                style="background-color: #61116a;"type="submit">
                                Register
                            </button>
                        </div>
                        <p class="text-center mt-5">
                            <a href="/login">Login to your Account</a>
                            {{-- <a href="/forget-password">Forgot your password?</a> --}}
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js'></script>
</body>

</html>
