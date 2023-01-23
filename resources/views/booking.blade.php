<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Futsal Pundana Court Booking</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="/img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel='stylesheet' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.material.mobile.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.9/jquery.timepicker.min.css" />
    <style>

    </style>
</head>

<body>

    {{-- Topbar --}}
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
                        <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                        <div class="text-end">
                            <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                            <a href="{{ route('register.perform') }}" class="btn btn-primary">Register</a>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-5 px-lg-5">
            <img style="width:100%; height: 60px;" src="/img/uitm_logo.png" alt="Image">
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
            <a href="" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Book now<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <div id="feedback" class="p-5">
        @if (Session::has('book_success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('book_success') }}</p>
        @endif
        @if (Session::has('book_full'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('book_full') }}</p>
        @endif
        <div class="shadow-lg p-3 mt-5 mb-2 bg-white rounded">

            <div class="d-flex justify-content-center">
                <div class="court1"></div>
                <p style="color:#fff;">--</p>
                <p>Court 1</p>
            </div>
            <div class="d-flex justify-content-center">
                <div class="court2"></div>
                <p style="color:#fff;">--</p>
                <p>Court 2</p>
            </div>

            <div id="calendar"></div>
        </div>
    </div>

    @auth
        <div class="text-center">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-primary btn-full" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Book court
                </button>
            </div>
        </div>

        {{-- Booking Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('bookcourt') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Book court as {{ Auth::user()->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="start">Select court</label>
                            <div id="start"class="input-group date" data-provide="datepicker">
                                <select class="form-select" name="court" required>
                                    <option value="1" selected>Court 1</option>
                                    <option value="2">Court 2</option>
                                </select>
                            </div>
                            <br>
                            <label for="start">Select date to book</label>
                            <div id="start"class="input-group date" data-provide="datepicker">
                                <input type="date" class="form-control" name="date" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <br>

                            <label for="start">Select time to book</label>
                            <div id="start"class="input-group date" data-provide="datepicker">

                                <input id="timepicker" name="time"title="timepicker" min="07:00" max="23:00" style="width: 100%;" />

                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth

    @guest
        <div class="text-center">
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="/login" class="btn btn-primary btn-full">
                    Book court
                </a>
            </div>
        </div>
    @endguest

    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">UITM Puncak Perdana</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jalan Pulau Indah Au10/A, Puncak
                        Perdana, 40150 Shah Alam, Selangor</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+60 16 558 5600</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@uitm.com.my</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Services</h4>
                    <a class="btn btn-link" href="">Landscaping</a>
                    <a class="btn btn-link" href="">Pruning plants</a>
                    <a class="btn btn-link" href="">Urban Gardening</a>
                    <a class="btn btn-link" href="">Garden Maintenance</a>
                    <a class="btn btn-link" href="">Green Technology</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-light border-light w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-dark copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">E-Futsal Pundana</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    FYP Project by Fakhrur</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
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

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js'></script>
    <script src='https://raw.githubusercontent.com/gf3/moment-range/master/lib/moment-range.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.9/jquery.timepicker.min.js"></script>


    <script src="https://kendo.cdn.telerik.com/2018.1.221/js/kendo.all.min.js"></script>


    <script>
        $(document).ready(function() {

            jQuery(function() {
                jQuery('#date-picker-time').timepicker({
                    timeFormat: 'HH:mm',
                    interval: 60,
                    interval: 15, //still showing/displaying 30 mins interval
                    minHour: 0,
                    maxHour: 20,
                    dropdown: true,
                    dynamic: false,
                });
            });

            booking_jsons = [];
            @foreach ($bookings as $booking)

                if ({{ $booking->court }} == 1) {
                    booking_jsons.push({
                        title: 'Booked by {{ \App\Models\User::find($booking->requestor)->name }} from {{ $booking->start_at }} to {{ $booking->end_at }}',
                        start: '{{ $booking->start_at }}',
                        end: '{{ $booking->end_at }}',
                        color: '#61116a',
                        allDay: false
                    }, );
                } else {
                    booking_jsons.push({
                        title: 'Booked by {{ \App\Models\User::find($booking->requestor)->name }} from {{ $booking->start_at }} to {{ $booking->end_at }}',
                        start: '{{ $booking->start_at }}',
                        end: '{{ $booking->end_at }}',
                        color: '#febe10',
                        textColor: '#000',
                        allDay: false
                    }, );
                }
            @endforeach

            console.log(booking_jsons)

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaWeek agendaDay'
                },
                weekends: true,
                weekMode: 'fixed',
                weekNumbers: false,
                defaultView: 'agendaWeek',
                allDaySlot: true,
                // selectable: true,
                // selectHelper: true,
                // unselectAuto: true,
                eventSources: [{
                    events: booking_jsons

                    // events: [{
                    //         title: 'event1',
                    //         start: '2023-01-05 12:30:00',
                    //         end: '2023-01-05 12:40:00',
                    //         allDay: false
                    //     },
                    //     {
                    //         title: 'event2',
                    //         start: '2023-01-08',
                    //         end: '2023-01-8',
                    //         allDay: false
                    //     },
                    //     {
                    //         title: 'event3',
                    //         start: '2023-01-05 12:30:00',
                    //         allDay: false
                    //     },
                    // ]
                }]
            });
        });
        // create TimePicker from input HTML element
        $("#timepicker").kendoTimePicker({
            dateInput: false
        });
    </script>

</body>

</html>
