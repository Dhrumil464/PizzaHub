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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id="title">Category</title>
    <link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">
    <style>
        .jumbotron {
            padding: 2rem 1rem;
        }

        #cont {
            min-height: 570px;
        }

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

        .card-img-top {
            object-fit: contain;
            padding: 1rem;
        }

        /* @media screen and (max-width : 1200px and min-width : 768px) {} */
    </style>
</head>

<body>
    @extends('layouts.nav')

    @section('content')
        @php
            $catid = request('catid');
            $category = App\Models\Categories::where('catid', $catid)->first();
        @endphp

        <!-- Pizza container starts here -->
        @if ($pizzaItems->isNotEmpty())
            <div class="container mt-3" id="cont">
                <div class="col-lg-8 text-center bg-light mb-4"
                    style="margin: auto;border-top: 2px groove black;border-bottom: 2px groove black;">
                    <h2 class="text-center"><span id="catTitle">{{ $category->catname }} | ITEMS</span></h2>
                </div>

                @if ($category->iscombo == 0)
                    <div class="row d-flex justify-content-start">
                        @foreach ($pizzaItems as $item)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                                <div class="card">
                                    @if ($item->discount > 0)
                                        <div class="position-absolute"
                                            style="top: 10px; right: -15px; font-size: 14px; background: black; color: #fff; text-shadow: 0 0 5px red, 0 0 10px red; padding: 5px 20px;transform: rotate(10deg); font-weight: bold; clip-path: polygon(100% 0%, 85% 50%, 100% 100%, 0% 100%, 15% 50%, 0% 0%)">
                                            {{ $item->discount }}% OFF
                                        </div>
                                    @endif
                                    <img src="/pizzaimages/{{ $item->pizzaimage }}" class="card-img-top"
                                        alt="image for this pizza" height="250px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ substr($item->pizzaname, 0, 15) }}...</h5>

                                        @if ($item->discount > 0)
                                            @php
                                                $discountedPrice =
                                                    $item->pizzaprice - ($item->pizzaprice * $item->discount) / 100;
                                            @endphp
                                            <h6 style="color: #ff0000">
                                                <del>Rs.{{ $item->pizzaprice }}/-</del>
                                                <span
                                                    style="color: green;">Rs.{{ number_format($discountedPrice, 2) }}/-</span>
                                            </h6>
                                        @else
                                            <h6 style="color: green">Rs.{{ $item->pizzaprice }}/-</h6>
                                        @endif

                                        <p class="card-text">{{ substr($item->pizzadesc, 0, 25) }}...</p>
                                        <div class="row justify-content-center">
                                            @if ($userloggedin)
                                                @php
                                                    $quaExistRows = App\Models\PizzaCart::where(
                                                        'pizzaId',
                                                        $item->pizzaid,
                                                    )
                                                        ->where('userId', $userId)
                                                        ->where('catid', null)
                                                        ->count();
                                                @endphp
                                                @if ($quaExistRows == 0)
                                                    <form action="{{ route('cart.add', ['pizzaid' => $item->pizzaid]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit" name="addToCart"
                                                            class="btn btn-primary myBtnSize">Add to Cart</button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('user.showCart') }}"><button
                                                            class="btn btn-primary myBtnSize">Go to Cart</button></a>
                                                @endif
                                            @else
                                                <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                                    data-target="#loginModal">Add to Cart</button>
                                            @endif
                                            <a
                                                href="{{ route('user.viewPizza', ['catid' => $item->catid, 'pizzaid' => $item->pizzaid]) }}"class="mx-2"><button
                                                    class="btn btn-primary myBtnSize">QuickView</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row d-flex justify-content-start">
                        @foreach ($pizzaItems as $item)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                                <div class="card">
                                    <img src="/pizzaimages/{{ $item->pizzaimage }}" class="card-img-top"
                                        alt="image for this pizza" height="250px">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ substr($item->pizzaname, 0, 15) }}...</h5>
                                        <p class="card-text">{{ substr($item->pizzadesc, 0, 25) }}...</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <div class="container mt-5" style="padding-bottom: 283px">
                <div class="row d-flex justify-content-center">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">Sorry In this category No items available.</p>
                            <p class="lead"> We will update Soon.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom jQuery Script -->
    <script>
        // document.getElementById("title").innerHTML = "<?php echo '$catname'; ?>";
        document.getElementById("title").innerHTML += " | {{ $category->catname }}"
        $(document).ready(function() {
            function updateClass() {
                var element = $(".myBtnSize");

                if ($(window).width() >= 768 && $(window).width() <= 1200) {
                    element.addClass("btn-sm my-1");
                } else if ($(window).width() >= 575 && $(window).width() <= 767) {
                    element.removeClass("my-1");
                    element.addClass("btn-sm");
                } else {
                    element.removeClass("btn-sm my-1");
                }
            }
            // Run on page load
            updateClass();
            // Run on window resize
            $(window).resize(updateClass);
        });
    </script>
</body>

</html>
