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
    <link rel = "icon" href ="img/logo.jpg" type = "image/x-icon">
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

        /* @media screen and (max-width : 1200px and min-width : 768px) {} */
    </style>
</head>

<body>
    @extends('layouts.nav')

    @section('content')
        <div>&nbsp;
            <a href="{{ route('user.index') }}" class="active text-dark">
                <i class="fas fa-qrcode"></i>
                <span>All Category</span>
            </a>
        </div>

        {{-- $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE categorieId = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['categorieName'];
        $catdesc = $row['categorieDesc'];
    } --}}

        <!-- Pizza container starts here -->
        <div class="container my-3 mb-5" id="cont">
            <div class="col-lg-2 text-center bg-light my-3"
                style="margin:auto;border-top: 2px groove black;border-bottom: 2px groove black;">
                <h2 class="text-center"><span id="catTitle">Items</span></h2>
            </div>

            <div class="row d-flex justify-content-start">
                {{-- $id = $_GET['catid'];
                    $sql = "SELECT * FROM `pizza` WHERE pizzaCategorieId = $id";
                    $result = mysqli_query($conn, $sql);
                    $noResult = true;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $noResult = false;
                        $pizzaId = $row['pizzaId'];
                        $pizzaName = $row['pizzaName'];
                        $pizzaPrice = $row['pizzaPrice'];
                        $pizzaDesc = $row['pizzaDesc']; --}}
                        
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                    <div class="card">
                        <img src="img/pizza-1.jpg" class="card-img-top" alt="image for this pizza">
                        <div class="card-body">
                            <h5 class="card-title">$pizzaName</h5>
                            <h6 style="color: #ff0000">Rs.$pizzaPrice/-</h6>
                            <p class="card-text">substr($pizzaDesc, 0, 29)...</p>
                            <div class="row justify-content-center">
                                @php
                                    $id = 1;
                                    $quaExistRows = 1;
                                    $noResult = 0;
                                @endphp
                                @if ($id == 1)
                                    {{-- $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult); --}}
                                    @if ($quaExistRows == 0)
                                        <form action="partials/_manageCart.php" method="POST">
                                            <input type="hidden" name="itemId" value="$pizzaId">
                                            <button type="submit" name="addToCart" class="btn btn-primary myBtnSize">Add to
                                                Cart</button>
                                        @else
                                            <a href="{{ route('user.viewCart') }}"><button class="btn btn-primary myBtnSize">Go to
                                                    Cart</button></a>
                                    @endif
                                @else
                                    <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                        data-target="#loginModal">Add
                                        to Cart</button>
                                @endif
                                </form>
                                <a href="{{ route('user.viewPizza') }}"class="mx-2"><button
                                        class="btn btn-primary myBtnSize">Quick
                                        View</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                    <div class="card">
                        <img src="img/pizza-2.jpg" class="card-img-top" alt="image for this pizza">
                        <div class="card-body">
                            <h5 class="card-title">$pizzaName</h5>
                            <h6 style="color: #ff0000">Rs.$pizzaPrice/-</h6>
                            <p class="card-text">substr($pizzaDesc, 0, 29)...</p>
                            <div class="row justify-content-center">
                                @php
                                    $id = 1;
                                    $quaExistRows = 0;
                                    $noResult = 0;
                                @endphp
                                @if ($id == 1)
                                    {{-- $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult); --}}
                                    @if ($quaExistRows == 0)
                                        <form action="partials/_manageCart.php" method="POST">
                                            <input type="hidden" name="itemId" value="$pizzaId">
                                            <button type="submit" name="addToCart" class="btn btn-primary myBtnSize">Add to
                                                Cart</button>
                                        @else
                                            <a href="{{ route('user.viewCart') }}"><button class="btn btn-primary myBtnSize">Go to
                                                    Cart</button></a>
                                    @endif
                                @else
                                    <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                        data-target="#loginModal">Add
                                        to Cart</button>
                                @endif
                                </form>
                                <a href="{{ route('user.viewPizza') }}"class="mx-2"><button
                                        class="btn btn-primary myBtnSize">Quick
                                        View</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                    <div class="card">
                        <img src="img/pizza-3.jpg" class="card-img-top" alt="image for this pizza">
                        <div class="card-body">
                            <h5 class="card-title">$pizzaName</h5>
                            <h6 style="color: #ff0000">Rs.$pizzaPrice/-</h6>
                            <p class="card-text">substr($pizzaDesc, 0, 29)...</p>
                            <div class="row justify-content-center">
                                @php
                                    $id = 1;
                                    $quaExistRows = 0;
                                    $noResult = 0;
                                @endphp
                                @if ($id == 1)
                                    {{-- $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult); --}}
                                    @if ($quaExistRows == 0)
                                        <form action="partials/_manageCart.php" method="POST">
                                            <input type="hidden" name="itemId" value="$pizzaId">
                                            <button type="submit" name="addToCart" class="btn btn-primary myBtnSize">Add to
                                                Cart</button>
                                        @else
                                            <a href="{{ route('user.viewCart') }}"><button class="btn btn-primary myBtnSize">Go to
                                                    Cart</button></a>
                                    @endif
                                @else
                                    <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                        data-target="#loginModal">Add
                                        to Cart</button>
                                @endif
                                </form>
                                <a href="{{ route('user.viewPizza') }}"class="mx-2"><button
                                        class="btn btn-primary myBtnSize">Quick
                                        View</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                    <div class="card">
                        <img src="img/pizza-4.jpg" class="card-img-top" alt="image for this pizza">
                        <div class="card-body">
                            <h5 class="card-title">$pizzaName</h5>
                            <h6 style="color: #ff0000">Rs.$pizzaPrice/-</h6>
                            <p class="card-text">substr($pizzaDesc, 0, 29)...</p>
                            <div class="row justify-content-center">
                                @php
                                    $id = 1;
                                    $quaExistRows = 0;
                                    $noResult = 0;
                                @endphp
                                @if ($id == 1)
                                    {{-- $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult); --}}
                                    @if ($quaExistRows == 0)
                                        <form action="partials/_manageCart.php" method="POST">
                                            <input type="hidden" name="itemId" value="$pizzaId">
                                            <button type="submit" name="addToCart" class="btn btn-primary myBtnSize">Add
                                                to
                                                Cart</button>
                                        @else
                                            <a href="{{ route('user.viewCart') }}"><button class="btn btn-primary myBtnSize">Go to
                                                    Cart</button></a>
                                    @endif
                                @else
                                    <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                        data-target="#loginModal">Add
                                        to Cart</button>
                                @endif
                                </form>
                                <a href="{{ route('user.viewPizza') }}" class="mx-2"><button
                                        class="btn btn-primary myBtnSize">Quick View</button></a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                    <div class="card">
                        <img src="img/pizza-1.jpg" class="card-img-top" alt="image for this pizza">
                        <div class="card-body">
                            <h5 class="card-title">$pizzaName</h5>
                            <h6 style="color: #ff0000">Rs.$pizzaPrice/-</h6>
                            <p class="card-text">substr($pizzaDesc, 0, 29)...</p>
                            <div class="row justify-content-center">
                                @php
                                    $id = 1;
                                    $quaExistRows = 0;
                                    $noResult = 0;
                                @endphp
                                @if ($id == 1)
                                    {{-- $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult); --}}
                                    @if ($quaExistRows == 0)
                                        <form action="partials/_manageCart.php" method="POST">
                                            <input type="hidden" name="itemId" value="$pizzaId">
                                            <button type="submit" name="addToCart" class="btn btn-primary myBtnSize">Add to
                                                Cart</button>
                                        @else
                                            <a href="{{ route('user.viewCart') }}"><button class="btn btn-primary myBtnSize">Go to
                                                    Cart</button></a>
                                    @endif
                                @else
                                    <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                        data-target="#loginModal">Add
                                        to Cart</button>
                                @endif
                                </form>
                                <a href="{{ route('user.viewPizza') }}"class="mx-2"><button
                                        class="btn btn-primary myBtnSize">Quick
                                        View</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                    <div class="card">
                        <img src="img/pizza-2.jpg" class="card-img-top" alt="image for this pizza">
                        <div class="card-body">
                            <h5 class="card-title">$pizzaName</h5>
                            <h6 style="color: #ff0000">Rs.$pizzaPrice/-</h6>
                            <p class="card-text">substr($pizzaDesc, 0, 29)...</p>
                            <div class="row justify-content-center">
                                @php
                                    $id = 1;
                                    $quaExistRows = 0;
                                    $noResult = 0;
                                @endphp
                                @if ($id == 1)
                                    {{-- $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult); --}}
                                    @if ($quaExistRows == 0)
                                        <form action="partials/_manageCart.php" method="POST">
                                            <input type="hidden" name="itemId" value="$pizzaId">
                                            <button type="submit" name="addToCart" class="btn btn-primary myBtnSize">Add to
                                                Cart</button>
                                        @else
                                            <a href="{{ route('user.viewCart') }}"><button class="btn btn-primary myBtnSize">Go to
                                                    Cart</button></a>
                                    @endif
                                @else
                                    <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                        data-target="#loginModal">Add
                                        to Cart</button>
                                @endif
                                </form>
                                <a href="{{ route('user.viewPizza') }}"class="mx-2"><button
                                        class="btn btn-primary myBtnSize">Quick
                                        View</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                    <div class="card">
                        <img src="img/pizza-3.jpg" class="card-img-top" alt="image for this pizza">
                        <div class="card-body">
                            <h5 class="card-title">$pizzaName</h5>
                            <h6 style="color: #ff0000">Rs.$pizzaPrice/-</h6>
                            <p class="card-text">substr($pizzaDesc, 0, 29)...</p>
                            <div class="row justify-content-center">
                                @php
                                    $id = 1;
                                    $quaExistRows = 0;
                                    $noResult = 0;
                                @endphp
                                @if ($id == 1)
                                    {{-- $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult); --}}
                                    @if ($quaExistRows == 0)
                                        <form action="partials/_manageCart.php" method="POST">
                                            <input type="hidden" name="itemId" value="$pizzaId">
                                            <button type="submit" name="addToCart" class="btn btn-primary myBtnSize">Add to
                                                Cart</button>
                                        @else
                                            <a href="{{ route('user.viewCart') }}"><button class="btn btn-primary myBtnSize">Go to
                                                    Cart</button></a>
                                    @endif
                                @else
                                    <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                        data-target="#loginModal">Add
                                        to Cart</button>
                                @endif
                                </form>
                                <a href="{{ route('user.viewPizza') }}"class="mx-2"><button
                                        class="btn btn-primary myBtnSize">Quick
                                        View</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 bcard">
                    <div class="card">
                        <img src="img/pizza-4.jpg" class="card-img-top" alt="image for this pizza">
                        <div class="card-body">
                            <h5 class="card-title">$pizzaName</h5>
                            <h6 style="color: #ff0000">Rs.$pizzaPrice/-</h6>
                            <p class="card-text">substr($pizzaDesc, 0, 29)...</p>
                            <div class="row justify-content-center">
                                @php
                                    $id = 1;
                                    $quaExistRows = 0;
                                    $noResult = 0;
                                @endphp
                                @if ($id == 1)
                                    {{-- $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE pizzaId = '$pizzaId' AND `userId`='$userId'";
                                        $quaresult = mysqli_query($conn, $quaSql);
                                        $quaExistRows = mysqli_num_rows($quaresult); --}}
                                    @if ($quaExistRows == 0)
                                        <form action="partials/_manageCart.php" method="POST">
                                            <input type="hidden" name="itemId" value="$pizzaId">
                                            <button type="submit" name="addToCart" class="btn btn-primary myBtnSize">Add
                                                to Cart</button>
                                        @else
                                            <a href="{{ route('user.viewCart') }}"><button class="btn btn-primary myBtnSize">Go to
                                                    Cart</button></a>
                                    @endif
                                @else
                                    <button class="btn btn-primary myBtnSize" data-toggle="modal"
                                        data-target="#loginModal">Add to Cart</button>
                                @endif
                                </form>
                                <a href="{{ route('user.viewPizza') }}" class="mx-2"><button
                                        class="btn btn-primary myBtnSize">Quick View</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($noResult == 1)
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <p class="display-4">Sorry In this category No items available.</p>
                            <p class="lead"> We will update Soon.</p>
                        </div>
                    </div>
                @endif
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom jQuery Script -->
    <script>
        // document.getElementById("title").innerHTML = "<?php echo '$catname'; ?>";
        document.getElementById("title").innerHTML += "<?php echo ' | $catname'; ?>";
        $(document).ready(function() {
            $("#catTitle").append('<?php echo ' $catname' ?>');
            function updateClass() {
                var element = $(".myBtnSize");

                if ($(window).width() >= 768 && $(window).width() <= 1200) {
                    element.addClass("btn-sm my-1");
                }else if ($(window).width() >= 575 && $(window).width() <= 767) {
                    element.removeClass("my-1");
                    element.addClass("btn-sm");
                }else {
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
