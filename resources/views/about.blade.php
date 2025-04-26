<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <title>About Us</title>
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
        .about {
            padding: 80px 0;
        }

        .about-content h3 {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .about-content p {
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .about-img {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        }

        .about-img img {
            width: 100%;
            transition: transform 0.5s;
        }

        .about-img:hover img {
            transform: scale(1.05);
        }

        /* Rating Section */
        .rating-section {
            background-color: #f9f9f9;
            padding: 60px 0;
        }

        .about-img img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .skills-content .progress {
            background: #e0e0e0;
            border-radius: 20px;
            overflow: hidden;
            height: 22px;
            margin-bottom: 25px;
            position: relative;
        }

        .skills-content .progress-bar-wrap {
            width: 80%;
            height: 100%;
        }

        .skills-content .progress-bar {
            height: 100%;
            background-color: var(--primary, #ff4d00);
            /* fallback orange */
            transition: width 1s ease-in-out;
        }

        .skill {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
            font-size: 12px;
            margin-left: 10px;
            letter-spacing: 2px;
        }

        i.val {
            font-style: normal;
            font-weight: 600;
            margin-left: auto;
        }

        /* Stats Section */
        .stats {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('/api/placeholder/1200/400') center center;
            background-size: cover;
            padding: 80px 0;
            color: #fff;
        }

        .count-box {
            text-align: center;
            padding: 30px 0;
        }

        .count-box i {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .count-box span {
            font-size: 42px;
            font-weight: 700;
            display: block;
            margin-bottom: 15px;
        }

        .count-box p {
            font-size: 16px;
            margin: 0;
        }

        /* Team Section */
        .team {
            padding: 80px 0;
        }

        .member {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .member img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .member-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
            padding: 20px;
            color: #fff;
            transform: translateY(50px);
            opacity: 0;
            transition: all 0.3s;
        }

        .member:hover .member-info {
            transform: translateY(0);
            opacity: 1;
        }

        .member-info h4 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .social {
            margin-top: 15px;
        }

        .social a {
            color: #fff;
            font-size: 18px;
            margin: 0 8px;
            transition: color 0.3s;
        }

        .social a:hover {
            color: var(--primary);
        }
    </style>

</head>

<body>
    @if (session('userloggedin') && session('userloggedin') == true)
        @php
            $userloggedin = true;
            $userId = session('userId');
        @endphp
    @else
        @php
            $userloggedin = false;
            $userId = 0;
        @endphp
    @endif

    @php
        use Carbon\Carbon;
    @endphp
    @extends('layouts.nav')
    @section('content')
        @include('paricals.loginModal')
        @include('paricals.signupModal')

        <!-- ======= Hero Section ======= -->
        <section id="hero">
            <div class="hero-container">
                <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                    <div class="carousel-inner" role="listbox">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="carousel-background"><img src="assets/img/slide/slide-1.jpg" alt="">
                            </div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown mb-0">Welcome to <span>Pizza
                                            Hub</span>
                                    </h2>
                                    <a href="{{ route('user.index') }}"
                                        class="btn-get-started animate__animated animate__fadeInUp scrollto">Get
                                        Started</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <img src="https://i.pinimg.com/736x/48/b5/d2/48b5d236bac9c2d3415a7ba3159280e5.jpg"
                                alt="" style="width: 100vw;height: 100vh;object-fit: cover;">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown mb-0">Our Mission</h2>
                                    <a href="{{ route('user.index') }}"
                                        class="btn-get-started animate__animated animate__fadeInUp scrollto">Get
                                        Started</a>
                                </div>
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="carousel-item">
                            <div class="carousel-background"><img src="assets/img/slide/slide-3.jpg" alt="">
                            </div>
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown mb-0">Fastest Pizza Delivery</h2>
                                    <a href="{{ route('user.index') }}"
                                        class="btn-get-started animate__animated animate__fadeInUp scrollto">Get
                                        Started</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon icofont-thin-double-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon icofont-thin-double-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </section><!-- End Hero -->

        <main>
            <!-- About Section -->
            <section class="about">
                <div class="container">
                    <div class="section-title">
                        <h2>About Us</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-content">
                                <h3>Welcome to <strong style="color: var(--primary)">Pizza Hub</strong></h3>
                                <h4 class="mb-4"><strong>The Worldwide Leader in Pizza Delivery</strong></h4>
                                <p>At Pizza Hub, we believe that great pizza begins with quality ingredients and ends with a
                                    satisfied customer. Founded with a passion for authentic flavors and exceptional
                                    service, we've grown from a small local pizzeria to a beloved brand known for
                                    consistency and innovation.</p>
                                <p>Our secret? We never compromise on quality. Each pizza is handcrafted using our signature
                                    dough, made fresh daily, and topped with premium ingredients sourced from trusted
                                    suppliers. Whether you're craving a classic Margherita or one of our innovative
                                    specialty pizzas, we ensure every bite delivers the perfect combination of flavors.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="/assetsForSideBar/img/pizzabg2.jpeg" alt="Pizza Hub Restaurant">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Rating Section -->
            <section class="rating-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <div class="about-img">
                                <img src="/assetsForSideBar/img/pizzabg2.jpeg" alt="Happy Customers"
                                    class="img-fluid rounded">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h3 class="mb-4">Customer Satisfaction Rating</h3>
                            <div class="skills-content">
                                <div class="progress">
                                    <span class="skill">5 start <i class="val">93%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" data-value="93%"></div>
                                    </div>
                                </div>
                                <div class="progress">
                                    <span class="skill">4 star <i class="val">90%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" data-value="90%"></div>
                                    </div>
                                </div>
                                <div class="progress">
                                    <span class="skill">3 star <i class="val">30%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" data-value="30%"></div>
                                    </div>
                                </div>
                                <div class="progress">
                                    <span class="skill">2 star <i class="val">5%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" data-value="5%"></div>
                                    </div>
                                </div>
                                <div class="progress">
                                    <span class="skill">1 star <i class="val">0%</i></span>
                                    <div class="progress-bar-wrap">
                                        <div class="progress-bar" data-value="0%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="stats">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="fas fa-smile"></i>
                                <span class="counter">100</span>
                                <p><strong>Happy Customers</strong></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="fas fa-utensils"></i>
                                <span class="counter">121</span>
                                <p><strong>Menu Items</strong></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="fas fa-headset"></i>
                                <span class="counter">150</span>
                                <p><strong>Hours Of Support</strong></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="fas fa-users"></i>
                                <span class="counter">25</span>
                                <p><strong>Team Members</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Team Section -->
            <section class="team">
                <div class="container">
                    <div class="section-title">
                        <h2>Our Team</h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="member">
                                <img src="/assets/img/team/team-1.jpg" alt="Darshan Parmar">
                                <div class="member-info">
                                    <h4>Darshan Parmar</h4>
                                    <div class="social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-github"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="member">
                                <img src="/assets/img/team/team-3.jpg" alt="Harsh Patel">
                                <div class="member-info">
                                    <h4>Harsh Patel</h4>
                                    <div class="social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-github"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="member">
                                <img src="/assets/img/team/team-5.jpg" alt="Bhavesh Parmar">
                                <div class="member-info">
                                    <h4>Bhavesh Parmar</h4>
                                    <div class="social">
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-github"></i></a>
                                        <a href="#"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const counters = document.querySelectorAll('.counter');
            const speed = 200; // Lower = faster

            function animateCounter(counter) {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;

                const increment = target / speed;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(() => animateCounter(counter), 10);
                } else {
                    counter.innerText = target;
                }
            }

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        counter.innerText = '0'; // Reset counter to 0 each time
                        animateCounter(counter);
                    }
                });
            }, {
                threshold: 0.5 // 50% of the element visible
            });

            counters.forEach(counter => {
                counter.setAttribute('data-target', counter.innerText);
                counter.innerText = '0';
                observer.observe(counter);
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const progressBars = document.querySelectorAll('.progress-bar');
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const bar = entry.target;
                        bar.style.width = bar.getAttribute('data-value');
                    }
                });
            }, {
                threshold: 0.5
            });

            progressBars.forEach(bar => {
                observer.observe(bar);
            });
        });
    </script>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>


    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counterup/counterup.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
