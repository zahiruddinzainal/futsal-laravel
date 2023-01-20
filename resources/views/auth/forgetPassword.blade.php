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
                        <img style="width:auto; height: 60px;" src="img/uitm_logo.png" alt="Image">
                    </a>
                </div>

                <h3 class="mt-5" style="padding-left: 30px;">Reset password</h3>
                <form action="{{ route('forget.password.post') }}" method="POST">
                    @csrf
                    <div class="p-4">
                        <div class="form-floating mb-3">
                            <input type="text" id="email_address" class="form-control" name="email" required
                                autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                            <label for="floatingInput">Email address</label>
                            @if ($errors->has('username'))
                                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-primary text-center mt-2 btn-full"
                                style="background-color: #61116a;"type="submit">
                                SEND PASSWORD RESET LINK
                            </button>
                        </div>
                    </div>
                </form>
                @if (Session::has('message'))
                    <div class="alert alert-success m-3" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>

        </div>
    </div>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js'></script>
</body>

</html>
