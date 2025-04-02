<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <title>Home</title>
    <link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">
    <style>
        .card {
            width: 100%;
        }

        @media screen and (max-width: 575px) {
            .bcard {
                display: flex;
                justify-content: center;
            }

            .card {
                width: 70%;
            }
        }
    </style>
</head>

<body>
    @extends('layouts.nav')

    @section('content')
        <div class="container-fluid p-0">
            <section id="hero">
                <div class="hero-container">
                    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                        <div class="carousel-inner" role="listbox">
                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <div class="carousel-background">
                                    <img src="https://i.pinimg.com/736x/8b/31/d3/8b31d3394ed2f41f88628f4e3d0078ad.jpg"
                                        alt="" style="width: 100vw;height: 100vh;object-fit: cover;">
                                </div>
                                <div class="carousel-container">
                                    <div class="carousel-content">
                                        <h2 class="animate__animated animate__fadeInDown mb-0">Welcome to <span>Pizza Hub!
                                                🍕🔥</span></h2>
                                        <p class="animate__animated animate__fadeInUp">Where every slice is made with love
                                            and the freshest ingredients. Dive into cheesy goodness today!"</p>
                                        <a href="{{ route('user.index') }}"
                                            class="btn-get-started animate__animated animate__fadeInUp scrollto">Get
                                            Started</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <div class="carousel-background">
                                    <img src="https://i.pinimg.com/736x/48/b5/d2/48b5d236bac9c2d3415a7ba3159280e5.jpg"
                                        alt="" style="width: 100vw;height: 100vh;object-fit: cover;">
                                </div>
                                <div class="carousel-container">
                                    <div class="carousel-content">
                                        <h2 class="animate__animated animate__fadeInDown mb-0">Hot, Fresh & Delicious! 🍕
                                        </h2>
                                        <p class="animate__animated animate__fadeInUp">Enjoy the taste of perfection with
                                            our handcrafted pizzas, made with love and the freshest ingredients!</p>
                                        <a href="{{ route('user.index') }}"
                                            class="btn-get-started animate__animated animate__fadeInUp scrollto">Get
                                            Started</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <div class="carousel-background"><img src="/assetsForSideBar/img/pizzabg2.jpeg"
                                        alt="" style="width: 100vw;height: 100vh;object-fit: cover;">
                                </div>
                                <div class="carousel-container">
                                    <div class="carousel-content">
                                        <h2 class="animate__animated animate__fadeInDown mb-0">Order Now & Savor the Flavor!
                                            🚀</h2>
                                        <p class="animate__animated animate__fadeInUp">Craving pizza? Get it delivered hot
                                            and fresh straight to your door in just a few clicks!</p>
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
            </section>
            <!-- End Hero -->
        </div>
        <div class="container my-3 mb-5">
            {{-- radio buttons --}}
            <div class="col-lg-12 text-center bg-light mt-3 mb-4"
                style="margin: auto;border-top: 2px groove black;border-bottom: 2px groove black;">
                <h2 class="text-center">Pizza Categories</h2>
                <form method="GET">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pizzaCat" id="option1" value="0"
                            onchange="handleRadioChange(this)">
                        <label class="form-check-label" for="option1">All</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pizzaCat" id="option2" value="1"
                            onchange="handleRadioChange(this)">
                        <label class="form-check-label" for="option2">Veg Pizza</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pizzaCat" id="option3" value="2"
                            onchange="handleRadioChange(this)">
                        <label class="form-check-label" for="option3">Non-Veg Pizza</label>
                    </div>
                </form>
            </div>
            <div class="row d-flex justify-content-start" id="catData">
                @foreach ($categories as $cat)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                        <div class="card">
                            <img src="/catimages/{{ $cat->catimage }}" class="card-img-top" alt="image for this category"
                                height="250px">
                            <div class="card-body">
                                @if ($cat->cattype == 1)
                                    <img src="/img/veg-mark.jpg" alt="" height="25px" @style('position: absolute; top: 10px; right: 10px;')>
                                @elseif ($cat->cattype == 2)
                                    <img src="/img/non-veg-mark.jpg" alt="" height="25px" @style('position: absolute; top: 10px; right: 10px;')>
                                @endif
                                <h5 class="card-title">
                                    <a class="text-dark"
                                        href="{{ route('user.viewPizzaList', ['catid' => $cat->catid]) }}">{{ $cat->catname }}</a>
                                </h5>
                                <p class="card-text">{{ substr($cat->catdesc, 0, 30) }}...</p>
                                <a href="{{ route('user.viewPizzaList', ['catid' => $cat->catid]) }}"
                                    class="btn btn-primary">View All</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection('content')

    <script>
        function handleRadioChange(radio) {
            let categoryId = radio.value;
            console.log("Selected Category ID:", categoryId);

            $.ajax({
                url: "{{ route('user.index') }}", // Route to fetch filtered categories
                method: "GET",
                data: {
                    category_id: categoryId
                },
                success: function(response) {
                    $("#catData").html(response); // Replace the category data dynamically
                },
                error: function(xhr) {
                    console.log("Error fetching categories:", xhr);
                }
            });
        }
    </script>


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
