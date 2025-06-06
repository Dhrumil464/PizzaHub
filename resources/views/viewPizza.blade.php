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
    <title id=title>Pizza</title>
    <link rel = "icon" href ="/img/logo.jpg" type = "image/x-icon">
    <style>
        #cont {
            min-height: 508px;
        }

        .col-md-4 img {
            mix-blend-mode: multiply;
            object-fit: contain;
        }

        .jumbotron{
            /* padding: 4rem 4rem; */
        }
    </style>
</head>

<body>
    @extends('layouts.nav')
    @section('content')
        <div class="container my-4" id="cont">
            <div class="row jumbotron">
                @php
                    $catid = request('catid');
                    $pizzaid = request('pizzaid');
                    $category = App\Models\Categories::where('catid', $catid)->first();
                    $pizzaItem = App\Models\PizzaItems::where('pizzaid', $pizzaid)->first();
                @endphp
                <script>
                    document.getElementById("title").innerHTML += " | {{ $pizzaItem->pizzaname }}"
                </script>
                <div class="col-md-4">
                    <img src="/pizzaimages/{{ $pizzaItem->pizzaimage }}" width="250px" height="250px">
                </div>
                <div class="col-md-8 my-4">
                    <h3>{{ $pizzaItem->pizzaname }}</h3>
                    <h5 style="color: #ff0000">Rs.{{ $pizzaItem->pizzaprice }}/-</h5>
                    <p class="mb-0">{{ substr($pizzaItem->pizzadesc, 0, 29) }}...</p>

                    @if ($userloggedin)
                        @php
                            $quaExistRows = App\Models\PizzaCart::where('pizzaId', $pizzaItem->pizzaid)
                                ->where('userId', $userId)
                                ->count();
                        @endphp
                        @if ($quaExistRows == 0)
                            <form action="{{ route('cart.add', ['pizzaid' => $pizzaItem->pizzaid]) }}" method="POST">
                                @csrf
                                <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>
                            </form>
                        @else
                            <a href="{{ route('user.showCart') }}"><button class="btn btn-primary my-2">Go to
                                    Cart</button></a>
                        @endif
                    @else
                        <button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginModal">Add to
                            Cart</button>
                    @endif
                </div>
            </div>
        </div>
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
</body>

</html>
