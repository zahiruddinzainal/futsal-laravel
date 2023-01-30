<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Futsal Pundana Court Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="/public/img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="/public/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/public/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet">
</head>

<body>
    {{-- Topbar start --}}
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <span>+60 16 558 5600</span>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <span class="far fa-envelope me-2"></span>
                    <span>info@uitm.com.my</span>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">

                    @auth
                        <div class="text-end">
                            <a class="text-light mr-3" style="font-size: 13px;">Logged in as {{ Auth::user()->name }} ‎ ‎ ‎
                            </a>
                            <a href="{{ route('logout.perform') }}" class="btn btn-outline-light ml-5 me-2">Logout</a>
                        </div>
                    @endauth

                    @guest
                        <div class="text-end">
                            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                            <a href="{{ route('register.perform') }}" class="btn btn-primary">Register</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    {{-- Navbar start --}}
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-5 px-lg-5">
            <img style="width:100%; height: 60px;" src="/public/img/uitm_logo.png" alt="Image">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#contact" class="nav-item nav-link">Contact Us</a>
                <a href="#feedback" class="nav-item nav-link">Feedback</a>
            </div>
            <a href="/book" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Book now<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>

    {{-- Message --}}
    @if (Session::has('comment_added'))
        <div class="alert alert-success alert-dismissible  d-flex align-items-center fade show m-2" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{ Session::get('comment_added') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- Carousel banner --}}
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="/public/img/uitm.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">A good kick in the
                                        grass! Book now.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="/public/img/futsal.png" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Booking court is now
                                        easier in your fingertips</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- About --}}
    <div id="about" class="container-xxl py-5 mt-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="fs-12 fw-bold text-primary">Our Venue </p>
                    <h1 class="display-5 mb-5">Futsal Pundana </h1>
                    <p class="mb-4">Futsal Pundana started on 1st January 2023 operation on UiTM Puncak Perdana. The
                        venue consists of 2 numbers of FIFA standard size court.
                        <br>
                        <br>
                        Futsal Pundana venue is housed in a specially made building designed for outdoor futsal unlike
                        some other venues which are converted from existing factories. Therefore, the players will enjoy
                        the spacious layout, robust lighting and comfortable air ventilation.
                        <br>
                        <br>
                        Courts flooring are fully rubberized by imported material which can reduce sport injury to the
                        players. The lighting is fully 6500k colour temperature LED high bay lamps giving great color
                        rendition, makes the place look not only bright but clean.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Contact / map --}}
    <div id="contact" class="container-xxl py-5 mb-3">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">Contact Us</p>
                    <h1 class="display-5 mb-5">If You Have Any Query, Please Contact Us</h1>
                    <p class="mb-4">**Please call or SMS for booking. Email booking is not allowed**</p>
                    <div class="row g-3">
                        <div class="col-12">
                            <a href="https://api.whatsapp.com/send?phone=60165585600&text=Hi%20I%20have%20a%20few%20questions%20about%20Punda%20E-Futsal%20%20regarding...." target="_blank" class="btn btn-primary py-3 px-4 w-100">
                                <img src="/public/img/ws.png" width="30" /> Khaiyum: 012-3456789
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="https://api.whatsapp.com/send?phone=60165585600&text=Hi%20I%20have%20a%20few%20questions%20about%20Punda%20E-Futsal%20%20regarding...." target="_blank" class="btn btn-primary py-3 px-4 w-100">
                                <img src="/public/img/ws.png" width="30" /> Farhan: 013-9876543
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="https://api.whatsapp.com/send?phone=60178833440&text=Hi%20I%20have%20a%20few%20questions%20about%20Punda%20E-Futsal%20%20regarding...." target="_blank" class="btn btn-primary py-3 px-4 w-100">
                                <img src="/public/img/ws.png" width="30" /> Qusyairi: 017–8833440
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=uitm%20puncak%20perdana&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Feedback / comments form --}}
    <div id="feedback" class="d-flex align-items-center justify-content-center">
        <div class="shadow-lg p-3 mt-5 mb-5 bg-white rounded">
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                            <p class="fs-5 fw-bold text-primary">Comments</p>
                            <h1 class="display-5 mb-3">Any comments?</h1>
                            <p class="mb-4">Please write to us if you have any comment or suggestion so that we may
                                improve
                                your enjoyment at our venue</p>
                            <form method="post" action="{{ route('comment.store') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="message" name="comment"
                                                style="height: 100px"></textarea>
                                            <label for="comment">Comment</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary py-3 px-4" type="submit">Send Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer  --}}
    <div class="container-fluid bg-primary text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-4">UITM Puncak Perdana</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jalan Pulau Indah Au10/A, Puncak
                        Perdana, 40150 Shah Alam, Selangor</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+60 16 558 5600</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@uitm.com.my</p>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h4 class="text-white mb-4">Operation hours</h4>
                    <p>Monday – Sunday</p>
                    <p>Open from 7am – 11pm</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="container-fluid bg-dark copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">E-Futsal Pundana</a>, All Right Reserved.
                </div>
            </div>
        </div>
    </div>

    {{-- Floating button --}}
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    {{-- Js libraries --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
