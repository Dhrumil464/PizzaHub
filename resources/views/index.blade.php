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
        <div class="container my-3 mb-5">
            <div class="col-lg-2 text-center bg-light my-3"
                style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">
                <h2 class="text-center">Menu</h2>
            </div>

            <div class="row d-flex justify-content-start">
                @foreach ($categories as $cat)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                        <div class="card">
                            <img src="/catimages/{{ $cat->catimage }}" class="card-img-top" alt="image for this category">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('user.viewPizzaList', ['catid' => $cat->catid]) }}">{{ $cat->catname }}</a>
                                </h5>
                                <p class="card-text">{{ substr($cat->catdesc, 0, 30) }}... </p>
                                <a href="{{ route('user.viewPizzaList', ['catid' => $cat->catid]) }}" class="btn btn-primary">View All</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection('content')

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
